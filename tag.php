<?php

/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 */

get_header('main'); ?>

<!-- Tag Hero -->
<div class="blog_tag">
    <div class="blog_tag__container">
        <div class="blog_tag__wrapper">
            <div class="blog_hero__title title_h2">
                <?php
                echo single_tag_title('', false);
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Tag Hero END -->
<!-- Blog Itmes -->
<section class="blog_items">
    <?php
    $args = array(
        'post_type'      => 'post',
        'paged'          => $paged,
        'orderby'          => 'id',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field' => 'id',
                'terms' => get_queried_object()->term_id,
            ),
        ),
    );
    $query = new WP_Query($args);
    ?>
    <?php if ($query->have_posts()) : ?>
        <div class="blog_items__container">
            <div class="blog_items__wrapper">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <a href="<?php the_permalink() ?>" <?php post_class('blog_items__item'); ?> id='post-<?php the_ID() ?>'>
                        <div class="blog_items__top">
                            <div class="blog_items__cat">
                                <?php
                                $category = get_queried_object();
                                $current_cat_id = $category->term_id;
                                echo $current_cat_name = $category->name;
                                ?>
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
                                <?php $author_post = get_field('post_author')->post_title;
										if (isset($author_post)) :
										?>
											Автор: <span><?php
															$string = explode(" ", $author_post);
															mb_regex_encoding('UTF-8');
															mb_internal_encoding("UTF-8");
															$charlistone = preg_split('/(?<!^)(?!$)/u', $string[1]);
															$charlisttwo = preg_split('/(?<!^)(?!$)/u', $string[2]);
															echo $string[0] . " " . $charlistone[0] . ". " . $charlisttwo[0] . ".";
															?></span>
										<?php endif ?>
                                </div>
                                <time class="blog_items__bottom__date">
                                    <?php the_date()
                                    ?>
                                </time>
                            </div>
                            <div class="blog_items__bottom__title">
                                <?php the_title() ?>
                            </div>
                            <span  class="blog_items__bottom__link">Прочитати</span>
                        </div>
                    </a>
                <?php endwhile;
                ?>
            </div>


        <?php else :
        echo "<div class='blog_hero__title title_h2'>
						В даному розділі публікацій немає 
					</div>"
        ?>


        <?php endif;
    wp_reset_postdata();
        ?>
        </div>
</section>
<!-- Blog Itmes END -->
<?php
get_footer('main');
