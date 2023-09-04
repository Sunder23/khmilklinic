<?php

/**
 *  Template Name: Сторінка лікаря
 *  Template post type: post
 */

get_header('main');
?>
<main class="page_main">
  <!-- Doctors Hero -->

  <section class="doctor_hero">
    <div class="doctor_hero__container">
      <div class="doctor_hero__wrapper">
        <?php if (has_post_thumbnail()) : ?>
          <div class="doctor_hero__left">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'medium') ?>
          </div>
        <?php endif ?>
        <div class="doctor_hero__right">
          <?php if (get_the_title()) : ?>
            <div class="doctor_hero__title title_h2"><?php the_title() ?></div>
          <?php endif ?>


          <?php $terms  = get_field('specialization');
          if ($terms) :
          ?>
            <div class="doctor__specialization">
              Спеціалізація:
              <div class="doctor__specialization_items">
                <?php
                foreach ($terms as $term) :
                ?>
                  <a href="<?php echo get_term_link($term); ?>" class="doctor__specialization_item"><?php echo $term->name ?></a>
                <?php endforeach  ?>
              </div>
            </div>
          <?php endif ?>
          <?php if (get_field('stazh')) : ?>
            <div class="doctor__expiriens">
              Стаж роботи: <span>
                <?php $currentYear = date('Y');
                $beginYear = get_field('stazh');
                $stageYear = $currentYear - $beginYear;
                echo $stageYear . ' ' . UaEnding($stageYear, "рік", "роки", "років");
                ?></span>
            </div>
          <?php endif ?>
          <?php if (get_field('kvalifikacziya')) : ?>
            <div class="doctor__qualification">
              Кваліфікація: <span><?php the_field('kvalifikacziya') ?></span>
            </div>
          <?php endif ?>
          <?php if (get_field('pryjom')) : ?>
            <div class="doctor__workplace">
              <span>Лікар приймає:</span>
              <div class="doctor__workplace__items">
                <?php
                $select = get_field('pryjom');
                ?>
                <?php
                if ($select) :
                  foreach ($select as $item) :
                    if ($item['adress']) :
                ?>
                      <a href="<?php echo $item['adress']['url'] ?>" target="_blank" class="doctor__workplace_item">
                        <?php echo $item['adress']['title'] ?>
                      </a>
                <?php
                    endif;
                  endforeach;
                endif;
                ?>
              </div>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Doctors Hero END -->

  <!-- Doctors Tabs -->
  <section class="doctor_tabs">
    <div class="doctor_tabs__container">
      <div class="doctor_tabs__wrapper">
        <div class="tabs__doctor">
          <div class="tab-button-outer">
            <ul id="tab-button">
              <li><a href="#tab01">Про лікаря</a></li>
              <li><a href="#tab02">Послуги</a></li>
              <li><a href="#tab03">Професійний розвиток</a></li>
              <li><a href="#tab04">Відгуки про лікаря </a></li>
            </ul>
          </div>

          <div id="tab01" class="tab-contents doctor_tab__one">
            <div class="about_tab">
              <div class="about_tab__wrapper">
                <div class="about_tab__left">
                  <div class="about_tab__content">
                    <div class="about_tab__content_title">
                      З яких питань звертатись:
                    </div>
                    <?php $questions = get_field('questions') ?>
                    <?php if ($questions) : ?>
                      <ul class="about_content__list">
                        <?php foreach ($questions as $item) : ?>
                          <li><?php echo $item['question'] ?></li>
                        <?php endforeach ?>
                      </ul>
                    <?php endif ?>
                    <a href="#" class="about_conten__link">Показати решту напрямків</a>
                  </div>
                </div>
                <?php if (get_field('vizytka')) : ?>
                  <div class="about_tab__right">
                    <?php the_field('vizytka') ?>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>

          <div id="tab02" class="tab-contents doctor_tab__two">
            <?php
            $services = get_field('services');
            ?>
            <div class="services_tab">
              <div class="services_tab__items">
                <?php if ($services) :
                  foreach ($services as $item) : ?>
                    <a href="<?php echo $item['service']['url'] ?>" class="services_tab__item">
                      <img src="/wp-content/uploads/2023/05/photo-1615766553246-9147b6d50e90.png" alt="">
                      <span><?php echo $item['service']['title'] ?></span>
                    </a>
                <?php endforeach;
                endif;
                ?>
              </div>
              <?php if ($services) : ?>
                <div class="services_tab__swiper swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide services_swiper__row">
                      <?php
                      $i = 1;
                      foreach ($services as $item) : ?>
                        <div class="services_tab__item">
                          <a href="<?php echo $item['service']['url'] ?>">
                            <img src="/wp-content/uploads/2023/05/photo-1615766553246-9147b6d50e90.png" alt="">
                            <span><?php echo $item['service']['title'] ?></span>
                          </a>
                        </div>
                        <?php if (!($i++ % 4)) : ?>
                    </div>
                    <div class="swiper-slide services_swiper__row">
                    <?php endif ?>
                  <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="services_tab__pagination green_pagination"></div>
            </div>
          <?php endif; ?>
          </div>
        </div>
        <div id="tab03" class="tab-contents doctor_tab__three">
          <div class="proffesion_tab">
            <div class="proffesion_tab__wrapper">
              <div class="proffesion_tab__left">
                <?php
                $workPlaces = get_field('proffesion_left');
                ?>
                <?php if ($workPlaces) : ?>
                  <div class="proffesion_left__items">

                    <?php foreach ($workPlaces as $item) : ?>
                      <div class="proffesion_left__item">
                        <span><?php echo $item['year'] ?></span> <span><?php echo $item['item'] ?></span>
                      </div>
                    <?php endforeach; ?>

                  </div>
                <?php endif; ?>
                <!-- <div class="proffesion_tab__bootm">
                    Членство в асоціаціях, нагороди
                  </div> -->
              </div>
              <?php
              $sertivicate = get_field('sertivicate');
              ?>
              <?php if ($sertivicate) : ?>
                <div class="proffesion_tab__right">
                  <div class="proffesion_right__items swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($sertivicate as $item) : ?>
                        <div class="swiper-slide">
                          <?php //$image = wp_get_attachment_image_url($item['image'], 'full'); 
                          ?>
                          <div data-fancybox="zoom-gallery-mobile" href="<?php //echo $image 
                                                                          ?>">
                            <?php echo wp_get_attachment_image($item['image'], 'full'); ?>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="proffesion_bottom_arrows green_arrows_container">
                      <div class="proffesion_bottom_arrow green_arrows green_arrows_prev proffesion_arrow_prev ">
                      </div>
                      <div class="proffesion_bottom_arrow green_arrows green_arrows_next proffesion_arrow_next ">
                      </div>
                    </div>
                    <div class="proffesion__pagination green_pagination"></div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div id="tab04" class="tab-contents doctor_tab__four">

          <!-- Testimonials section -->
          <div class="section_reviews">
            <div class="section_reviews__container">
              <?php
              $reviews = get_field('reviews');
              ?>
              <?php if ($reviews) : ?>
                <div class="reviews__slider__wrapper">
                  <div class="section_reviews__slider swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($reviews as $item) : ?>
                        <?php if (!empty($item['text']['text'])) : ?>
                          <div class="swiper-slide">
                            <div class="section_reviews__inner">
                              <div class="section_reviews__author">
                                <?php if ($item['text']['author_image']) : ?>
                                  <?php echo wp_get_attachment_image($item['text']['author_image']) ?>
                                <?php endif ?>
                                <div class="section__author__descr">
                                  <?php if ($item['text']['author_name']) : ?>
                                    <p class="section_reviews__author_name">
                                      <?php echo $item['text']['author_name'] ?>
                                    </p>
                                  <?php endif ?>
                                  <?php if ($item['text']['author_name']) : ?>
                                    <div class="section_reviews__author_position">
                                      <?php echo $item['text']['author_position'] ?>
                                    </div>
                                  <?php endif ?>
                                </div>

                              </div>
                              <div class="section_reviews__card reviews__text">
                                <div class="section_reviews__title">
                                  <?php echo  $item['text']['title'] ?>
                                </div>
                                <div class="section_reviews__text">
                                  <?php echo  $item['text']['text'] ?>
                                </div>
                              </div>
                            </div>

                          </div>
                        <? else : ?>
                          <?php $image = $item['image_review'] ?>
                          <div class="swiper-slide">
                            <div class="section_reviews__card reviews__image">
                              <?php echo wp_get_attachment_image($image, 'thumbnail') ?>
                            </div>
                          </div>
                        <?php endif ?>
                      <?php endforeach; ?>
                    </div>

                  </div>
                  <!-- If we need navigation buttons -->
                  <div class="reviews_arrow_container green_arrows_container">
                    <div class="reviews_arrow__arrow green_arrows green_arrows_prev reviews__arrow_prev ">
                    </div>
                    <div class="reviews_slider__pagination"></div>
                    <div class="reviews_arrow__arrow green_arrows green_arrows_next reviews__arrow_next ">
                    </div>
                  </div>

                </div>

              <?php endif; ?>
            </div>
          </div>
          <!-- Testimonials section END -->
        </div>

      </div>
    </div>
    </div>
  </section>
  <!-- Doctors Tabs END -->

  <!-- Doctors Form-->
  <section class="doctors_form">
    <div class="doctors_form__container">
      <div class="doctors_form__wrapper">
        <div class="doctors_form__left">
          <div class="doctors_form__title">Записатися до лікаря
            <?php if (get_the_title()) : ?>
              <span><?php the_title() ?></span>
            <?php endif ?>
          </div>
          <div class="doctors_form__hide">
            <?php
            $select = get_field('pryjom');
            ?>
            <?php
            if ($select) :
              foreach ($select as $item) :
                if ($item['adress']) :
            ?>
                  <option value="<?php echo $item['adress']['title'] ?>" class="doctors_form__hide_item">
                    <?php echo $item['adress']['title'] ?>
                  </option>
            <?php
                endif;
              endforeach;
            endif;
            ?>
          </div>
          <div class="doctors_form__inner">
            <?php echo do_shortcode('[contact-form-7 id="7748" title="Form Doctor"]') ?>

          </div>
        </div>
        <div class="doctors_form__right">
          <?php if (get_field('kontent_z_prava_zagolovok')) : ?>
            <div class="doctors_right__title">
              <?php the_field('kontent_z_prava_zagolovok') ?>
            </div>
          <?php endif ?>
          <?php if (get_field('kontent_z_prava_tekst')) : ?>
            <div class="doctors_right__text">
              <?php the_field('kontent_z_prava_tekst') ?>
            </div>
          <?php endif ?>
          <?php if (get_field('kontent_z_prava_vid_kogo')) : ?>
            <div class="doctors_right__bottom">
              <?php the_field('kontent_z_prava_vid_kogo') ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Doctors Form END-->

  <!-- Doctors Articles-->


  <?php



  $posts_per_page = -1;
  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'orderby'          => 'id',
    'order' => 'DESC',
    'meta_query' => array(
      array(
        'key' => 'post_author',
        'value' => get_the_ID()
      ),
    ),

  );

  $query = new WP_Query($args);
  ?>
  <?php
  $i = 1;
  if ($query->have_posts()) : ?>
    <section class="doctors_articles">
      <div class="doctors_articles__container">
        <div class="doctors_articles__wrapper">
          <div class="doctors_articles__title title_h2">Статті лікаря</div>


          <div class="blog_items__wrapper">
            <?php while ($query->have_posts()) : $query->the_post();     ?>

              <a href="<?php the_permalink(get_the_ID()) ?>" class="blog_items__item  <?php if ($i > 3) : ?> block_collapsed <?php endif ?>" id='post-<?php the_ID() ?>'>
                <div class="blog_items__item">
                  <div class="blog_items__top">
                    <div class="blog_items__cat">
                      <?php $category = get_the_category();
                      echo $category[0]->cat_name; ?>
                    </div>
                    <?php
                    if (has_post_thumbnail()) :
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
                        <?php echo get_the_date(); ?>
                      </time>
                    </div>
                    <div class="blog_items__bottom__title">
                      <?php echo get_the_title(get_the_ID()) ?>
                    </div>
                    <span class="blog_items__bottom__link">Прочитати</span>
                  </div>
                </div>



              </a>
            <?php $i++;
            endwhile;
            ?>
          </div>
        </div>
        <button class="btn_pink_outline btn_article btn_article__doc">Перегляньте інші статті лікаря</button>
      </div>
    </section>
    <!-- Doctors Articles END-->
  <?php endif;
  wp_reset_postdata();
  ?>
  <!-- Section Relative Doctor -->
  <section class="relative_doc">
    <div class="relative_doc__container">
      <div class="relative_doc__wrapper">
        <div class="relative_doc__top">
          <div class="relative_doc__title title_h2">
            Інші лікарі напряму
          </div>
          <div class="relative_doc_arrows green_arrows_container">
            <div class="green_arrows green_arrows_prev relative_arrow_prev"></div>
            <div class="green_arrows green_arrows_next relative_arrow_next"></div>
          </div>
        </div>
        <div class="relative_doc__bottom">
          <div class="relative_doc__slider swiper">
            <div class="swiper-wrapper">
              <?php
              $array_spec = [];
              if ($terms) {
                foreach ($terms as $term) {
                  array_push($array_spec, $term->slug);
                };
              }
              $clinic = get_the_terms(get_the_ID(), 'clinics');
              $posts_per_page = -1;

              if ($clinic) :
                foreach ($clinic as $key => $term) :
                  $query          = new WP_Query(
                    [
                      'post_type'      => 'doctors',
                      'posts_per_page' => $posts_per_page,
                      'orderby'          => 'rand',
                      'order' => 'ASC',
                      'tax_query'      => array(
                        'relation' => 'AND',
                        array(
                          'taxonomy' => 'clinics',
                          'field'    => 'slug',
                          'terms'    => $term->slug,
                        ),
                        array(
                          'taxonomy' => 'specializations',
                          'field'    => 'slug',
                          'terms'    => $array_spec,
                        )
                      ),

                    ]
                  );
                endforeach;
              endif;
              ?>
              <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>" class="doctor_tabs_item_card">
                      <div class="doctor_tabs_item_card_top">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="doctor_tabs_items_img">
                        <div class="doctor_tabs_item_card_title">
                          <?php $docName =  get_the_title();
                          $string = explode(" ", $docName);
                          echo $string[0] . "<br>" . " " . $string[1] . " " . $string[2];
                          ?>
                        </div>
                        <?php if (get_field('kvalifikacziya')) : ?>
                          <div class="doctor_tabs_item_card_descr">
                            <?php echo get_field('kvalifikacziya') ?>
                          </div>
                        <?php endif ?>

                        <div class="relative_doc_cat">
                          <?php
                          foreach ($terms as $term) : ?>
                            <span><?php echo $term->name ?></span>
                          <?php endforeach  ?>
                        </div>
                      </div>

                      <div class="relative_doc__btn btn_pink">
                        Записатись на прийом
                      </div>
                    </a>


                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php wp_reset_query(); ?>

            </div>
            <div class="green_pagination relative__pagination"></div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Section Relative Doctor END -->

</main>


<?php
get_footer('main');
