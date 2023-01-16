<?php

/**
 * Remove head scripts and styles
 */

remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('template_redirect', 'wp_shortlink_header', 11);
remove_action('wp_head', 'wp_oembed_add_discovery_links');

add_action('wp_enqueue_scripts', 'remove_wp_block_library_styles', 999);
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Disable Emoji
 */
add_action( 'init', 'disable_wp_emojicons' );
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
function disable_emojicons_tinymce( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

function remove_wp_block_library_styles()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('classic-theme-styles');
	wp_dequeue_style( 'global-styles' );
}


