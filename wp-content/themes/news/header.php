<!doctype html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php do_action('open-content-wrapper'); ?>

    <header class="header">
        <div class="container">
            <div class="header-container">
				<?php if ( has_custom_logo() ): ?>
                    <div class="header-logo"><?php the_custom_logo(); ?></div>
				<?php endif; ?>
				<?php if ( has_nav_menu( 'header-menu' ) ): ?>
                <div class="header-nav">
					<?php wp_nav_menu( [
							'theme_location' => 'header-menu',
							'container'      => 'ul',
							'menu_class'     => 'header-menu',
						]
					);
					endif; ?>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
