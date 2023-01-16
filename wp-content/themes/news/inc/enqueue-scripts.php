<?php

add_action( 'wp_enqueue_scripts', 'enqueue_news_theme_scripts' );

function enqueue_news_theme_scripts() {
	wp_enqueue_script('app-scripts',get_template_directory_uri() . '/dist/assets/js/app.min.js', array('jquery'), null, true);
	wp_localize_script( 'app-scripts', 'wpAjax',
		array(
			'url' => admin_url('admin-ajax.php'),
		)
	);
	wp_enqueue_style('app-styles',get_template_directory_uri() . '/dist/assets/css/main.min.css',[],null);
}
