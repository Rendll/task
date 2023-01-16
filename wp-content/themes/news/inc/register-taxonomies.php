<?php

add_action( 'init', 'register_custom_taxonomies' );

if ( ! function_exists( 'register_custom_taxonomies' ) ) {

	function register_custom_taxonomies() {

		register_taxonomy( 'news_tax', 'news', [
			'label'        => 'News Categories',
			'public'       => true,
			'hierarchical' => true,
			'show_admin_column' => true
		] );

	}

}
