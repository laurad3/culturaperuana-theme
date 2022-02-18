<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Culturaperuana
 */

$culturaperuana_inc_dir = 'inc';

$culturaperuana_includes = array(
    '/setup.php',
    '/custom-post-types.php',
    '/enqueue.php',
    '/disable-editor.php',
    '/bootstrap-navwalker.php',
);

foreach($culturaperuana_includes as $file) {
    require_once get_theme_file_path($culturaperuana_inc_dir . $file);
}