<?php

/**
 *  Template Name: Homepage
 */

get_header('main'); ?>
<main class="page_main">
    <?php if (have_rows('section_one')) : ?>
        <!-- Section Slider -->
        <section class="section_slider">
            <div class="section_slider__container">
                <div class="section_slider_wrapper">
                    <div class="section_slider_swiper swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $i = 1;
                            while (have_rows('section_one')) : the_row();
                                $slide = get_sub_field('slide');
                                if (have_rows('slide')) :
                                    while (have_rows('slide')) : the_row(); ?>
                                        <div class="swiper-slide <?php if (get_sub_field('text_place')) : ?> text_place_right <?php endif ?> swiper-slide_<?php echo $i ?>" <?php if (get_sub_field('desctop_image')) : ?> style="background-image: url(<?php the_sub_field('desctop_image') ?>);" <?php endif; ?>>
                                            <div class="section_slider_card_mobile" <?php if (get_sub_field('mobile_image')) : ?> style="background-image: url(<?php the_sub_field('mobile_image') ?>);" <?php endif; ?>>
                                                <div class="section_slider_card" <?php if (get_sub_field('text_color')) : ?> style='color: <?php the_sub_field('text_color') ?>' <?php endif ?>>
                                                    <?php if (get_sub_field('subtitle')) : ?>
                                                        <div class="section_slider_card_subtitle section_slider_card_subtitle_<?php echo $i ?>">
                                                            <?php the_sub_field('subtitle') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (get_sub_field('title')) : ?>
                                                        <div class="section_slider_card_title section_slider_card_title_<?php echo $i ?>">
                                                            <?php the_sub_field('title') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (get_sub_field('text')) : ?>
                                                        <div class="section_slider_card_text section_slider_card_text_<?php echo $i ?>">
                                                            <?php the_sub_field('text') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (get_sub_field('link')['url']) : ?>
                                                        <a href="<?php echo get_sub_field('link')['url'] ?>" class="btn_pink section_slider_card_btn">Детальніше
                                                            <div class="btn_pink_arrow"><svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.51667L1.51667 0L8.01667 6.5L1.51667 13L0 11.4833L4.98333 6.5L0 1.51667Z" fill="white" />
                                                                </svg>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <style>
                                                .section_slider_card_title_<?php echo $i ?> {
                                                    max-width: <?php echo $slide['title_desctop_width'] ?>px;
                                                }

                                                .section_slider_card_text_<?php echo $i ?> {
                                                    max-width: <?php echo $slide['text_desctop_width'] ?>px;
                                                }

                                                .section_slider_swiper .swiper-slide.swiper-slide_<?php echo $i ?> {
                                                    <?php if ($slide['contnet_position'] === 'top') :
                                                        echo 'align-items: flex-start';
                                                    elseif ($slide['bottom'] === 'top') :
                                                        echo 'align-items: flex-end';
                                                    else :
                                                        echo 'align-items: center';
                                                    endif;
                                                    ?>
                                                }

                                                @media screen and (max-width: 764.98px) {
                                                    .section_slider_card_subtitle_<?php echo $i ?> {
                                                        font-size: <?php echo $slide['subtitle_mobiel_font_size'] ?>px;
                                                    }

                                                    .section_slider_card_title_<?php echo $i ?> {
                                                        font-size: <?php echo $slide['title_mobile_font_size'] ?>px;
                                                        max-width: <?php echo $slide['title_mobile_width'] ?>px;
                                                    }

                                                    .section_slider_card_text_<?php echo $i ?> {
                                                        font-size: <?php echo $slide['text_mobile_font_size'] ?>px;
                                                        max-width: <?php echo $slide['text_mobile_width'] ?>px;
                                                    }
                                                }
                                            </style>
                                        </div>
                                        <?php $i++; ?>
                            <?php endwhile;
                                endif;
                            endwhile;
                            ?>
                        </div>
                        <!-- Pagination -->
                        <div class="section_slider_pagination"></div>
                        <!-- Arows -->
                        <div class="global_slider_arrows_container ">
                            <div class="global_slider_arrows global_slider_arrows-prev section_slider_arrows section_slider_arrows-prev">
                                <img src="/wp-content/themes/Impreza/icons/main_swiper_arrow.svg" alt="">
                            </div>
                            <div class="global_slider_arrows global_slider_arrows-next section_slider_arrows section_slider_arrows-next">
                                <img src="/wp-content/themes/Impreza/icons/main_swiper_arrow.svg" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Section Slider END -->
    <?php endif; ?>
    <!-- Services section -->
    <?php if (have_rows('section_two')) :
        while (have_rows('section_two')) : the_row(); ?>
            <section class="services_section">
                <div class="services_section__container">
                    <div class="services_section_wrapper">
                        <?php if (get_sub_field('title')) : ?>
                            <div class="services_section_title title_h2">
                                <?php the_sub_field('title'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('text')) : ?>
                            <div class="services_section_text">
                                <?php the_sub_field('text'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="services_section_items">
                            <?php
                            $i = 1;
                            if (have_rows('services')) :
                                while (have_rows('services')) : the_row(); ?>
                                    <?php if (get_sub_field('hide') === false) : ?>
                                        <div class="services_section_item <?php if ($i > 3) : ?> block_collapsed <?php endif ?>">
                                            <?php if (get_sub_field('image')) : ?>
                                                <img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('title') ?>" class="services_section_items_img">
                                            <?php endif; ?>
                                            <?php if (get_sub_field('titile')) : ?>
                                                <div class="services_section_item_title">
                                                    <?php the_sub_field('titile') ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (have_rows('list')) : ?>
                                                <ul class="services_section_item_list">
                                                    <?php while (have_rows('list')) : the_row(); ?>
                                                        <li><a href='<?php echo get_sub_field('item')['url'] ?>'><?php echo get_sub_field('item')['title'] ?></a></li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                            <?php if ($i > 3) : ?>
                                                <!--  									<?php //if(get_sub_field('links')['url']):
                                                                                            ?>
									<a href="<?php //echo get_sub_field('links')['url']
                                                ?>" class="btn_pink_outline services_section_item_btn_more">Дізнатись більше</a>
									<?php //endif
                                    ?> -->
                                                <a href="#" class="btn_pink services_section_item_btn pop_up_btn">Записатись на прийом</a>
                                            <?php else : ?>
                                                <a href="#" class="btn_pink services_section_item_btn pop_up_btn">Записатись на прийом</a>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>
                            <?php $i++;
                                endwhile;
                            endif; ?>
                        </div>

                        <button class="btn_pink_outline services_section_btn_outline">Ознайомтесь з іншими послугами центру</button>

                    </div>
                </div>
            </section>
            <!-- Services section END -->
    <?php endwhile;
    endif; ?>
    <?php if (have_rows('section_three')) :
        while (have_rows('section_three')) : the_row(); ?>
            <!-- Clinics section -->
            <section class="section_clinics">
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
                                            <a href="<?php the_sub_field("link") ?>" class="btn_pink_outline clinics_btn">Переглянути лікарів клініки</a>
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
    <?php if (have_rows('section_four')) : ?>
        <!-- Benefits section -->
        <section class="section_benefits">
            <div class="section_benefits__container">
                <div class="section_benefits_wrapper">
                    <div class="section_benefits_slider swiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('section_four')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="section_benefits_card">
                                        <div class="section_benefits_left">
                                            <div class="section_benefits_pagination"></div>
                                            <div class="section_benefits_card_subtitle">
                                                Переваги клініки
                                            </div>
                                            <?php if (get_sub_field('title')) : ?>
                                                <div class="section_benefits_card_title">
                                                    <?php the_sub_field('title') ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('text')) : ?>
                                                <div class="section_benefits_card_text">
                                                    <?php the_sub_field('text') ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="btn_gray section_benefits_card_btn section_benefits_arrows-next">
                                                Гортай вправо
                                                <div class="btn_pink_arrow"><svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.51667L1.51667 0L8.01667 6.5L1.51667 13L0 11.4833L4.98333 6.5L0 1.51667Z" fill="white" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (get_sub_field('image')) : ?>
                                            <div class="section_benefits_right">
                                                <img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('title') ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <!-- Arows -->
                        <div class="global_slider_arrows_container ">
                            <div class="global_slider_arrows global_slider_arrows-prev section_benefits_arrows section_benefits_arrows-prev">
                                <img src="/wp-content/themes/Impreza/icons/main_swiper_arrow.svg" alt="">
                            </div>
                            <div class="global_slider_arrows global_slider_arrows-next section_benefits_arrows section_benefits_arrows-next">
                                <img src="/wp-content/themes/Impreza/icons/main_swiper_arrow.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Benefits section END -->
    <?php endif; ?>
    <?php if (have_rows('section_five')) :
        while (have_rows('section_five')) : the_row(); ?>
            <!-- Counter section -->
            <section class="section_counter">
                <div class="section_counter__container">
                    <div class="section_counter_items">
                        <?php if (have_rows('item_1')) :
                            while (have_rows('item_1')) : the_row(); ?>
                                <div class="section_counter_item">
                                    <div class="section_counter_item_number">
                                        <span class="count"><?php the_sub_field('number') ?></span>
                                    </div>
                                    <div class="section_counter_item_title">
                                        <?php the_sub_field('title') ?>
                                    </div>
                                    <div class="section_counter_item_text">
                                        <?php the_sub_field('text') ?>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                        <?php if (have_rows('item_2')) :
                            while (have_rows('item_2')) : the_row(); ?>
                                <div class="section_counter_item">
                                    <div class="section_counter_item_number">
                                        <span class="count"><?php the_sub_field('number') ?></span>
                                    </div>
                                    <div class="section_counter_item_title">
                                        <?php the_sub_field('title') ?>
                                    </div>
                                    <div class="section_counter_item_text">
                                        <?php the_sub_field('text') ?>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                        <?php if (have_rows('item_3')) :
                            while (have_rows('item_3')) : the_row(); ?>
                                <div class="section_counter_item">
                                    <div class="section_counter_item_number">
                                        <span class="count"><?php the_sub_field('number') ?></span>
                                        %
                                    </div>
                                    <div class="section_counter_item_title">
                                        <?php the_sub_field('title') ?>
                                    </div>
                                    <div class="section_counter_item_text">
                                        <?php the_sub_field('text') ?>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
            <!-- Counter section END -->
    <?php endwhile;
    endif; ?>
    <?php if (have_rows('section_six')) :
        while (have_rows('section_six')) : the_row(); ?>
            <!-- Word section -->
            <section class="section_word">
                <div class="section_word__container">
                    <div class="section_word_wrapper">
                        <?php if (get_sub_field('image')) : ?>
                            <div class="section_word_left">
                                <img src="<?php the_sub_field('image') ?>" alt="Image">
                            </div>
                        <?php endif; ?>
                        <div class="section_word_right">
                            <?php if (get_sub_field('title')) : ?>
                                <div class="section_word_right_title title_h2">
                                    <?php the_sub_field('title') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('text')) : ?>
                                <div class="section_word_right_text">
                                    <?php the_sub_field('text') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('author_clinic')) : ?>
                                <div class="section_word_right_author title_h2">
                                    <?php the_sub_field('author_clinic') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('author_position')) : ?>
                                <div class="section_word_right_position">
                                    <?php the_sub_field('author_position') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Word section END -->
    <?php endwhile;
    endif; ?>
    <?php if (have_rows('section_seven')) :
        while (have_rows('section_seven')) : the_row(); ?>
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

    <!-- Doctors section -->
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

    <?php if (have_rows('section_nine')) : ?>
        <!-- Testimonials section -->
        <section class="section_testimonials">
            <div class="section_testimonials__container">
                <div class="section_testimonials_wrapper">
                    <div class="section_testimonials_swiper_left swiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('section_nine')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="section_testimonials_card">
                                        <?php if (get_sub_field('subtitle')) : ?>
                                            <div class="section_testimonials_card_left_title title_h2">
                                                <?php the_sub_field('subtitle'); ?>
                                            </div>
                                        <?php endif ?>
                                        <?php if (get_sub_field('text')) : ?>
                                            <div class="section_testimonials_card_left_text">
                                                <?php the_sub_field('text'); ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="section_testimonials_card_left_line"></div>
                                        <div class="section_testimonials_card_left_author">
                                            <?php if (get_sub_field('author_name')) : ?>
                                                <p class="section_testimonials_card_left_author_name">
                                                    <?php the_sub_field('author_name'); ?>
                                                </p>
                                            <?php endif ?>
                                            <?php if (get_sub_field('author_position')) : ?>
                                                <div class="section_testimonials_card_left_author_position">
                                                    <?php the_sub_field('author_position'); ?>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                        </div>
                    </div>
                    <div class="section_testimonials_swiper_right swiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('section_nine')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <img src="<?php the_sub_field('image'); ?>" alt="Image" class="section_testimonials_swiper_right_img">
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="section_testimonials_swiper_right_control">
                            <div class="section_testimonials_swiper_right_pagination"></div>
                            <div class="testimonials_arrows green_arrows_container">
                                <div class="testimonials_arrow green_arrows green_arrows_prev testimonials_arrow_prev">
                                </div>
                                <div class="testimonials_arrow green_arrows green_arrows_next testimonials_arrow_next">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials section END -->

    <?php endif; ?>

    <?php if (have_rows('section_ten')) :
        while (have_rows('section_ten')) : the_row(); ?>
            <!-- Directions section -->
            <section class="section_directions">
                <div class="section_directions__container">
                    <div class="section_directions_wrapper">
                        <?php if (get_sub_field('title')) : ?>
                            <div class="section_directions_title title_h2">
                                <?php the_sub_field('title') ?>
                            </div>
                        <?php endif; ?>
                        <?php $i = 1;
                        if (have_rows('steps')) : ?>
                            <div class="section_directions_items">
                                <?php while (have_rows('steps')) : the_row(); ?>
                                    <div class="section_directions_item">
                                        <?php if (get_sub_field('image')) : ?>
                                            <img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('title') ?>" class="section_directions_item_img">
                                        <?php endif; ?>
                                        <div class="section_directions_item_step">
                                            Крок <?php echo $i; ?>
                                        </div>
                                        <?php if (get_sub_field('title')) : ?>
                                            <div class="section_directions_item_title">
                                                <?php the_sub_field('title') ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('link')['url']) : ?>
                                            <div class="section_directions_item_link">
                                                Перейдіть до
                                                <a href="<?php echo get_sub_field('link')['url'] ?>">розділу <?php echo get_sub_field('link')['title'] ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php $i++;
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php $i = 1;
                        if (have_rows('steps')) : ?>
                            <div class="section_directions_items_mibile swiper">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('steps')) : the_row(); ?>
                                        <div class="swiper-slide">
                                            <div class="section_directions_item">
                                                <?php if (get_sub_field('image')) : ?>
                                                    <img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('title') ?>" class="section_directions_item_img">
                                                <?php endif; ?>
                                                <div class="section_directions_item_step">
                                                    Крок <?php echo $i; ?>
                                                </div>
                                                <?php if (get_sub_field('title')) : ?>
                                                    <div class="section_directions_item_title">
                                                        <?php the_sub_field('title') ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (get_sub_field('link')['url']) : ?>
                                                    <div class="section_directions_item_link">
                                                        Перейдіть до
                                                        <a href="<?php echo get_sub_field('link')['url'] ?>">розділу <?php echo get_sub_field('link')['title'] ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    endwhile; ?>
                                </div>
                                <div class="section_directions_items_pagination green_pagination"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- Directions section END -->
    <?php endwhile;
    endif; ?>
    <?php if (have_rows('section_eleven')) :
        while (have_rows('section_eleven')) : the_row(); ?>
            <!-- Story section -->
            <section class="section_story">
                <div class="section_story__container">
                    <div class="section_story_wrapper">
                        <?php if (get_sub_field('title')) : ?>
                            <div class="section_story_title title_h2">
                                <?php the_sub_field('title') ?>
                            </div>
                        <?php endif; ?>
                        <?php $values = get_sub_field('story');
                        if ($values) : ?>
                            <div class="section_story_items">
                                <?php foreach ($values as $post_id) : ?>
                                    <div class="section_story_item">
                                        <img src="<?php echo  get_the_post_thumbnail_url($post_id, 'full') ?>" alt="<?php echo get_the_title($post_id); ?>" aria-label="<?php echo get_the_title($post_id); ?>" class="section_story_item_img">
                                        <div class="section_story_item_title">
                                            <?php echo get_the_title($post_id); ?>
                                        </div>
                                        <div class="section_story_item_line"></div>
                                        <div class="section_story_item_link">Прочитайте <a href="<?php the_permalink($post_id); ?>">історію повністю</a></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <a href="/category/dyvovyzhni-istoriyi-materynstva/" class="btn_pink_outline btn_story">Прочитайте інші історії материнства</a>
                    </div>
                </div>
            </section>
            <!-- Story section END -->
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer('main'); ?>