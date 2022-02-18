<?php
/**
 * Enqueue styles and scripts
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package Culturaperuana
 */

add_action('wp_enqueue_scripts', 'culturaperuana_scripts');

if (!function_exists('culturaperuana_scripts')) {
    function culturaperuana_scripts() {
        $the_theme = wp_get_theme();
        $theme_version = $the_theme->get('Version');

        /* Custom styles */
        wp_enqueue_style('google-fonts-dosis', 'https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700&display=swap');
        wp_enqueue_style('google-fonts-cabin', 'https://fonts.googleapis.com/css2?family=Cabin:wght@400;500&display=swap');
        wp_enqueue_style('culturaperuana-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version);

        /* Custom scripts */
        wp_enqueue_script('culturaperuana-scripts', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), $theme_version, true);
        wp_add_inline_script('culturaperuana-scripts', 'const FB = ' . json_encode( array(
            'ACCESS_TOKEN' => ACCESS_TOKEN
        )), 'before');
    }
}