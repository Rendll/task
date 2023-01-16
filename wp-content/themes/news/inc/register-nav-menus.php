<?php

add_action( 'after_setup_theme', 'theme_register_nav_menus' );

function theme_register_nav_menus() {
	register_nav_menus (
		[
			'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu'
		]
	);
}
