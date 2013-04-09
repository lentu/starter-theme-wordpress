<?php get_header(); ?>
<div class="content">
	<div class="middle-view">
		<section class="content-left">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="post">
					<header>
						<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						<p><?php the_date('d\/m\/Y'); ?> - <?php comments_popup_link('Nenhum Comentário', '1 Comentário', '% Comentários'); ?></p>
					</header>
					<div class="the-content">
						<?php if (has_post_thumbnail()): ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post'); ?></a>
						<?php endif ?>
						<?php if (has_excerpt()) {
							$excerpt = get_the_excerpt();
						}else{
							the_content();	
						} ?>
					</div>
				</article>
			<?php endwhile; ?>
				<!-- post navigation -->
			<?php else: ?>
				<!-- no posts found -->
			<?php endif; ?>
		</section><!-- / -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>