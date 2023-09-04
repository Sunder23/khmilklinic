<?php

/**
 * The template for displaying all single posts
 *
 * Do not overload this file directly. Instead have a look at templates/single.php file in us-core plugin folder:
 * you should find all the needed hooks there.
 */
$post = get_post();
if ( $post && preg_match( '/vc_row/', $post->post_content ) ) {

	us_load_template( 'templates/single' );

} else {
	function khmelnik_script_single()
	{
	wp_enqueue_style('reset-css', get_template_directory_uri() . '/assets/css/reset.css');
	wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/libs/css/swiper-bundle.min.css');
    wp_enqueue_style('homepage-css', get_template_directory_uri() . '/assets/css/homepage.css');
	
    wp_dequeue_style('us-style');
    wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/libs/js/swiper-bundle.min.js', array('jquery'), true);
    wp_enqueue_script('homepage-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), true);
	}
	add_action('wp_enqueue_scripts', 'khmelnik_script_single', 1111111);

	get_header('main');
?>
<main class="page_main">
	<?php
	while (have_posts()) :
		the_post(); ?>

		<section class="single_page">
			<div class="single_page__container">
				<div class="single_page__wrapper">
					<div class="single_page__top">

						<div class="single_page__title title_h2">
							<?php the_title() ?>
						</div>
						<div class="single_page__meta">
							<time class="single_page__date"><?php echo get_the_date( 'Y-m-d' ) ?></time>
						</div>
					</div>
					<div class="single_page__bottom">
						<?php the_content() ?>
					</div>
				</div>
				<?php $tags = get_the_tags();
				if (is_array($tags)) :
				?>
					<div class="single_page__tags">
						<span>Мітки:</span>
						<div class="single_tags__items">

							<?php foreach ($tags as $tag) : ?>
								<a href="/tag/<?php echo $tag->slug ?>" class="single_page__item"><?php echo $tag->name ?></a>
							<?php endforeach; ?>
						</div>
					</div>

				<?php endif ?>
			<?php $author_post = get_field('post_author')->post_title;
				if (isset($author_post)) :?>
				<div class="single_page__auth">
					<span>Автор статті :</span>
					<a href='<?php echo get_field('post_author')->guid?>'><?php echo $author_post ?></a>
				</div>
			<?php endif ?>
			</div>
		</section>

		<!-- Related Posts -->
		<section class="related_posts">
			<div class="related_posts__container">
				<div class="related_posts__wrapper">
					<div class="related_posts__title title_h2">Схожі матеріали</div>
					<?php
					
					$posts_per_page = 3;
					$cats = get_the_category(get_the_ID());
					foreach ($cats as $key => $value) {
					}		
					$args = array(
						'post_type'      => 'post',
						'posts_per_page' => $posts_per_page,
						'orderby'          => 'rand',
						'order' => 'DESC',
						'cat'              => array($value->term_id),
					);
					$query = new WP_Query($args);
					?>
					<?php if ($query->have_posts()) : ?>
						<div class="blog_items__wrapper">
							<?php while ($query->have_posts()) : $query->the_post(); ?>
								<a href="<?php the_permalink() ?>" <?php post_class('blog_items__item'); ?> id='post-<?php the_ID() ?>'>
									<div class="blog_items__top">
										<div class="blog_items__cat">
											<?php $category = get_the_category();
											echo $category[0]->cat_name; ?>
										</div>
										<?php
										if (has_post_thumbnail(get_the_ID())) :
											echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
										<?php else : ?>
											<img src="/wp-content/themes/Impreza/img/placeholder_img.png" alt="No Image" width='365' height="220">
										<?php endif;
										?>
									</div>
									<div class="blog_items__bottom">
										<div class="blog_items__bottom__top">
											   <div class="blog_items__bottom__auth">
												  <?php $author_post = get_field('post_author');
												  if (isset($author_post)) :
												  ?>
													Автор: <span><?php
																  $string = explode(" ", $author_post->post_title);
																  mb_regex_encoding('UTF-8');
																  mb_internal_encoding("UTF-8");
																  $charlistone = preg_split('/(?<!^)(?!$)/u', $string[1]);
																  $charlisttwo = preg_split('/(?<!^)(?!$)/u', $string[2]);
																  echo $string[0] . " " . $charlistone[0] . ". " . $charlisttwo[0] . ".";
																  ?></span>
												  <?php endif ?>

												</div>
											<time class="blog_items__bottom__date">
												<?php echo get_the_date(); ?>
											</time>
										</div>
										<?php if (get_the_title()) :?>
										<div class="blog_items__bottom__title">
											<?php the_title() ?>
										</div>
										<?php endif?>
										<span  class="blog_items__bottom__link">Прочитати</span>
									</div>
								</a>
							<?php endwhile;
							?>
						</div>


					<?php endif;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<!-- Related Posts END -->
	<?php endwhile
	?>
</main>
<?php
get_footer('main');
}
