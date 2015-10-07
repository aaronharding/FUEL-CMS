<div class="sidebar">
	<div class="sidebar-item sidebar-search search">
		<form action="blog/search" method="GET">
			<label for="search-input"><h5>Search</h5></label>

			<input type="text" value="" name="q" id="q" placeholder="Search De Visionarissen">
			<input type="submit" id="search-submit" value="Submit">
		</form>
	</div>

	<?php if(isset($recent_posts) && !empty($recent_posts)): ?>
		<div class="sidebar-item sidebar-recent_posts recent_posts">
			<h5>Recent Posts</h5>
			<ul>
			<ul>
				<?php foreach ($recent_posts as $post): ?>
					<li>
						<p><?=$post->link_title?></a> by <?=$post->author_name?></p>
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
			<p><?=$upcoming_event->clickable_name?> at <?php echo implode(', ', $upcoming_event->get_locations_formatted(true)); ?></p>
			<p><?=$upcoming_event->description_first_sentence?></p>
			<p class=""><?=$upcoming_event->date_range?></p>
		</div>
	<?php endif; ?>

	<div class="sidebar-item sidebar-meta meta">
		<h5>Meta</h5>
		<ul>
			<?php if($this->fuel->auth->is_logged_in()): ?>
				<li><a href="/admin/logout">Log out</a></li>
			<?php else: ?>
				<li><a href="/admin">Log in</a></li>
			<?php endif; ?>
			<li><a href="/sitemap.xml">Sitemap</a></li>
			<!-- <li><a href="/rss.xml">RSS</a></li> -->
		</ul>
	</div>

</div>
