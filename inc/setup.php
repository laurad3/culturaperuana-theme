<?php
/**
 * Theme basic setup
 *
 * @package Culturaperuana
 */

add_action('after_setup_theme', 'culturaperuana_setup');

if (!function_exists('culturaperuana_setup')) {
    function culturaperuana_setup() {
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        // Adding Thumbnail basic support
		add_theme_support('post-thumbnails');

        // Set up the WordPress Theme logo feature.
		add_theme_support('custom-logo');

        // Add support for full and wide align images.
		add_theme_support('align-wide');

        // Add excerpt box to pages
		add_post_type_support('page', 'excerpt');

        // https://developer.wordpress.org/themes/functionality/navigation-menus/
		register_nav_menus(
			array(
				'primary' => __('Primary', 'culturaperuana'),
				'secondary' => __('Secondary', 'culturaperuana'),
			)
		);
    }
}