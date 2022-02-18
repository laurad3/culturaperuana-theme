<?php
/**
 * Template Name: Page with hero
 *
 * Template for displaying a page with featured image set as the hero.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Lianatech
 */

get_header();
?>

<main class="site-main" role="main" id="main">
	<?php
	if (have_posts()) :
		// Start the Loop.
		while (have_posts()) :
			the_post();
			the_content();
		endwhile;
	endif;
	?>

	<?php get_template_part('template-parts/events'); ?>
	<?php get_template_part('template-parts/contacts'); ?>
	<?php get_template_part('template-parts/partners'); ?>
</main>

<?php
get_footer();
