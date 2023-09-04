<?php

get_header('main'); ?>
<main class="page_main">
    <?php
    if (have_posts()) {

        // Load posts loop
        while (have_posts()) {
            the_post(); ?>
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

    <?php }
    } else {
        echo  'No results found.';
    }
    ?>
</main>

<?php get_footer('main'); ?>