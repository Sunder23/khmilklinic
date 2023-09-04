<?php

/**
 *  Template Name: Team
 */

get_header('main'); ?>
<main class="page_main">
    <!-- Section Team Hero -->
    <?php if (have_rows('section_one')) :
        while (have_rows('section_one')) : the_row(); ?>
            <section class="team_hero">
                <div class="team_hero__container">
                    <div class="team_hero__wrapper">
                        <div class="team_hero__top">
                            <?php if (get_sub_field('title')) : ?>
                                <div class="team_hero__title title_h2">
                                    <?php the_sub_field('title') ?>
                                </div>
                            <?php endif ?>
                            <?php if (get_sub_field('content')) : ?>
                                <div class="team_hero__content">
                                    <?php
                                    $image_desctop = get_sub_field('image');
                                    $image_tablet = get_sub_field('image_tablet');
                                    $image_mobile = get_sub_field('image_mobile');
                                    ?>
                                    <picture>
                                        <source srcset="<?php echo wp_get_attachment_image_url($image_tablet, 'medium') ?>" media="(max-width: 980px)">
                                        <source srcset="<?php echo wp_get_attachment_image_url($image_mobile, 'medium') ?>" media="(max-width: 765px)">
                                        <?php echo wp_get_attachment_image($image_desctop, 'medium'); ?>
                                    </picture>

                                    <div class="team_hero__right">
                                        <?php the_sub_field('content') ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="team_hero__bottom">
                            <?php if (get_sub_field('text')) : ?>
                                <div class="team_hero__text">
                                    <?php the_sub_field('text') ?>
                                </div>
                            <?php endif ?>
                            <?php if (have_rows('rules')) : ?>
                                <div class="team_hero__list">
                                    <?php while (have_rows('rules')) : the_row(); ?>
                                        <div class="team_hero__list_item">
                                            <div class="team_hero__list_title">
                                                <?php the_sub_field('title') ?>
                                            </div>
                                            <div class="team_hero__list_content">
                                                <?php the_sub_field('content') ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section Team Hero END -->
    <?php
        endwhile;
    endif;
    ?>
    <?php if (have_rows('section_two')) :
        while (have_rows('section_two')) : the_row(); ?>
            <!-- Section Team Doctors -->
            <section class="team_doctors">
                <div class="team_doctors__container">
                    <div class="team_doctors__wrapper">
                        <?php if (get_sub_field('title')) : ?>
                            <div class="team_doctors__title title_h2">
                                <?php the_sub_field('title') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('items')) : ?>
                            <div class="team_doctors__items">
                                <?php while (have_rows('items')) : the_row(); ?>
                                    <div class="team_doctors__item">
                                        <div class="team_doctors__num">
                                            <?php the_sub_field('number') ?>
                                        </div>
                                        <div class="team_doctors__text">
                                            <?php the_sub_field('text') ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </section>
            <!-- Section Team Doctors END -->
    <?php
        endwhile;
    endif;
    ?>
    <!--  Doctors section -->
    <section class="section_doctors">
        <div class="section_doctors__container">
            <div class="section_doctors_wrapper">
                <div class="tabs doctor_tabs">
                    <div class="tab__btns doctor_tabs_btn">
                        <button class="tab__btn tab__btn--active" data-item="item-1">
                            <span>Лікарі клініки у Львові</span>
                        </button>
                        <button class="tab__btn" data-item="item-2">
                            <span>Лікарі у Тернополі (Шептицького)</span>
                        </button>
                        <button class="tab__btn" data-item="item-3">
                            <span>Лікарі у Тернополі (Стадникової)</span>
                        </button>
                    </div>

                    <div class="tab__items doctor_tabs_items">

                        <div id="item-1" class="tab__item doctor_tabs_item tab__item--active">
                            <div class="doctor_tabs_swiper doctor_tabs_swiper_1 swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $postKhmil = get_post(8205);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    unset($postKhmil);
                                    $postKhmil = get_post(8221);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>

                                    <?php
                                    unset($postKhmil);
                                    $postKhmil = get_post(8225);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    $arr = array(
                                        'posts_per_page' => $posts_per_page,
                                        'post_type' => 'doctors',
                                        'post__not_in' => array(8205, 8221, 8225),
                                        'orderby'          => 'rand',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => 'lviv',
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => 'reproduktolog',
                                            )
                                        )
                                    );


                                    $query          = new WP_Query($arr);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                    <div class="doctor_tabs_item_card_title">
                                                        <?php $docName =  get_the_title();
                                                        $string = explode(" ", $docName);
                                                        echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_descr">
                                                        <?php the_excerpt() ?>
                                                    </div>
                                                    <?php if (get_field('kvalifikacziya')) : ?>
                                                        <div class="doctor_tabs_item_card_descr">
                                                            <?php echo get_field('kvalifikacziya') ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="relative_doc_cat">
                                                        <?php
                                                        $terms  = get_field('specialization');
                                                        if ($terms) :
                                                            foreach ($terms as $term) : ?>
                                                                <span><?php echo $term->name ?></span>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_btn btn_pink">
                                                        Записатись на прийом
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    unset($arr);
                                    unset($query);
                                    $arr = array(
                                        'posts_per_page' => $posts_per_page,
                                        'post_type' => 'doctors',
                                        'post__not_in' => array(8205, 8221, 8225),
                                        'orderby'          => 'rand',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => 'lviv',
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => 'ginekolog',
                                            )
                                        )
                                    );


                                    $query          = new WP_Query($arr);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                    <div class="doctor_tabs_item_card_title">
                                                        <?php $docName =  get_the_title();
                                                        $string = explode(" ", $docName);
                                                        echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_descr">
                                                        <?php the_excerpt() ?>
                                                    </div>
                                                    <?php if (get_field('kvalifikacziya')) : ?>
                                                        <div class="doctor_tabs_item_card_descr">
                                                            <?php echo get_field('kvalifikacziya') ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="relative_doc_cat">
                                                        <?php
                                                        $terms  = get_field('specialization');
                                                        if ($terms) :
                                                            foreach ($terms as $term) : ?>
                                                                <span><?php echo $term->name ?></span>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_btn btn_pink">
                                                        Записатись на прийом
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    // Specializations Tearm
                                    $exclude = array("ginekolog", "reproduktolog");
                                    $terms = get_terms(
                                        array(
                                            'taxonomy'   => 'specializations',
                                            'hide_empty' => false,
                                            'hierarchical' => false,
                                            'orderby' => 'rand',
                                            'order' => 'ASC',
                                            'exclude'  => array(316, 317),
                                        )
                                    );
                                    if ($terms) :
                                        foreach ($terms as $key => $term) :
                                            $query =  new WP_Query(
                                                array(
                                                    'posts_per_page' => 1,
                                                    'post_type' => 'doctors',
                                                    'post__not_in' => array(8205, 8221, 8225),
                                                    'tax_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'taxonomy' => 'clinics',
                                                            'field'    => 'slug',
                                                            'terms'    => 'lviv',
                                                        ),
                                                        array(
                                                            'taxonomy' => 'specializations',
                                                            'field'    => 'slug',
                                                            'terms'    => $term->slug,
                                                        )
                                                    )
                                                )
                                            );
                                    ?>
                                            <?php if ($query->have_posts()) : ?>
                                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                    <div class="swiper-slide">
                                                        <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="doctor_tabs_items_img">
                                                            <div class="doctor_tabs_item_card_title">
                                                                <?php $docName =  get_the_title();
                                                                $string = explode(" ", $docName);
                                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                                ?>
                                                            </div>
                                                            <div class="doctor_tabs_item_card_descr">
                                                                <?php the_excerpt() ?>
                                                            </div>
                                                            <?php if (get_field('kvalifikacziya')) : ?>
                                                                <div class="doctor_tabs_item_card_descr">
                                                                    <?php echo get_field('kvalifikacziya') ?>
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="relative_doc_cat">
                                                                <?php
                                                                $terms  = get_field('specialization');
                                                                if ($terms) :
                                                                    foreach ($terms as $term) : ?>
                                                                        <span><?php echo $term->name ?></span>
                                                                <?php endforeach;
                                                                endif;
                                                                ?>
                                                            </div>
                                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                                Записатись на прийом
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <?php wp_reset_query(); ?>
                                    <?php
                                        endforeach;
                                    endif; ?>

                                </div>
                            </div>
                            <div class="doctor_tabs_slider_pagination doctor_tabs_slider_pagination_1 green_pagination"></div>
                            <div class="doctor_tabs_bottom ">
                                <a href="/kolektyv-ternopil/" class="btn_pink_outline doctors_btn_outline">Ознайомитись з усім
                                    колективом</a>
                                <div class="doctor_tabs_bottom_arrows green_arrows_container">
                                    <div class="doctor_tabs_bottom_arrow green_arrows green_arrows_prev green_arrows_prev_1">
                                    </div>
                                    <div class="doctor_tabs_bottom_arrow green_arrows green_arrows_next green_arrows_next_1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="item-2" class="tab__item doctor_tabs_item">
                            <div class="doctor_tabs_swiper doctor_tabs_swiper_2 swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $postKhmil = get_post(8205);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    unset($postKhmil);
                                    $postKhmil = get_post(8221);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>

                                    <?php
                                    unset($postKhmil);
                                    $postKhmil = get_post(8225);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    $arr = array(
                                        'posts_per_page' => $posts_per_page,
                                        'post_type' => 'doctors',
                                        'post__not_in' => array(8205, 8221, 8225),
                                        'orderby'          => 'rand',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => 'stadnykovoyi',
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => 'reproduktolog',
                                            )
                                        )
                                    );


                                    $query          = new WP_Query($arr);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                    <div class="doctor_tabs_item_card_title">
                                                        <?php $docName =  get_the_title();
                                                        $string = explode(" ", $docName);
                                                        echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_descr">
                                                        <?php the_excerpt() ?>
                                                    </div>
                                                    <?php if (get_field('kvalifikacziya')) : ?>
                                                        <div class="doctor_tabs_item_card_descr">
                                                            <?php echo get_field('kvalifikacziya') ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="relative_doc_cat">
                                                        <?php
                                                        $terms  = get_field('specialization');
                                                        if ($terms) :
                                                            foreach ($terms as $term) : ?>
                                                                <span><?php echo $term->name ?></span>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_btn btn_pink">
                                                        Записатись на прийом
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    unset($arr);
                                    unset($query);
                                    $arr = array(
                                        'posts_per_page' => $posts_per_page,
                                        'post_type' => 'doctors',
                                        'post__not_in' => array(8205, 8221, 8225),
                                        'orderby'          => 'rand',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => 'stadnykovoyi',
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => 'ginekolog',
                                            )
                                        )
                                    );


                                    $query          = new WP_Query($arr);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                    <div class="doctor_tabs_item_card_title">
                                                        <?php $docName =  get_the_title();
                                                        $string = explode(" ", $docName);
                                                        echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_descr">
                                                        <?php the_excerpt() ?>
                                                    </div>
                                                    <?php if (get_field('kvalifikacziya')) : ?>
                                                        <div class="doctor_tabs_item_card_descr">
                                                            <?php echo get_field('kvalifikacziya') ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="relative_doc_cat">
                                                        <?php
                                                        $terms  = get_field('specialization');
                                                        if ($terms) :
                                                            foreach ($terms as $term) : ?>
                                                                <span><?php echo $term->name ?></span>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_btn btn_pink">
                                                        Записатись на прийом
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    // Specializations Tearm
                                    $exclude = array("ginekolog", "reproduktolog");
                                    $terms = get_terms(
                                        array(
                                            'taxonomy'   => 'specializations',
                                            'hide_empty' => false,
                                            'hierarchical' => false,
                                            'orderby' => 'rand',
                                            'order' => 'ASC',
                                            'exclude'  => array(316, 317),
                                        )
                                    );
                                    if ($terms) :
                                        foreach ($terms as $key => $term) :
                                            $query =  new WP_Query(
                                                array(
                                                    'posts_per_page' => 1,
                                                    'post_type' => 'doctors',
                                                    'post__not_in' => array(8205, 8221, 8225),
                                                    'tax_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'taxonomy' => 'clinics',
                                                            'field'    => 'slug',
                                                            'terms'    => 'stadnykovoyi',
                                                        ),
                                                        array(
                                                            'taxonomy' => 'specializations',
                                                            'field'    => 'slug',
                                                            'terms'    => $term->slug,
                                                        )
                                                    )
                                                )
                                            );
                                    ?>
                                            <?php if ($query->have_posts()) : ?>
                                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                    <div class="swiper-slide">
                                                        <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="doctor_tabs_items_img">
                                                            <div class="doctor_tabs_item_card_title">
                                                                <?php $docName =  get_the_title();
                                                                $string = explode(" ", $docName);
                                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                                ?>
                                                            </div>
                                                            <div class="doctor_tabs_item_card_descr">
                                                                <?php the_excerpt() ?>
                                                            </div>
                                                            <?php if (get_field('kvalifikacziya')) : ?>
                                                                <div class="doctor_tabs_item_card_descr">
                                                                    <?php echo get_field('kvalifikacziya') ?>
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="relative_doc_cat">
                                                                <?php
                                                                $terms  = get_field('specialization');
                                                                if ($terms) :
                                                                    foreach ($terms as $term) : ?>
                                                                        <span><?php echo $term->name ?></span>
                                                                <?php endforeach;
                                                                endif;
                                                                ?>
                                                            </div>
                                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                                Записатись на прийом
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <?php wp_reset_query(); ?>
                                    <?php
                                        endforeach;
                                    endif; ?>

                                </div>
                            </div>
                            <div class="doctor_tabs_slider_pagination doctor_tabs_slider_pagination_2 green_pagination"></div>
                            <div class="doctor_tabs_bottom ">
                                <a href="/kolektyv-ternopil/" class="btn_pink_outline doctors_btn_outline">Ознайомитись з усім
                                    колективом</a>
                                <div class="doctor_tabs_bottom_arrows green_arrows_container">
                                    <div class="doctor_tabs_bottom_arrow green_arrows green_arrows_prev green_arrows_prev_2">
                                    </div>
                                    <div class="doctor_tabs_bottom_arrow green_arrows green_arrows_next green_arrows_next_2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="item-3" class="tab__item doctor_tabs_item">
                            <div class="doctor_tabs_swiper doctor_tabs_swiper_2 swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $postKhmil = get_post(8205);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    unset($postKhmil);
                                    $postKhmil = get_post(8221);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>

                                    <?php
                                    unset($postKhmil);
                                    $postKhmil = get_post(8225);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo $postKhmil->guid; ?>" class="doctor_tabs_item_card">
                                            <img src="<?php echo get_the_post_thumbnail_url($postKhmil->ID, 'full'); ?>" alt="<?php echo $postKhmil->post_title; ?>" class="doctor_tabs_items_img">
                                            <div class="doctor_tabs_item_card_title">
                                                <?php $docName =  $postKhmil->post_title;
                                                $string = explode(" ", $docName);
                                                echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_descr">
                                                <?php echo $postKhmil->post_excerpt; ?>
                                            </div>
                                            <?php if (get_field('kvalifikacziya', $postKhmil)) : ?>
                                                <div class="doctor_tabs_item_card_descr">
                                                    <?php echo get_field('kvalifikacziya', $postKhmil) ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="relative_doc_cat">
                                                <?php
                                                $terms  = get_field('specialization', $postKhmil);
                                                if ($terms) :
                                                    foreach ($terms as $term) : ?>
                                                        <span><?php echo $term->name ?></span>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="doctor_tabs_item_card_btn btn_pink">
                                                Записатись на прийом
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    $arr = array(
                                        'posts_per_page' => $posts_per_page,
                                        'post_type' => 'doctors',
                                        'post__not_in' => array(8205, 8221, 8225),
                                        'orderby'          => 'rand',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => 'sheptyczkogo',
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => 'reproduktolog',
                                            )
                                        )
                                    );


                                    $query          = new WP_Query($arr);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                    <div class="doctor_tabs_item_card_title">
                                                        <?php $docName =  get_the_title();
                                                        $string = explode(" ", $docName);
                                                        echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_descr">
                                                        <?php the_excerpt() ?>
                                                    </div>
                                                    <?php if (get_field('kvalifikacziya')) : ?>
                                                        <div class="doctor_tabs_item_card_descr">
                                                            <?php echo get_field('kvalifikacziya') ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="relative_doc_cat">
                                                        <?php
                                                        $terms  = get_field('specialization');
                                                        if ($terms) :
                                                            foreach ($terms as $term) : ?>
                                                                <span><?php echo $term->name ?></span>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_btn btn_pink">
                                                        Записатись на прийом
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    unset($arr);
                                    unset($query);
                                    $arr = array(
                                        'posts_per_page' => $posts_per_page,
                                        'post_type' => 'doctors',
                                        'post__not_in' => array(8205, 8221, 8225),
                                        'orderby'          => 'rand',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'clinics',
                                                'field'    => 'slug',
                                                'terms'    => 'sheptyczkogo',
                                            ),
                                            array(
                                                'taxonomy' => 'specializations',
                                                'field'    => 'slug',
                                                'terms'    => 'ginekolog',
                                            )
                                        )
                                    );
                                    
                                    $query          = new WP_Query($arr);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                    <div class="doctor_tabs_item_card_title">
                                                        <?php $docName =  get_the_title();
                                                        $string = explode(" ", $docName);
                                                        echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_descr">
                                                        <?php the_excerpt() ?>
                                                    </div>
                                                    <?php if (get_field('kvalifikacziya')) : ?>
                                                        <div class="doctor_tabs_item_card_descr">
                                                            <?php echo get_field('kvalifikacziya') ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="relative_doc_cat">
                                                        <?php
                                                        $terms  = get_field('specialization');
                                                        if ($terms) :
                                                            foreach ($terms as $term) : ?>
                                                                <span><?php echo $term->name ?></span>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="doctor_tabs_item_card_btn btn_pink">
                                                        Записатись на прийом
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    // Specializations Tearm
                                    $terms = get_terms(
                                        array(
                                            'taxonomy'   => 'specializations',
                                            'hide_empty' => false,
                                            'hierarchical' => false,
                                            'orderby' => 'rand',
                                            'order' => 'ASC',
                                            'exclude'  => array(316, 317),
                                        )
                                    );

                                    if ($terms) :
                                        foreach ($terms as $key => $term) :
                                            $query =  new WP_Query(
                                                array(
                                                    'posts_per_page' => 1,
                                                    'post_type' => 'doctors',
                                                    'post__not_in' => array(8205, 8221, 8225),
                                                    'tax_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'taxonomy' => 'clinics',
                                                            'field'    => 'slug',
                                                            'terms'    => 'sheptyczkogo',
                                                        ),
                                                        array(
                                                            'taxonomy' => 'specializations',
                                                            'field'    => 'slug',
                                                            'terms'    => $term->slug,
                                                        )
                                                    )
                                                )
                                            );
                                    ?>
                                            <?php
                                           
                                            
                                            if ($query->have_posts()) : 
                                                $test = [];
                                            ?>
                                                <?php while ($query->have_posts()) : $query->the_post();
                                                    if (!in_array(get_the_id(), $test)) : ?>
                                                        <div id="post-<?php echo get_the_ID() ?>" class="swiper-slide">
                                                            <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="doctor_tabs_items_img">
                                                                <div class="doctor_tabs_item_card_title">
                                                                    <?php $docName =  get_the_title();
                                                                    $string = explode(" ", $docName);
                                                                    echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                                                                    ?>
                                                                    fasdfasdfdas
                                                                </div>
                                                                <div class="doctor_tabs_item_card_descr">
                                                                    <?php the_excerpt() ?>
                                                                </div>
                                                                <?php if (get_field('kvalifikacziya')) : ?>
                                                                    <div class="doctor_tabs_item_card_descr">
                                                                        <?php echo get_field('kvalifikacziya') ?>
                                                                    </div>
                                                                <?php endif ?>
                                                                <div class="relative_doc_cat">
                                                                    <?php
                                                                    $terms  = get_field('specialization');
                                                                    if ($terms) :
                                                                        foreach ($terms as $term) : ?>
                                                                            <span><?php echo $term->name ?></span>
                                                                    <?php endforeach;
                                                                    endif;
                                                                    ?>

                                                                </div>
                                                                <div class="doctor_tabs_item_card_btn btn_pink">
                                                                    Записатись на прийом
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php                                                    
                                                    endif; ?>
                                                <?php endwhile; ?>
                                                
                                            <?php endif; ?>
                                                    
                                            <?php wp_reset_query(); ?>
                                    <?php
                                        endforeach;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="doctor_tabs_slider_pagination doctor_tabs_slider_pagination_3 green_pagination"></div>
                            <div class="doctor_tabs_bottom ">
                                <a href="/kolektyv-ternopil/" class="btn_pink_outline doctors_btn_outline">Ознайомитись з усім
                                    колективом</a>
                                <div class="doctor_tabs_bottom_arrows green_arrows_container">
                                    <div class="doctor_tabs_bottom_arrow green_arrows green_arrows_prev green_arrows_prev_3">
                                    </div>
                                    <div class="doctor_tabs_bottom_arrow green_arrows green_arrows_next green_arrows_next_3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Doctors section END -->

    <?php if (have_rows('section_three')) :
        while (have_rows('section_three')) : the_row(); ?>
            <!-- Section Team CTA -->
            <section class="team_cta">
                <div class="team_cta__container">
                    <div class="team_cta__wrapper">
                        <div class="team_cta__form">
                            <?php if (get_sub_field('title')) : ?>
                                <div class="team_cta__title title_h2">
                                    <?php the_sub_field('title') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('form_shortcode')) :
                                echo do_shortcode('' . get_sub_field('form_shortcode') . '');
                            endif;
                            ?>
                        </div>
                        <?php if (have_rows('slider')) : ?>
                            <div class="team_cta__slider">
                                <div class="swiper team_cta__swiper ">
                                    <div class="swiper-wrapper">
                                        <?php while (have_rows('slider')) : the_row(); ?>
                                            <div class="swiper-slide">
                                                <div class="team_cta__card">
                                                    <?php $slide = get_sub_field('image');
                                                    echo wp_get_attachment_image($slide, 'medium') ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                    <div class="section_slider_pagination team_cta__pagination"></div>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- Section Team CTA END -->
    <?php
        endwhile;
    endif;
    ?>

    <?php if (have_rows('section_four')) :
        while (have_rows('section_four')) : the_row(); ?>
            <!-- Section Services -->
            <section class="team_servives">
                <div class="team_servives__container">
                    <div class="team_servives__wrapper">
                        <?php if (get_sub_field('title')) : ?>
                            <div class="team_servives__title title_h2">
                                <?php the_sub_field('title') ?>
                            </div>
                        <?php endif; ?>
                        <?php $terms  = get_sub_field('specialization'); ?>
                        <?php if ($terms) : ?>
                            <div class="team_servives__row team_servives__row_desctop">
                                <div class="team_servives__items">
                                    <?php
                                    $i = 1;
                                    foreach ($terms as $term) : ?>
                                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="team_servives__item">
                                            <?php echo esc_html(get_term($term)->name); ?>
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 0.842768C10.5 0.566626 10.2761 0.342768 10 0.342768L5.50001 0.342768C5.22386 0.342768 5.00001 0.566626 5.00001 0.842768C5.00001 1.11891 5.22386 1.34277 5.50001 1.34277L9.50001 1.34277L9.50001 5.34277C9.50001 5.61891 9.72386 5.84277 10 5.84277C10.2761 5.84277 10.5 5.61891 10.5 5.34277L10.5 0.842768ZM1.16117 10.3887L10.3536 1.19632L9.64645 0.489215L0.454064 9.6816L1.16117 10.3887Z" fill="none" />
                                            </svg>
                                        </a>
                                        <?php if (!($i++ % 8)) : ?>
                                </div>
                                <div class="team_servives__items">
                                <?php endif ?>
                            <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="team_servives__row team_servives__row_tablet">
                                <div class="team_servives__items">
                                    <?php
                                    $i = 1;
                                    foreach ($terms as $term) : ?>
                                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="team_servives__item">
                                            <?php echo esc_html(get_term($term)->name); ?>
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 0.842768C10.5 0.566626 10.2761 0.342768 10 0.342768L5.50001 0.342768C5.22386 0.342768 5.00001 0.566626 5.00001 0.842768C5.00001 1.11891 5.22386 1.34277 5.50001 1.34277L9.50001 1.34277L9.50001 5.34277C9.50001 5.61891 9.72386 5.84277 10 5.84277C10.2761 5.84277 10.5 5.61891 10.5 5.34277L10.5 0.842768ZM1.16117 10.3887L10.3536 1.19632L9.64645 0.489215L0.454064 9.6816L1.16117 10.3887Z" fill="none" />
                                            </svg>
                                        </a>
                                        <?php if (!($i++ % 12)) : ?>
                                </div>
                                <div class="team_servives__items">
                                <?php endif ?>
                            <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="team_servives__row team_servives__row_mobile">
                                <div class="team_servives__swiper swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="team_servives__items">
                                                <?php
                                                $i = 1;
                                                foreach ($terms as $term) : ?>
                                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="team_servives__item">
                                                        <?php echo esc_html(get_term($term)->name); ?>
                                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 0.842768C10.5 0.566626 10.2761 0.342768 10 0.342768L5.50001 0.342768C5.22386 0.342768 5.00001 0.566626 5.00001 0.842768C5.00001 1.11891 5.22386 1.34277 5.50001 1.34277L9.50001 1.34277L9.50001 5.34277C9.50001 5.61891 9.72386 5.84277 10 5.84277C10.2761 5.84277 10.5 5.61891 10.5 5.34277L10.5 0.842768ZM1.16117 10.3887L10.3536 1.19632L9.64645 0.489215L0.454064 9.6816L1.16117 10.3887Z" fill="none" />
                                                        </svg>
                                                    </a>
                                                    <?php if (!($i++ % 12)) : ?>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="team_servives__items">
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="green_pagination team_servives__swiper__pagination"></div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>
            <!-- Section Services END -->
    <?php
        endwhile;
    endif;
    ?>
    <?php if (have_rows('section_five')) :
        while (have_rows('section_five')) : the_row(); ?>
            <!-- Clinics section -->
            <section class="section_clinics section_clinics__team">
                <div class="section_clinics__container">
                    <div class="section_clinics_wrapper">
                        <?php if (get_sub_field('title')) : ?>
                            <div class="section_clinics_title title_h2">
                                <?php the_sub_field('title'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('cliniks')) : ?>
                            <div class="section_clinics_items">
                                <?php while (have_rows('cliniks')) : the_row(); ?>
                                    <div class="section_clinics_item">
                                        <?php if (get_sub_field("image")) : ?>
                                            <div class="section_clinics_img"><img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('title') ?>"></div>
                                        <?php endif ?>
                                        <?php if (get_sub_field("title")) : ?>
                                            <div class="section_clinics_item_title"><?php the_sub_field('title') ?></div>
                                        <?php endif ?>
                                        <?php if (get_sub_field("link")) : ?>
                                            <a href="<?php the_sub_field("link") ?>" class="btn_pink_outline clinics_btn">Перейти на сторінку клініки</a>
                                        <?php endif ?>
                                    </div>
                                <?php endwhile ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>
            <!-- Clinics section END -->
    <?php endwhile;
    endif; ?>
    <?php if (have_rows('section_six')) :
        while (have_rows('section_six')) : the_row(); ?>
            <!-- Form section -->
            <section class="section_form">
                <div class="section_form__container">
                    <div class="section_form_wrapper">
                        <div class="section_form_left">
                            <?php if (get_sub_field('title')) : ?>
                                <div class="section_form_title title_h2">
                                    <?php the_sub_field('title') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('text')) : ?>
                                <div class="section_form_text">
                                    <?php the_sub_field('text') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('form_shortcode')) :
                                $shortcode = get_sub_field('form_shortcode');
                            ?>
                                <?php echo do_shortcode(" . $shortcode . ") ?>
                            <?php endif; ?>
                        </div>
                        <?php if (have_rows('images')) : ?>
                            <div class="section_form_right">
                                <?php while (have_rows('images')) : the_row(); ?>
                                    <?php if (get_sub_field('image')) : ?>
                                        <div class="section_form_right_img">
                                            <img src="<?php the_sub_field('image') ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- Form section END -->
    <?php endwhile;
    endif; ?>
</main>
<div class="team_field">
    <?php
    $terms = get_terms(
        array(
            'taxonomy'   => 'specializations',
            'hide_empty' => false,
            'hierarchical' => false,
            'orderby' => 'name',
            'order' => 'ASC',
            // 		'parent' => 0
        )
    );
    if ($terms) :
        foreach ($terms as $key => $term) :
    ?>
            <option class="team_field__spec" value='<?php echo $term->name ?>'>
                <?php echo $term->name ?>
            </option>
    <?php
        endforeach;
    endif; ?>
    <?php
    $query          = new WP_Query(
        [
            'post_type'      => 'doctors',
            'posts_per_page' => -1,
            'orderby'          => 'id',
            'order' => 'ASC',
        ]
    );
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <option class="team_field__doc" value='<?php echo the_title() ?>'>
                <?php the_title() ?>
            </option>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer('main'); ?>