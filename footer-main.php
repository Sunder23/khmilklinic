<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitaminise
 */

?>        
 <!-- PopUp Appointment  -->
            <div class="popup_appointment">
                <div class="popup_appointment_wrapper">
                    <div class="popup_appointment_close_btn"><svg width="20" height="20" viewBox="0 0 20 20"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20 2L18 0L10 8L2 0L0 2L8 10L0 18L2 20L10 12L18 20L20 18L12 10L20 2Z" fill="white" />
                        </svg>
                    </div>
                    <div class="popup_appointment_inner">
                        <div class="popup_appointment_left">
                            <div class="popup_appointment_left_wrapper">
								<?php if(get_field('pop_up_title', 'options')):?>
                                <div class="popup_appointment_inner_title">
                                    <?php the_field('pop_up_title', 'options')?>
                                </div>
								<?php endif;?>
								<?php if(get_field('pop_up_shortcode', 'options')):
								$shortcode = get_field('pop_up_shortcode', 'options');
								?>
								<?php echo do_shortcode ("  $shortcode  ") ?> 
								<?php endif;?>
                            </div>
                        </div>
						<?php if(get_field('pop_up_image', 'options')):?>
                        <div class="popup_appointment_right">
                            <img src="<?php the_field('pop_up_image', 'options')?>" alt="image" aria-hidden = "true">
                        </div>
						<?php endif;?>
                    </div>
					<div class='popup_appointment_success'>
						<div class='popup_appointment_success_wrapper'>
							<div class='popup_appointment_success_text'>
								<p>Дякуємо за ваше звернення!</p>
								<p>Ми зв'яжемось з вами найближчим часом.</p>
							</div>
							<a href ="/news" class='btn_pink_outline popup_appointment_success_btn'>	
							Перегляньте новини клініки
							</a>
						</div>	
					</div>
                </div>
            </div>
            <!-- PopUp Appointment END  -->

<footer class="footer_main">
            <div class="footer_main__container">
                <div class="footer_main_wrapper">
                    <div class="footer_main_left">
						<a href="<?php echo home_url()?>" class="footer_main_logo">
							<img src="<?php the_field('logo_footer','options');?>" alt="logo" aria-label="Logo">
						</a>
<?php if (have_rows('footer_socials', 'options')):?>      						
                        <div class="footer_main_socials">
                            <p>Приєднуйтесь до нас в соц. мережах: </p>
                            <div class="footer_main_socials_list">
								<?php while (have_rows('footer_socials', 'options')) : the_row(); ?>
                                <a href="<?php echo get_sub_field('item')['url']?>" <?php if(get_sub_field('item')['target']):?> target="_blank" <?php endif; ?> class="footer_main_social">
									<?php the_sub_field('icone')?></a>
								<?php endwhile; ?>
                            </div>
                        </div>
<?php endif; ?>		
<?php if (have_rows('pages_policy', 'options')):?>   
                        <div class="footer_main_pages">
							<?php while (have_rows('pages_policy', 'options')) : the_row(); ?>
                            <a href="<?php echo get_sub_field('item')['url']?>" <?php if(get_sub_field('item')['target']):?> target="_blank" <?php endif; ?>><?php echo get_sub_field('item')['title']?></a>
							<?php endwhile; ?>
                        </div>
                    </div>
<?php endif; ?>	
			<?php if (have_rows('footer_menu', 'options')):?>
                    <div class="footer_main_center">
						<?php while (have_rows('footer_menu', 'options')) : the_row();?>    		
                        <div class="footer_main_menu">
							<?php if (have_rows('left_column', 'options')):?>	
								<div class="footer_main_menu_left">
									<?php while (have_rows('left_column', 'options')) : the_row();?>   
									<div class="footer_main_menu_item">
										<?php if (have_rows('list', 'options')):?>
											<?php while (have_rows('list', 'options')) : the_row();?>   
											<a href="<?php echo get_sub_field('item')['url']?>"><?php echo get_sub_field('item')['title']?></a>
											<?php endwhile;?>
										<?php endif;?>
									</div>
									<?php endwhile;?>
								</div>
							<?php endif;?> 
							<?php if (have_rows('center_column', 'options')):?>	
								<div class="footer_main_menu_center">
									<?php while (have_rows('center_column', 'options')) : the_row();?>   
									<div class="footer_main_menu_item">
										<?php if (have_rows('list', 'options')):?>
											<?php while (have_rows('list', 'options')) : the_row();?>   
											<a href="<?php echo get_sub_field('item')['url']?>"><?php echo get_sub_field('item')['title']?></a>
											<?php endwhile;?>
										<?php endif;?>
									</div>
									<?php endwhile;?>
								</div>
							<?php endif;?> 

							<?php if (have_rows('right_column', 'options')):?>	
								<div class="footer_main_menu_right">
									<?php while (have_rows('right_column', 'options')) : the_row();?>   
									<div class="footer_main_menu_item">
										<?php if (have_rows('list', 'options')):?>
											<?php while (have_rows('list', 'options')) : the_row();?>   
											<a href="<?php echo get_sub_field('item')['url']?>"><?php echo get_sub_field('item')['title']?></a>
											<?php endwhile;?>
										<?php endif;?>
									</div>
									<?php endwhile;?>
								</div>
							<?php endif;?> 
                        </div>
					<?php endwhile;?>	
                    </div>
<?php endif; ?>						
			 <?php if (have_rows('footer_filials', 'options')):?>
					<div class="footer_main_right">
                        <div class="footer_main_filials">
							<?php while (have_rows('footer_filials', 'options')) : the_row();?>
							<?php if (have_rows('item', 'options')):
									while (have_rows('item', 'options')) : the_row(); ?>	
										<div class="footer_main_filials_item">
											<?php if(get_sub_field('city','options')):?>
											<div class="footer_main_filials_city">
												<?php the_sub_field('city', 'options')?>
												<a href="<?php echo get_sub_field('phone', 'options')['url'] ?>" class="footer_main_filials_phone">
													<?php echo get_sub_field('phone', 'options')['title']?>
												</a>
												<div class="footer_main_filials_page">Перейдіть до <a href="/kontakty/">сторінки контактів</a></div>
											</div>
											<?php endif; ?>	
										</div>
								<?php endwhile; ?>
							<?php endif; ?>	
						<?php endwhile; ?>	
                        </div>
                    </div>
				<?php endif; ?>		
                </div>
            </div>
        </footer>
	<div id='toTop'><svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M1.75 9.25L0 7.5L7.5 0L15 7.5L13.25 9.25L7.5 3.5L1.75 9.25Z" fill="#333333"/>
		</svg>
	</div>	
    </div>
</body>

</html>
<?php wp_footer(); ?>