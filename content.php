<article> id="post-<?php the_ID();?>" <?php post_class();?> >
	<div class="entry-thumbnail">
		<?php get_thumbnail('thumbnail')?>
	</div>
	<div class="entry-header">
		<?php entry_header();?>
		<?php entry_meta(); ?>
	</div>
	<div class="entry-content">
		<?php entry_content()?>
	</div>
</article> 