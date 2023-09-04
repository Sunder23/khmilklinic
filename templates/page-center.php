<?php

/**
 *  Template Name: Centers
 */

get_header('main');
?>
<main class="page_main">
    <!-- Centers Hero -->
    <section class="centers_hero">
        <div class="centers_hero__container">
            <div class="centers_hero__wrapper">
                <div class="centers_hero__title title_h2">
                    Команда клініки м. Львів вул. Липова Алея, 13
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
                <?php $terms  = get_field('cat_spec');
                if ($terms) :
                ?>
                    <div class="centers_content__left">
                        <ul class="centers_content__list">
                            <?php
                            foreach ($terms as $key => $term) :
                            ?><li>
                                    <a href="<?php echo get_term_link($term); ?>" class="centers_content__term  <?php if ($key == 1) {echo 'active';} ?> "><?php echo $term->name ?></a>
                                </li>
                            <?php endforeach  ?>
                        </ul>
                    </div>
                <?php endif ?>



                <?php $terms  = get_field('cat_spec');
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
                            <?php foreach ($terms as $key => $term) :
                            ?>
                                <a href="<?php echo get_term_link($term); ?>" class="blog_hero_item  <?php if ($key == 1) {echo 'active';} ?>
                            <?php if ($_SERVER['REQUEST_URI'] == $cat->slug) {
                                    echo 'active';
                                } ?>
                            "><?php echo $term->name ?></a>
                            <?php endforeach ?>
                        <?php endif ?>
                        </div>
                    </div>




                    <div class="centers_hero__btn blog_hero__btn">
                        Інші напрями
                    </div>
                    <div class="centers_content__right">
                        <div class="centers_right__wrapper">
                            <?php
                            $current = absint(
                                max(
                                    1,
                                    get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                                )
                            );
                            $posts_per_page = -1;
                            $query          = new WP_Query(
                                [
                                    'post_type'      => 'post',
                                    'posts_per_page' => $posts_per_page,
                                    'paged'          => $current,
                                    'orderby'          => 'id',
                                    'order' => 'ASC',
                                    'cat'              => array(276),
                                ]
                            );

                            ?>
                            <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                        <div class="doctor_tabs_item_card_top">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php the_title(); ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php the_excerpt() ?>
                                            </div>
                                            <div class="relative_doc_cat">
                                                <?php $category = get_the_category();
                                                echo $category[0]->cat_name; ?>
                                            </div>
                                        </div>

                                        <div class="relative_doc__btn btn_pink">
                                            Записатись на прийом
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>

                    </div>
            </div>
        </div>
    </section>
    <!-- Centers Content END -->
</main>

<?php get_footer('main'); ?>