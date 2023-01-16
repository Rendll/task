<?php

add_action( 'wp_ajax_filter_news', 'ajax_news_filter' );
add_action( 'wp_ajax_nopriv_filter_news', 'ajax_news_filter' );
add_action( 'wp_ajax_reset_news', 'ajax_reset_news_filter' );
add_action( 'wp_ajax_nopriv_reset_news', 'ajax_reset_news_filter' );
add_action( 'wp_ajax_get_next_posts', 'ajax_news_filter' );
add_action( 'wp_ajax_nopriv_get_next_posts', 'ajax_news_filter' );

function ajax_reset_news_filter() {
	$args = array(
		'post_type'      => 'news',
		'posts_per_page' => 5,
		'paged'          => 1,
	);
	$news = new WP_Query( $args );

	if ( $news->have_posts() ): ?>
        <div class="news-posts">
			<?php while ( $news->have_posts() ) : $news->the_post(); ?>
				<?php get_template_part( 'template-parts/content/news/item' ); ?>
			<?php endwhile; ?>
        </div>
		<?php if ( $news->max_num_pages > 1 ): ?>
            <div class="news-pagination">
                <div class="pagination">
					<?php echo paginate_links( array(
						'base'      => get_home_url() . '/news/' . '%_%',
						'total'     => $news->max_num_pages,
						'current'   => 1,
						'prev_next' => false,
					) ); ?>
                </div>
            </div>
		<?php endif; ?>
		<?php wp_reset_postdata();
	else:
		get_template_part( 'template-parts/content', 'none' );
	endif;
	wp_die();
}

function ajax_news_filter() {
	$paged = $_POST['page'] ?? 1;
	$args  = array(
		'post_type'      => 'news',
		'posts_per_page' => 5,
		'paged'          => $paged
	);
	if ( isset( $_POST['terms'] ) ) {
		$terms             = $_POST['terms'];
		$args['tax_query'] = array(
			array(
				'relation' => 'OR',
				'taxonomy' => 'news_tax',
				'field'    => 'slug',
				'terms'    => $terms
			)
		);
	}
	$news = new WP_Query( $args );

	if ( $news->have_posts() ): ?>
        <div class="news-posts">
			<?php while ( $news->have_posts() ) : $news->the_post(); ?>
				<?php get_template_part( 'template-parts/content/news/item' ); ?>
			<?php endwhile; ?>
        </div>
		<?php if ( $news->max_num_pages > 1 ): ?>
        <div class="news-pagination">
            <div class="pagination">
				<?php echo paginate_links( array(
					'base'      => get_home_url() . '/news/' . '%_%',
					'total'     => $news->max_num_pages,
					'current'   => $paged,
					'prev_next' => false,
				) ); ?>
            </div>
        </div>
        <?php endif; ?>
		<?php wp_reset_postdata();
	else:
		get_template_part( 'template-parts/content', 'none' );
	endif;
	wp_die();
}
