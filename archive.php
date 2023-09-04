<?php defined('ABSPATH') or die('This script cannot be accessed directly.');

/**
 * The template for displaying archives pages
 *
 * Do not overload this file directly. Instead have a look at templates/archive.php file in us-core plugin folder:
 * you should find all the needed hooks there.
 */


get_header('main'); ?>
<main class="page_main">
	<!-- Blog hero -->
	<section class="blog_hero">
		<div class="blog_hero__container">
			<div class="blog_hero__wrapper">
				<div class="blog_hero__top">
					<?php if (get_field('title', 7683)) : ?>
						<div class="blog_hero__title title_h2">
							<?php the_field('title', 7683) ?>
						</div>
					<?php endif; ?>
					<?php if (get_field('description', 7683)) : ?>
						<div class="blog_hero__descr">
							<?php the_field('description', 7683) ?>
						</div>
					<?php endif; ?>
				</div>
				<?php
				$categories = get_categories(array(
					'orderby' => 'name',
					'order'   => 'ASC',
					'hide_empty' => false,
					'include' => array(197, 280, 278, 279, 193, 281, 201, 282, 283, 284, 269)
				));
				$term = get_queried_object();
				if ($categories) : ?>
					<div class="blog_hero__items">
						<a href="/blog/" class="blog_hero_item
                        <?php if (strpos($_SERVER['REQUEST_URI'], '/blog/') !== false) {
							echo 'active';
						} ?>
                        ">Новини</a>
						<?php foreach ($categories as $key => $cat) :
						?>
							<a href="<?php echo get_category_link($cat) ?>" class="blog_hero_item
                            <?php if ($term->slug == $cat->slug) {
								echo 'active';
							} ?>
                            "><?php echo $cat->name; ?></a>
						<?php endforeach ?>
					<?php endif ?>
					</div>
					<?php
					$categories = get_categories(array(
						'orderby' => 'name',
						'order'   => 'ASC',
						'hide_empty' => false,
						'include' => array(197, 280, 278, 279, 193, 281, 201, 282, 283, 284, 269)
					));
					if ($categories) : ?>
						<div class="blog_mobile">
							<div class="blog_mobile__wrapper">
								<div class="blog_mobile__items__title title_h2">
									Оберіть категорію блогу
								</div>
								<div class="blog_mobile__close">
									<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M15 2L13.5 0.5L7.5 6.5L1.5 0.5L0 2L6 8L0 14L1.5 15.5L7.5 9.5L13.5 15.5L15 14L9 8L15 2Z" fill="white" />
									</svg>
								</div>
							</div>
							<div class="blog_hero__items blog_hero__items__mobile">
								<a href="/blog/" class="blog_hero_item
                        <?php if (strpos($_SERVER['REQUEST_URI'], '/blog/') !== false) {
							echo 'active';
						} ?>
                        ">Новини</a>
								<?php foreach ($categories as $key => $cat) :
								?>
									<a href="<?php echo get_category_link($cat) ?>" class="blog_hero_item
                            <?php if ($term->slug == $cat->slug) {
										echo 'active';
									} ?>
                            "><?php echo $cat->name; ?></a>
								<?php endforeach ?>
							<?php endif ?>
							</div>
						</div>
						<div class="blog_hero__btn">
							Інші категорії блогу
						</div>

			</div>
		</div>
	</section>
	<!-- Blog hero END -->

	<!-- Blog Itmes -->
	<section class="blog_items">
		<?php
		$paged = absint(
			max(
				1,
				get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
			)
		);
		$cat_id = get_query_var('cat');
		$posts_per_page = 9;
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
			'orderby'          => 'menu',
			'order' => 'DESC',
			'cat' => $cat_id,

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
			<div class="blog_items__pagination">
				<?php pagination($current, $query->max_num_pages); ?>
			</div>
			</div>
	</section>
	<!-- Blog Itmes END -->

	<!-- Blog Form -->
	<section class="blog_form">
		<div class="blog_form__container">
			<div class="blog_form__wrapper">
				<?php if (get_field('form_title', 7683)) : ?>
					<div class="blog_form__title title_h2">
						<?php the_field('form_title', 7683) ?>
					</div>
				<?php endif ?>
				<?php if (get_field('form_shortcode', 7683)) :
					echo do_shortcode('' . get_field('form_shortcode', 7683) . '');
				endif;
				?>
			</div>
		</div>
	</section>
	<!-- Blog Form END -->
</main>

<?php get_footer('main'); ?>