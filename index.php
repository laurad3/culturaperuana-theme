<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Culturaperuana
 */

get_header();
?>

<main id="main" role="main" class="site-main my-5">
	<div class="container">
		<h1 class="mb-4"><?php the_title() ?></h1>
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
</main>

<?php
get_footer();
