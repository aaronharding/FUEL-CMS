<div class="sidebar">
	
	<!-- <div id="right">
		<?php // echo $this->fuel->blog->sidemenu(array('search', 'authors', 'tags', 'categories', 'links', 'archives'))?>
	</div> -->

	<?php if(function_exists('form')): ?>
	<div class="sidebar-item sidebar-newsletter_subscribe">
		<label for=""><h5>Nieuwsbrief</h5></label>
		<?php 
			/* $form = $this->fuel->forms->create('newsletter', array(
				'fields' => array(
					//'name' => array('required' => TRUE),
					//'email' => array('required' => TRUE),
				)
				//,'return_url' => 'http://devisionarissen.dev/go_here'
			));
			// echo $form->render(); *///
			//$form = $this->fuel->forms->create('newsletter');
			//echo $form->render();
			//$this->load->view('_blocks/newsletter_form');
			echo form('newsletter');
		?>
	</div>
	<?php endif; ?>

	<div class="sidebar-item sidebar-search search">
		<label for="q"><h5>Zoekken</h5></label>
		<?php echo $this->fuel->blog->sidemenu(array('search')); ?>
	</div>

	<?php if(isset($recent_posts) && !empty($recent_posts)): ?>
		<div class="sidebar-item sidebar-recent_posts recent_posts">
			<h5>Recente berichten</h5>
			<ul>
			<ul>
				<?php foreach ($recent_posts as $post): ?>
					<li>
						<p><?=$post->link_title?></a> door <?php echo $post->author_link; ?></span></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if(isset($recent_comments) && !empty($recent_comments)): ?>
		<div class="sidebar-item sidebar-recent_conversations recent_conversations">
			<h5>Recente gesprekken</h5>
			<ul>
				<?php foreach ($recent_comments as $comment): ?>
					<li>
						<p><?=$comment->author_name?> op <?=$comment->post_link_title?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if((!isset($is_homepage) || $is_homepage == false) && isset($upcoming_event)): ?>
		<div class="sidebar-item sidebar-upcoming_event upcoming_event">
			<h5>Upcoming Event</h5>
			<p><?=$upcoming_event->get_clickable_name()?> at <?php echo implode(', ', $upcoming_event->get_locations_formatted(true, true)); ?></p>
			<p><?=$upcoming_event->description_first_sentence?></p>
			<p class=""><?=$upcoming_event->date_range?></p>
		</div>
	<?php endif; ?>

	<div class="sidebar-item sidebar-archive">
		<h5>Archief</h5>
		<?php echo $this->fuel->blog->sidemenu(array('archives')); ?>
	</div>

	<div class="sidebar-item sidebar-authors">
		<h5>Auteurs</h5>
		<?php echo $this->fuel->blog->sidemenu(array('authors')); ?>
	</div>

	<div class="sidebar-item sidebar-meta meta">
		<h5>Meta</h5>
		<ul>
			<?php if($this->fuel->auth->is_logged_in()): ?>
				<li><a href="/admin">Dashboard</a></li>
				<li><a href="/admin/logout">Log uit</a></li>
			<?php else: ?>
				<li><a href="/admin">Dashboard</a></li>
			<?php endif; ?>
			<li><a href="/sitemap.xml">Sitemap</a></li>
			<!-- <li><a href="/rss.xml">RSS</a></li> -->
		</ul>
	</div>

</div>
