<aside>
	<form class="overflow" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<div class="widget">
			<input type="text" value="<?php the_search_query(); ?>" placeholder="Buscar palavra-chave" name="s" id="s" />
			<input type="submit" id="searchsubmit" class="" value="Search" />
		</div>
	</form>

		<nav role="navigation" class="widget">
			<h3>Categorias</h3>
			<ul id="" class="">
				<?php wp_list_categories('title_li=0&oorderby=id&show_count=0&use_desc_for_title=0'); ?>
			</ul><!-- / -->
		</nav>
		<div class="widget">
			<h3>Tags</h3>
			<ul>
				<?php wp_tag_cloud('smallest=8&largest=22'); ?>
			</ul>
		</div>
</aside>