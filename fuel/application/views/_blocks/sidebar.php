<div class="sidebar">
	
	<!-- <div id="right">
		<?php // echo $this->fuel->blog->sidemenu(array('search', 'authors', 'tags', 'categories', 'links', 'archives'))?>
	</div> -->

	<div class="sidebar-item sidebar-search search">
		<label for="q"><h5>Search</h5></label>
		<?php echo $this->fuel->blog->sidemenu(array('search')); ?>
	</div>

	<?php if(isset($recent_posts) && !empty($recent_posts)): ?>
		<div class="sidebar-item sidebar-recent_posts recent_posts">
			<h5>Recent Posts</h5>
			<ul>
			<ul>
				<?php foreach ($recent_posts as $post): ?>
					<li>
						<p><?=$post->link_title?></a> by <?php echo $post->author_link; ?></span></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if(isset($recent_comments) && !empty($recent_comments)): ?>
		<div class="sidebar-item sidebar-recent_conversations recent_conversations">
			<h5>Recent Conversations</h5>
			<ul>
				<?php foreach ($recent_comments as $comment): ?>
					<li>
						<p><?=$comment->author_name?> on <?=$comment->post_link_title?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if((!isset($is_homepage) || $is_homepage == false) && isset($upcoming_event) && !empty($upcoming_event)): ?>
		<div class="sidebar-item sidebar-upcoming_event upcoming_event">
			<h5>Upcoming Event</h5>
			<p><?=$upcoming_event->clickable_name?> at <?php echo implode(', ', $upcoming_event->get_locations_formatted(true, true)); ?></p>
			<p><?=$upcoming_event->description_first_sentence?></p>
			<p class=""><?=$upcoming_event->date_range?></p>
		</div>
	<?php endif; ?>

	<div class="sidebar-item sidebar-archive">
		<h5>Archives</h5>
		<?php echo $this->fuel->blog->sidemenu(array('archives')); ?>
	</div>

	<div class="sidebar-item sidebar-archive">
		<h5>Authors</h5>
		<?php echo $this->fuel->blog->sidemenu(array('authors')); ?>
	</div>

	<div class="sidebar-item sidebar-meta meta">
		<h5>Meta</h5>
		<ul>
			<?php if($this->fuel->auth->is_logged_in()): ?>
				<li><a href="/admin">Dashboard</a></li>
				<li><a href="/admin/logout">Log out</a></li>
			<?php else: ?>
				<li><a href="/admin">Dashboard</a></li>
			<?php endif; ?>
			<li><a href="/sitemap.xml">Sitemap</a></li>
			<!-- <li><a href="/rss.xml">RSS</a></li> -->
		</ul>
	</div>

</div>
