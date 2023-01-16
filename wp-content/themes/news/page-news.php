<?php
/*
 * Template Name: News
 * Template Post Type: page
 */

get_header();

$paged      = absint( max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) ) );
$news_terms = get_terms( array(
	'taxonomy'   => 'news_tax',
	'hide_empty' => true
) );
$news_args  = array(
	'post_type'      => 'news',
	'posts_per_page' => 5,
	'paged'          => $paged,
);
?>

    <div class="container">
        <section class="news">
            <div class="news-title">
                <h1><?php the_title(); ?></h1>
            </div>
			<?php if ( $news_terms ): ?>
                <div class="news-filter">
                    <ul class="taxonomy-filter">
						<?php foreach ( $news_terms as $term ): ?>
                            <li>
                                <label>
                                    <input class="taxonomy-filter-input" type="checkbox" name="term-name" value="<?php echo $term->slug; ?>">
                                    <span class="taxonomy-filter-term-name"><?php echo $term->name; ?></span>
                                </label>
                            </li>
						<?php endforeach; ?>
                        <li>
                            <button type="reset" class="btn btn-blue reset-btn">Reset</button>
                        </li>
                    </ul>
                </div>
			<?php endif; ?>

			<?php $news = new WP_Query( $news_args ); ?>
            <div class="news-content">
				<?php if ( $news->have_posts() ): ?>
                    <div class="news-posts">
						<?php while ( $news->have_posts() ) : $news->the_post(); ?>
							<?php get_template_part( 'template-parts/content/news/item' ); ?>
						<?php endwhile; ?>
                    </div>
					<?php if ( $news->max_num_pages > 1 ): ?>
                        <div class="news-pagination">
                            <div class="pagination">
								<?php echo paginate_links( array(
									'total'     => $news->max_num_pages,
									'current'   => $paged,
									'prev_next' => false,
								) ); ?>
                            </div>
                        </div>
					<?php endif; ?>
					<?php wp_reset_postdata();
				else:
					get_template_part( 'template-parts/content/none' );
				endif; ?>
            </div>
        </section>
    </div>

<?php get_footer();
