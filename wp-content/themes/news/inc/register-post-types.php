<?php

add_action( 'init', 'register_custom_post_types' );

if ( ! function_exists( 'register_custom_post_types' ) ) {

	function register_custom_post_types() {

		register_post_type( 'news', [
			'label'     => __( 'News' ),
			'public'    => true,
			'supports'  => [ 'title', 'editor', 'excerpt', 'thumbnail','author' ],
			'menu_icon' => 'dashicons-text-page',
			'hierarchical' => false
		] );
	}

}
