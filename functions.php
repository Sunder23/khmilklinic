<?php defined('ABSPATH') or die('This script cannot be accessed directly.');
update_option('us_license_activated', 1);
/**
 * Theme functions and definitions
 */

if (!defined('US_ACTIVATION_THEMENAME')) {
  define('US_ACTIVATION_THEMENAME', 'Impreza');
}

global $us_theme_supports;
$us_theme_supports = array(
  'plugins' => array(
    'js_composer' => 'plugins-support/js_composer/js_composer.php',
    'Ultimate_VC_Addons' => 'plugins-support/Ultimate_VC_Addons.php',
    'revslider' => 'plugins-support/revslider.php',
    'contact-form-7' => NULL,
    'gravityforms' => 'plugins-support/gravityforms.php',
    'woocommerce' => 'plugins-support/woocommerce.php',
    'bbpress' => 'plugins-support/bbpress.php',
    'tablepress' => 'plugins-support/tablepress.php',
    'the-events-calendar' => 'plugins-support/the_events_calendar.php',
    'tiny_mce' => 'plugins-support/tiny_mce.php',
    'yoast' => 'plugins-support/yoast.php',
    'post_views_counter' => 'plugins-support/post_views_counter.php',
  ),
  // Include plugins that relate to translations and can be used in helpers.php
  'translate_plugins' => array(
    'wpml' => 'plugins-support/wpml.php',
    'polylang' => 'plugins-support/polylang.php',
  ),
);

require dirname(__FILE__) . '/common/framework.php';

function khmelnik_scripts()
{


  //print_r(get_page_template()); 

  if (is_search() || is_page_template('templates/page-homepage.php') || is_page_template('templates/page-testimonials.php') || is_page_template('templates/page-team.php') || is_page_template('templates/page-blog.php') || is_archive() || is_singular('doctors') || is_page_template('templates/single-doctor.php') || is_page_template('templates/page-center.php')) {
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/libs/css/swiper-bundle.min.css');
    wp_enqueue_style('homepage-css', get_template_directory_uri() . '/assets/css/homepage.css');
    wp_dequeue_style('us-style');
    wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/libs/js/swiper-bundle.min.js', array('jquery'), true);
    wp_enqueue_script('homepage-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), true);
  }
  if (is_single()) {
    wp_enqueue_style('default-css', get_template_directory_uri() . '/assets/css/default.css');
  }
  if (strpos($_SERVER['REQUEST_URI'], '/us_testimonial_category/') !== false) {
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/libs/css/swiper-bundle.min.css');
    wp_enqueue_style('homepage-css', get_template_directory_uri() . '/assets/css/homepage.css');
    wp_dequeue_style('us-style');
    wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/libs/js/swiper-bundle.min.js', array('jquery'), true);
    wp_enqueue_script('homepage-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), true);
  }
}
add_action('wp_enqueue_scripts', 'khmelnik_scripts', 1111111);

// ACF Options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

function dimox_breadcrumbs_ua()
{
  /* === ОПЦИИ === */
  $text['home'] = 'Головна'; // текст ссылки "Главная"	
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результати пошуку за запитом"%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи з тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статті автора %s'; // текст для страницы автора
  $text['404'] = 'Помилка 404'; // текст для страницы 404
  $text['page'] = 'Сторінка %s'; // текст 'Страница N'
  $text['cpage'] = 'Сторінка коментарів %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><ul>'; // открывающий тег обертки
  $wrap_after = '</ul></div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '>'; // разделитель между "крошками"
  $sep_before = '<span>'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<li><a herf = "#"class="current">'; //<a class="current" href="#">'; // тег перед текущей "крошкой"
  $after = '</a></li>'; //'</a></li>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</li>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '';
  $link_in_after = '';
  $link = $link_before . '<a itemprop="name" href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;
  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if (is_category()) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if (get_query_var('paged')) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }
    } elseif (is_search()) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }
    } elseif (is_day()) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;
    } elseif (is_month()) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;
    } elseif (is_year()) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
      if ($show_home_link) echo $sep;
      if (get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category();
        $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
        echo $cats;
        if (get_query_var('cpage')) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

      // custom post type
    } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
      $post_type = get_post_type_object(get_post_type());
      $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));

      if ($term->term_id == 153) {
        echo $sep . $before  . 'Фахівці' . $after;
      } else {
        if ($term) {
          echo $sep . $before  . $term->name . $after;
        } else {
          if (get_query_var('paged')) {
            echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
          } else {
            if ($show_current) echo $sep . $before . $post_type->label . $after;
          }
        }
      }
    } elseif (is_attachment()) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID);
      $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;
    } elseif (is_page() && !$parent_id) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;
    } elseif (is_page() && $parent_id) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs) - 1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;
    } elseif (is_tag()) {
      if (get_query_var('paged')) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }
    } elseif (is_author()) {
      global $author;
      $author = get_userdata($author);
      if (get_query_var('paged')) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }
    } elseif (is_404()) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;
    } elseif (has_post_format() && !is_singular()) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string(get_post_format());
    }

    echo $wrap_after;
  }
} // end of dimox_breadcrumbs_ua()

function custom_request($query_string)
{



  if (strpos($_SERVER['REQUEST_URI'], '/us_testimonial_category/') !== false) {
    $subcat = explode('/', $_SERVER['REQUEST_URI']);
    if (isset($subcat[2]) && $subcat[2] != '') {
      $subcat = $subcat[2];
    } else {
      $subcat = '';
    }
    //$query_string['us_testimonial_category'] = $subcat;
    $query_string['term'] = $subcat;
    $query_string['taxonomy'] = 'us_testimonial_category';
    //$query_string['pagename'] = 'us_testimonial_category';
    //$query_string['post_type'] = 'us_testimonial';
  }

  //print_r($query_string);

  return $query_string;
}
add_filter('request', 'custom_request');



add_filter('template_include', 'my_callback');
function my_callback($original_template)
{
  //global $wp_query;
  //print_r('<pre>'); print_r($wp_query->query_vars); print_r('</pre>');
  if (strpos($_SERVER['REQUEST_URI'], '/us_testimonial_category/') !== false) {

    return get_theme_file_path('taxonomy/taxonomy-us_testimonial_category.php');
  } else {
    return $original_template;
  }
}
function pagination($paged = '', $max_page = '')
{
  $big = 999999999; // need an unlikely integer
  if (!$paged) {
    $paged = get_query_var('paged');
  }

  if (!$max_page) {
    global $wp_query;
    $max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
  }

  echo paginate_links(array(
    'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format'     => '?paged=%#%',
    'current'    => max(1, $paged),
    'total'      => $max_page,
    'mid_size'   => 1,
    'prev_text'  => __('                <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.25 13.25L7.5 15L-1.19209e-07 7.5L7.5 0L9.25 1.75L3.5 7.5L9.25 13.25Z" fill="#333333"/>
    </svg>'),
    'next_text'  => __('<svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 1.75L2 0L9.5 7.5L2 15L0.25 13.25L6 7.5L0.25 1.75Z" fill="#333333"/>
    </svg>
    '),
    //'type'       => 'list'
  ));
}

function UaEnding($n, $n1, $n2, $n5) {
  if($n >= 11 and $n <= 19) return $n5;
  $n = $n % 10;
  if($n == 1) return $n1;
  if($n >= 2 and $n <= 4) return $n2;
  return $n5;
} 


// Register Post Type
function khmelnik_registe_post_type(){

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Клініки', 'taxonomy general name', 'us' ),
		'singular_name'     => _x( 'Клініка', 'taxonomy singular name', 'us' ),
		'search_items'      => __( 'Знайти клініку', 'us' ),
		'all_items'         => __( 'Всі Клініки', 'us' ),
		'menu_name'         => __( 'Клініка', 'us' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy( 'clinics', array( 'doctors' ), $args );

  unset( $args );
	unset( $labels );

	$labels = array(
		'name'              => _x( 'Спеціалізації', 'taxonomy general name', 'us' ),
		'singular_name'     => _x( 'Спеціалізація', 'taxonomy singular name', 'us' ),
		'search_items'      => __( 'Знайти Спеціалізацію', 'us' ),
		'all_items'         => __( 'Всі Спеціалізації', 'us' ),
		'menu_name'         => __( 'Спеціалізація', 'us' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy( 'specializations', array( 'doctors' ), $args );

  unset( $args );
	unset( $labels );
  $labels = array(
		'name'                  => _x( 'Лікарі', 'Post type general name', 'us' ),
		'singular_name'         => _x( 'Лікар', 'Post type singular name', 'us' ),
		'menu_name'             => _x( 'Лікарі', 'Admin Menu text', 'us' ),
		'name_admin_bar'        => _x( 'Лікар', 'Add New on Toolbar', 'us' ),
		'add_new'               => __( 'Додати', 'us' ),
		'add_new_item'          => __( 'Додати Лікаря', 'us' ),
		'new_item'              => __( 'Новий Лікар', 'us' ),
		'edit_item'             => __( 'Редагувати', 'us' ),
		'view_item'             => __( 'Переглянути', 'us' ),
		'all_items'             => __( 'Всі Лікарі', 'us' ),
	);
  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);
  register_post_type( 'doctors', $args );

  unset( $args );
	unset( $labels );

  $labels = array(
		'name'                  => _x( 'Послуги', 'Post type general name', 'us' ),
		'singular_name'         => _x( 'Послуга', 'Post type singular name', 'us' ),
		'menu_name'             => _x( 'Послуги', 'Admin Menu text', 'us' ),
		'name_admin_bar'        => _x( 'Послуга', 'Add New on Toolbar', 'us' ),
		'add_new'               => __( 'Додати', 'us' ),
		'add_new_item'          => __( 'Додати Послугу', 'us' ),
		'new_item'              => __( 'Нова Послуга', 'us' ),
		'edit_item'             => __( 'Редагувати', 'us' ),
		'view_item'             => __( 'Переглянути', 'us' ),
		'all_items'             => __( 'Всі Послуги', 'us' ),
	);
  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);
  register_post_type( 'services', $args );

}
add_action('init', 'khmelnik_registe_post_type');


add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
  
    global $user_ID;
  
    if ( !current_user_can('administrator') ) {
		remove_menu_page('acf-options');
		remove_menu_page('vc-welcome');
		remove_menu_page('wpcf7');
		remove_menu_page( 'edit.php?post_type=popup' );
    }
}