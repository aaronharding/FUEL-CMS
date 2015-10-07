<div class="sidebar">
	<div class="sidebar-item sidebar-search search">
		<form action="">
			<label for="search-input"><h5>Search</h5></label>

			<input type="text" value="" name="search-input" id="search-input" placeholder="Search De Visionarissen">
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
						<p><a href=""><?=$post?></a> by Joe</p>
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
						<p><?=$comment?></p>
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
			<li>Log in</li>
		</ul>
	</div>

</div>
