<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package khmelnik
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
        <!-- Header -->
        <header class="header_main">
            <div class="header_top">
                <div class="header_top__container">
                    <a href="<?php echo home_url()?>" class="header_top_logo">
                        <img src="<?php the_field('logo_desctop','options');?>" alt="logo" aria-label="Logo">
                    </a>
            <?php if (have_rows('header_filials', 'options')):?>
					 <div class="header_filials">
                   <?php while (have_rows('header_filials', 'options')) : the_row(); ?>						
						<?php if (have_rows('item', 'options')):
							while (have_rows('item', 'options')) : the_row(); ?>	
                        <div class="header_filials_item">
							<?php if(get_sub_field('city','options')):?>
                            <div class="header_filials_city">
                                <?php the_sub_field('city', 'options')?>
                                <a href="<?php echo get_sub_field('phone', 'options')['url'] ?>" class="header_filials_phone">
                                    <?php echo get_sub_field('phone', 'options')['title']?>
                                </a>
                            </div>
							<?php endif;?>
                        </div>
							<?php endwhile;
						endif; ?>			                   				
					<?php endwhile;?>
<!-- 					<div class="header_filials_arrow"></div> -->
                    </div>	 
               <?php endif;  ?>						
                    <button class="btn_pink btn_pink_main pop_up_btn">Записатись</button>
                    <div class="header_burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="header_bottom__container">
                    <div class="header_bottom_wrapper">
                        <a href="<?php echo home_url()?>" class="header_bottom_logo">
                            <img src="<?php the_field('logo_desctop','options');?>" alt="Logo">
                        </a>

						<?php wp_nav_menu( array(
						'menu'            => 'ul',
						'container'       => 'nav',
						'container_class' => 'header_bottom_menu',
						'menu_class'      => 'header_menu_list',
					  ) );?>
<?php if (have_rows('header_socials', 'options')):?>                       
                        <div class="header_bottom_socials">
			<?php while (have_rows('header_socials', 'options')) : the_row(); ?>
							<?php if(get_sub_field('item')['url']):?>
                            <a href="<?php echo get_sub_field('item')['url']?>" <?php if(get_sub_field('item')['target']):?> target="_blank" <?php endif; ?> class="header_bottom_socials_item">
                                <?php the_sub_field('icone')?>
                            </a>
							<?php endif;?>
			<?php endwhile; ?>
                        </div>
<?php endif; ?>
                    </div>

                </div>
            </div>
        </header>
        <!-- Header END -->
<body class='body_main'>
    <div class="wrapper">
    