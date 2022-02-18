<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything before main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Culturaperuana
 */

$isFrontPage = is_front_page();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page">
        <a class="skip-link btn bg-white screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'culturaperuana'); ?></a>

		<!-- Header -->
		<header id="masthead" role="banner" class="Header site-header bg-primary">
            <nav id="nav" role="navigation" aria-label="main navigation" class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid d-flex">
                    <div class="d-flex align-items-center">
                        <?php if (function_exists('the_custom_logo')) : ?>
                            <?php the_custom_logo(); ?>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>" class="navbar-brand d-flex align-items-center ps-2">
                            <h1 class="h6 m-0">
                                <div><?php echo get_bloginfo('description', 'display') ?></div>
                                <div><?php echo get_bloginfo('description', 'display') ?></div>
                            </h1>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="buton" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" arial-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php 
                        wp_nav_menu(
                            array(
                                'menu' => 'Menu Principal',
                                'theme_location' => 'primary',
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse flex-grow-0',
                                'container_id' => 'navbarSupportedContent',
                                'menu_class' => 'navbar-nav',
                                'walker' => new Bootstrap_Navwalker
                            )
                        );
                    ?>
                </div>
            </nav>
		</header>
