<?php

include get_template_directory() . '/inc/wp-clean-header.php';
include get_template_directory() . '/inc/enqueue-scripts.php';
include get_template_directory() . '/inc/register-taxonomies.php';
include get_template_directory() . '/inc/register-post-types.php';
include get_template_directory() . '/inc/register-nav-menus.php';
include get_template_directory() . '/inc/ajax/ajax-news-filter.php';

add_action( 'after_setup_theme', 'setup_news_theme_setting' );
if ( ! function_exists( 'setup_news_theme_setting' ) ) {
	function setup_news_theme_setting() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', [
			'height'               => 60,
			'flex-width'           => true,
			'flex-height'          => false,
			'header-text'          => 'Custom Logo',
			'unlink-homepage-logo' => true
		] );
	}
}


add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );
function special_nav_class( $classes, $item ) {
	$classes[] = 'header-menu-item';

	return $classes;
}

add_action( 'open-content-wrapper', 'start_content_wrapper' );
add_action( 'close-content-wrapper', 'close_content_wrapper' );

function start_content_wrapper() {
	echo '<div class="wrapper">';
}

function close_content_wrapper() {
	echo '</div>';
}
