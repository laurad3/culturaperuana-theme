<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lianatech
 */

get_header();
?>

<main class="site-main" id="main">
	<div class="container <?php echo get_field('page_margin_bottom') ? 'mb-5' : ''; ?> <?php echo get_field('page_margin_top') ? 'mt-5' : ''; ?>">
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

		<?php get_template_part('template-parts/events-list'); ?>
	</div>
</main>

<?php
get_footer();
