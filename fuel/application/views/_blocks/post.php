<li class="post_list">
	<h4><a href="<?php echo $post->url; ?>"><?php echo $post->title; ?></a></h4>
	<p><?php echo $post->get_excerpt(200, ''); ?></p>

	<div class="post_list-sub">
		<p><?=lang('blog_post_published_by')?> <?=$post->author_name?></p>
		<p>
			<?=$post->get_date_formatted(lang('blog_post_date_format'))?> — 
			<?php if ($post->comments_count > 0) : ?>
				<?=$post->comments_count?> <?php echo $post->comments_count !== 1 ? lang('blog_post_text_comments') : lang('blog_post_text_comment'); ?>
			<?php endif; ?>
		</p>
	</div>
</li>