<div class="news-post">
	<div class="news-post-box">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="news-post-poster">
				<?php the_post_thumbnail( 'post-thumbnail', 'class=news-post-img' ); ?>
			</div>
		<?php endif; ?>
		<div class="news-post-box-content">
			<div class="news-post-title">
				<p><?php the_title(); ?></p>
			</div>
			<div class="news-post-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<div class="news-post-footer">
				<a class="btn btn-blue news-post-more" href="<?php the_permalink(); ?>">Read more</a>
				<span class="news-post-date"><?php echo get_the_date( 'd.m.Y' ); ?></span>
			</div>
		</div>
	</div>
</div>
