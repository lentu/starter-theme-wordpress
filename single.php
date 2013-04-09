<?php get_header(); ?>
<div class="content">
	<div class="middle-view">
		<section class="content-left">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="post">
					<header>
						<h1><?php the_title(); ?></h1>
						<p><?php the_date('d\/m\/Y'); ?> - <?php comments_popup_link('Nenhum Comentário', '1 Comentário', '% Comentários'); ?></p>
					</header>
					<div class="the-content">
						<?php the_content(); ?>
					</div>
					<div id="comments">
						<?php comments_template(); ?>
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