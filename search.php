<?php

get_header('main');

if(isset($_COOKIE["clinic"]) && $_COOKIE["clinic"] != '') {
    $clinic = $_COOKIE["clinic"];
} else {
    $clinic = "lviv";
}

$clinica = get_term_by('slug', $clinic, 'clinics');
$squery = trim( get_search_query() );
?>
<main class="page_main">

    <!-- Centers Hero -->
    <section class="centers_hero">
        <div class="centers_hero__container">
            <div class="centers_hero__wrapper">
                <div class="centers_hero__title title_h2">
                    <?php echo $clinica->description?><br/>
                    Пошук: "<?php echo $squery ?>"
                </div>
                <div class="centers_hero__seatch">
                    <form action="/" class="centers_hero__form">
                        <input type="text" name='s' placeholder="Введіть прізвище або спеціалізацію лікаря" class="centers_hero__input">
                        <button type="submit" class="centers_hero__btn btn_pink">Знайти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Centers Hero END -->
    <!-- Centers Content -->
    <section class="centers_content">
        <div class="centers_content__container">
            <div class="centers_content__wrapper">


                <?php
                // Specializations Tearm
                $terms = get_terms(
                    array(
                        'taxonomy'   => 'specializations',
                        'hide_empty' => false,
                        'hierarchical' => false,
                        'orderby' => 'name',
                        'order' => 'ASC',
                    )
                );
                
                $spec = array();
                
                foreach ($terms as $key => $term) :
                if(strpos(mb_strtolower($term->name), mb_strtolower($squery)) !== false) {
                    $spec[$term->slug] = $term->slug;
                }
                endforeach;
                
                if(count($spec) > 0) {
                    if ($terms) :
                    ?>
                    <div class="centers_content__left">
                        <ul class="centers_content__list">
                            <?php
                            foreach ($terms as $key => $term) :
                            
                            if(isset($spec[$term->slug])) {
                                
                                $posts_array = get_posts(
                                    array(
                                        'posts_per_page' => 1,
                                        'post_type' => 'doctors',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => $clinic,
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => $term->slug,
                                            )
                                        )
                                    )
                                );
                                
                                if(count($posts_array) > 0) {
                                
                                ?><li>
                                        <a href="<?php echo get_term_link($term); ?>" class="centers_content__term "><?php echo $term->name ?></a>
                                    </li>
                       		<?php }  } endforeach  ?>
                        </ul>
                    </div>
                <?php endif;
                } else {
                    
                    $page = get_queried_object();
                    if ($terms) :
                    ?>
                    <div class="centers_content__left">
                        <ul class="centers_content__list">
                            <?php
                            foreach ($terms as $key => $term) :
                            
                            $posts_array = get_posts(
                                array(
                                    'posts_per_page' => 1,
                                    'post_type' => 'doctors',
                                    's' => $squery,
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'clinics',
                                            'field'    => 'slug',
                                            'terms'    => $clinic,
                                        ),
                                        array(
                                            'taxonomy' => 'specializations',
                                            'field'    => 'slug',
                                            'terms'    => $term->slug,
                                        )
                                    )
                                )
                            );
                            
                            if(strpos(mb_strtolower($term->name), mb_strtolower($squery)) !== false) {
                                $spec[] = $term->slug;
                            }
                            
                            //print_r('<pre>'); print_r($term); print_r('</pre>');
                            
                            if(count($posts_array) > 0) {
                            
                            ?><li>
                                    <a href="<?php echo get_term_link($term); ?>" class="centers_content__term "><?php echo $term->name ?></a>
                                </li>
                            <?php } endforeach  ?>
                        </ul>
                    </div>
                <?php endif;
                } ?>



                <?php
                if ($terms) :
                ?>
                    <div class="blog_mobile canters_mobile">
                        <div class="blog_mobile__wrapper">
                            <div class="blog_mobile__items__title title_h2">
                                Спеціалізації лікарів
                            </div>
                            <div class="blog_mobile__close">
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 2L13.5 0.5L7.5 6.5L1.5 0.5L0 2L6 8L0 14L1.5 15.5L7.5 9.5L13.5 15.5L15 14L9 8L15 2Z" fill="white" />
                                </svg>
                            </div>
                        </div>
                        <div class="blog_hero__items blog_hero__items__mobile">
                            <?php foreach ($terms as $term) :
                            ?>
                                <a href="<?php echo get_term_link($term); ?>" class="blog_hero_item 
                            "><?php echo $term->name ?></a>
                            <?php endforeach ?>
                        <?php endif ?>
                        </div>
                    </div>




                    <div class="centers_hero__btn blog_hero__btn">
                        Інші напрями
                    </div>
                    <div class="centers_content__right">
                        <?php
                        $current = absint(
                            max(
                                1,
                                get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                            )
                        );

                        $term = get_queried_object();
                        $posts_per_page = -1;
                        
                        if(count($spec) > 0) {
                            $query          = new WP_Query(
                                [
                                    'post_type'      => 'doctors',
                                    'posts_per_page' => $posts_per_page,
                                    'paged'          => $current,
                                    'orderby'          => 'id',
                                    'order' => 'ASC',
                                    'tax_query'      => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'clinics',
                                            'field'    => 'slug',
                                            'terms'    => $clinic,
                                        ),
                                        array(
                                            'taxonomy' => 'specializations',
                                            'field'    => 'slug',
                                            'terms'    => $spec,
                                        ),
                                    ),
                                    
                                ]
                            );
                        } else {
                            $query          = new WP_Query(
                                [
                                    'post_type'      => 'doctors',
                                    'posts_per_page' => $posts_per_page,
                                    'paged'          => $current,
                                    'orderby'          => 'id',
                                    'order' => 'ASC',
                                    's' => $squery,
                                    'tax_query'      => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'clinics',
                                            'field'    => 'slug',
                                            'terms'    => $clinic,
                                        )
                                    ),
                                    
                                ]
                            );
                        }
                       
                        ?>
                        <?php if ($query->have_posts()) : ?>
                            <div class="centers_right__wrapper">

                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                        <div class="doctor_tabs_item_card_top">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
												<?php $docName =  get_the_title();
														$string = explode(" ", $docName);
														echo $string[0] . "<br>" ." ". $string[1] . " " . $string[2];
												  ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php the_excerpt() ?>
                                            </div>
                                            <div class="relative_doc_cat">
                                                <?php  ?>
                                            </div>
                                        </div>

                                        <div class="relative_doc__btn btn_pink">
                                            Записатись на прийом
                                        </div>
                                    </a>
                                <?php endwhile; ?>

                            </div>
                        <?php else : ?>
                            <div class="centers_not__found title_h2">
                                Лікарів не знайдено
                            </div>
                        <? endif; ?>
                        <?php wp_reset_query(); ?>

                    </div>
            </div>
        </div>
    </section>
    <!-- Centers Content END -->
</main>

<?php get_footer('main'); ?>