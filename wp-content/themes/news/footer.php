</main>
<footer class="footer">
    <div class="container">
        <div class="copyright">
            <p>@<?php echo date('Y'); ?>. All rights are reserved</p>
        </div>
		<?php if ( has_nav_menu( 'footer-menu' ) ): ?>
            <div class="footer-nav">
				<?php
				wp_nav_menu( [
						'theme_location' => 'footer-menu',
						'container'      => 'ul',
						'menu_class'     => 'footer-menu',
					]
				);
				?>
            </div>
		<?php endif; ?>
    </div>
</footer>
<?php do_action('close-content-wrapper'); ?>
<?php wp_footer(); ?>
</body>
</html>