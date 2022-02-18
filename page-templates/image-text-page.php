<?php
/**
 * Template Name: Page with image and text
 *
 * Template for displaying a page with featured image and text.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Culturaperuana
 */

get_header();
?>

<main class="site-main" role="main" id="main">
	<div class="container d-lg-flex <?php echo get_field('page_margin_bottom') ? 'mb-5' : ''; ?> <?php echo get_field('page_margin_top') ? 'mt-5' : ''; ?>">
		<?php the_post_thumbnail('full', array('class' => 'w-50 h-auto')); ?>

		<div class="w-50 py-3 px-5">
			<h1 class="mb-4 <?php echo get_field('page_title_center') ? 'text-center' : ''; ?>">
				<?php if (get_field('page_alternative_title')) : ?>
					<?php echo esc_html(the_field('page_alternative_title')); ?>
				<?php else: ?>
					<?php the_title() ?>
				<?php endif; ?>
			</h1>
			<?php
			if (have_posts()) :
				// Start the Loop.
				while (have_posts()) :
					the_post();
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>
</main>

<?php
get_footer();
