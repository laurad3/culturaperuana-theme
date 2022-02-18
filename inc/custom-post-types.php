<?php
/**
 * Create custom post types in use (will be moved to plugin later)
 *
 * @link https://developer.wordpress.org/plugins/post-types/registering-custom-post-types/
 *
 * @package Culturaperuana
 */

add_action('init', 'culturaperuana_custom_post_types');

if (!function_exists('culturaperuana_custom_post_types')) {
    function culturaperuana_custom_post_types() {
        // Register Contact post type
        register_post_type(
            'cultura_contact',
            array(
                'label' => __('Contacts', 'textdomain'),
                'public' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-id',
                'supports' => array('title', 'editor', 'thumbnail'),
                'has_archive' => false,
                'labels' => array(
                    'singular_name' => __('Contact', 'textdomain'),
                    'add_new_item' => __('Add New Contact', 'textdomain'),
                    'new_item' => __('New Contact', 'textdomain'),
                    'edit_item' => __('Edit Contact', 'textdomain'),
                    'view_item' => __('View Contact', 'textdomain'),
                    'view_items' => __('View Contacts', 'textdomain'),
                    'search_items' => __('Search Contacts', 'textdomain'),
                    'not_found' => __('No contacts found.', 'textdomain'),
                    'not_found_in_trash' => __('No contacts found in Trash.', 'textdomain'),
                    'all_items' => __('All Contacts', 'textdomain'),
                    'insert_into_item' => __('Insert into contact', 'textdomain'),
                    'item_updated' => __('Contact updated', 'textdomain'),
                    'item_published' => __('Contact published', 'textdomain'),
                ),
            )
        );
    }
}
