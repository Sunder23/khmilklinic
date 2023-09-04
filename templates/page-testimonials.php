<?php
/**
 *  Template Name: Testimonials
 */

 get_header('main');
?>
        <main class="page_main">
            <section class="page_testimonials">
                <div class="page_testimonials__container">
				 	<?php dimox_breadcrumbs_ua()?>
                    <div class="page_testimonials_wrapper">
                        <div class="page_testimonials_title title_h2">
                            Що про нас пишуть наші клієнти
                        </div>
						<?php
							$categories = get_categories([
								'taxonomy'		=> 'us_testimonial_category',
								'orderby'      	=> 'name',
								'order'        	=> 'ASC',
								'hide_empty'   	=> false,
							]);
						$term = get_queried_object();
						?>
                         <ul class="page_testimonials_list">
              	           <li class="<?php if(!$term->term_id) echo 'active'; ?>">
								<a href="<?php echo get_the_permalink($pageID); ?>">Всі відгуки</a>
							</li>
							  <?php
							  if ($categories) :
								foreach ($categories as $cat) : ?>
								   <li>
									<a href="<?php echo get_term_link($cat->term_id, 'us_testimonial_category'); ?>">
									  <?php echo $cat->name; ?>
									</a>
								  </li>
								<?php 
								  endforeach;
							  endif; 
							?>
                        </ul>
						<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
							$args = array(
								'post_type' => 'us_testimonial',
								'paged' => $paged,
								'posts_per_page' => -1
							);
							$post_query = new WP_Query($args);
						?>
						 <?php $i = 0; if ($post_query->have_posts()) :  ?>
                        <div class="page_testimonials_items">
							<?php while ($post_query->have_posts()) : $post_query->the_post(); 
							$post_cats_id = wp_get_post_terms(get_the_ID(), 'us_testimonial_category', array('fields' => 'ids'));?>
							<?php if($post_cats_id[0] == 270):?>
                            <div data-item="<?php echo $i;?>" class="page_testimonials_card">
								<?php if(get_the_date()):?>
                                <time class="page_testimonials_card_date">
                                   <?php echo get_the_date() ?>
                                </time>
								<?php endif;?>
								<?php if( get_field('image_tumbnail', $post_id)):?>
                                <div class="page_testimonials_card_img"><img src="<?php the_field('image_tumbnail', $post_id)?>" alt="<?php the_field('title', $post_id)?>"></div>
								<?php endif;?>
								<?php 
									$post_cats = wp_get_post_terms(get_the_ID(), 'us_testimonial_category', array('fields' => 'names'));
									if ($post_cats) :
									foreach ($post_cats as $cat) : ?>										
										<a href="" class="page_testimonials_card_cat">#<?php echo $cat; ?></a>
										<?php 
											endforeach;
									endif; 
								?>
								<?php if( get_field('title', $post_id)):?>
                                <div class="page_testimonials_card_title">
                                   <?php the_field('title', $post_id);?>
                                </div>
								<?php endif;?>
								<?php if( get_field('excerpt', $post_id)):?>
                                <div class="page_testimonials_card_exert">
                                   <?php echo get_field('excerpt', $post_id)?>
                                </div>
								<?php endif;?>
                                <div class="page_testimonials_card_link">Прочитайте <a href="">повний текст відгука</a>
                                </div>
                            </div>
							<?php endif?>
							<?php if($post_cats_id[0] == 271):?>
                            <div data-item="<?php echo $i;?>" class="page_testimonials_card">
								<?php if( get_field('video', $post_id)):?>
								<div class="page_testimonials_card_video">
									<?php the_field('video', $post_id)?>
								</div>
								<?php endif;?>
								<?php 
									$post_cats = wp_get_post_terms(get_the_ID(), 'us_testimonial_category', array('fields' => 'names'));
									if ($post_cats) :
									foreach ($post_cats as $cat) : ?>										
										<a href="" class="page_testimonials_card_cat">#<?php echo $cat; ?></a>
										<?php 
											endforeach;
									endif; 
								?>
								<?php if( get_field('title', $post_id)):?>
                                <div class="page_testimonials_card_title">
                                   <?php the_field('title', $post_id);?>
                                </div>
								<?php endif;?>
								<?php if( get_field('excerpt', $post_id)):?>
                                <div class="page_testimonials_card_exert">
                                   <?php echo get_field('excerpt', $post_id)?>
                                </div>
								<?php endif;?>
                                <div class="page_testimonials_card_link">Подивіться <a href="#">відео відгук</a>
                                </div>
                            </div>
							<?php endif?>
							<?php if($post_cats_id[0] == 272):?>
                            <div data-item="<?php echo $i;?>" class="page_testimonials_card">

								<?php if( get_field('image_tumbnail', $post_id)):?>
                                <div class="page_testimonials_card_img"><img src="<?php the_field('image_tumbnail', $post_id)?>" alt="<?php the_field('title', $post_id)?>"></div>
								<?php endif;?>
								<?php 
									$post_cats = wp_get_post_terms(get_the_ID(), 'us_testimonial_category', array('fields' => 'names'));
									if ($post_cats) :
									foreach ($post_cats as $cat) : ?>										
										<a href="" class="page_testimonials_card_cat">#<?php echo $cat; ?></a>
										<?php 
											endforeach;
									endif; 
								?>
								<?php if( get_field('title', $post_id)):?>
                                <div class="page_testimonials_card_title">
                                   <?php the_field('title', $post_id);?>
                                </div>
								<?php endif;?>
                                <div class="page_testimonials_card_link">Клікніть на рисунок, щоб побачити скрін повністю.
                                </div>
                            </div>
							<?php endif?>
							<?php $i++; endwhile; ?> 
                        </div>
						<?php endif;?>
                        <div class="page_testimonials_popup">
                            <div class="page_testimonials_popup_wapper">
                                <div class="page_testimonials_popup_close"><svg width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20 2L18 0L10 8L2 0L0 2L8 10L0 18L2 20L10 12L18 20L20 18L12 10L20 2Z"
                                            fill="white" />
                                    </svg>
                                </div>
						<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
							$args = array(
								'post_type' => 'us_testimonial',
								'paged' => $paged,
								'posts_per_page' => -1
							);
							$post_query = new WP_Query($args);
						?>
						 <?php if ($post_query->have_posts()) :  ?>
                                <div class="page_testimonials_popup_swiper swiper">
                                    <div class="swiper-wrapper">
								<?php while ($post_query->have_posts()) : $post_query->the_post(); 
										$post_cats_id = wp_get_post_terms(get_the_ID(), 'us_testimonial_category', array('fields' => 'ids'));?>
                                        <?php if($post_cats_id[0] == 270):?>
										<div class="swiper-slide">
                                            <div class="page_testimonials_popup_card page_testimonials_popup_card_text">
                                                <div class="page_testimonials_popup_card_wrapper">
                                                    <div class="page_testimonials_popup_card ">
														<?php if( get_field('title', $post_id)):?>
                                                        <div class="page_testimonials_popup_card_title">
                                                           <?php the_field('title', $post_id);?>
                                                        </div>
														<?php endif;?>
                                                        <div class="page_testimonials_popup_card_content">
															<?php the_content()?>
														</div>
														<?php if( get_field('author_name', $post_id)):?>
                                                        <div class="page_testimonials_popup_card_author">
                                                        	<?php the_field('author_name', $post_id);?>
														</div>
														<?php endif;?>
														<?php if(get_the_date()):?>
                                                        <time class="page_testimonials_popup_card_date">
                                                            <?php echo get_the_date() ?>
                                                        </time>
														<?php endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php endif;?>
										<?php if($post_cats_id[0] == 271):?>
                                        <div class="swiper-slide">
                                            <div class="page_testimonials_popup_card page_testimonials_popup_card_image">
                                                <div class="page_testimonials_popup_card_wrapper">
                                                    <div class="page_testimonials_popup_card_video "><?php the_field('video', $post_id)?></div>
                                                </div>
                                            </div>
                                        </div>
										<?php endif;?>
										<?php if($post_cats_id[0] == 272):?>
                                        <div class="swiper-slide">
                                            <div class="page_testimonials_popup_card page_testimonials_popup_card_image">
                                                <div class="page_testimonials_popup_card_wrapper">
                                                    <div class="page_testimonials_popup_card_img"><img
                                                            src="<?php the_field('image_tumbnail', $post_id)?>" alt="<?php the_field('title', $post_id);?>"></div>
                                                </div>
                                            </div>
                                        </div>
										<?php endif;?>
									<?php endwhile; ?> 
                                    </div>
                                    <div
                                        class="global_slider_arrows_container page_testimonials_popup_arrows_container">
                                        <div
                                            class="global_slider_arrows global_slider_arrows-prev page_testimonials_popup_arrows page_testimonials_popup_arrows-prev">
                                            <img src="/wp-content/themes/Impreza/icons/main_swiper_arrow.svg" alt="">
                                        </div>
                                        <div
                                            class="global_slider_arrows global_slider_arrows-next page_testimonials_popup_arrows page_testimonials_popup_arrows-next">
                                            <img src="/wp-content/themes/Impreza/icons/main_swiper_arrow.svg" alt="">
                                        </div>
                                    </div>
                                </div>
							<?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
			</section>
</main>

<?php get_footer('main');?>