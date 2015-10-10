<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<?php echo fuel_var('body', '')?>

<?php /* $this->load->view('_blocks/posts', array(
	'post_count' => $frontpage_post_count,
	'headline' => $frontpage_post_headline
))*/ ?>

	<?php if (!empty($upcoming_event)) : ?>
	<div class="section home-upcoming_event">
		<div class="row">
			<div class="cell cell-full">
				<h2><a href="<?=$upcoming_event->get_url()?>"><?=$upcoming_event->name?></a></h2>
			</div>
		</div>
		<div class="row">
			<div class="cell cell-five">
				<div class="home-upcoming_event-description">
					<?php if(!empty($upcoming_event->image)): ?>
						<img class="home-upcoming_event-image" src="assets/images/<?=$upcoming_event->image?>">
					<?php endif; ?>
					<h6><?=$upcoming_event->description?></h6>
					<?php if(count($upcoming_event->locations) > 0): ?>
						<p>at <?=implode(', ', $upcoming_event->get_locations_formatted(true))?></p>
					<?php endif; ?>
					<?php if(count($upcoming_event->speakers) > 0): ?>
						<p>with <?=implode(', ', $upcoming_event->get_speakers_formatted(true))?></p>
					<?php endif; ?>
				</div>
			</div><div class="cell cell-three home-upcoming_event-timetable">
				<?php $this->load->view('_blocks/event-timetable', array(
					'timetable_formatted' => $upcoming_event->get_timetable_formatted(),
					'class' => 'home-upcoming_event-timetable-time',
					'date_range' => $upcoming_event->date_range
				)); ?>
			</div>
		</div>
		<?php /* if(!empty($upcoming_event->speakers_formatted)): ?>
		<div class="row">
			<div class="cell cell-full">
				<p>at <?=implode(', ', $upcoming_event->get_locations_formatted(true))?></p>
				<p>with <?=implode(', ', $upcoming_event->get_speakers_formatted(true))?></p>
			</div>
		</div>
		<?php endif; */ ?>
	</div>
	<?php endif; // upcoming event ?>

	<div class="section main">
		<div class="row">
			<div class="cell cell-six">

				<div class="posts">
					<?php if (!empty($posts)) : ?>

						<?=$this->fuel->blog->block('posts', array(
							'posts' => $posts,
							'is_preview' => true
						))?>
						<?php /*
						<ul>
						<?php foreach($posts as $post) : ?>
							<?php $this->load->view('_blocks/post', array(
								'post' => $post
							)); ?>
						<?php endforeach; // $posts as $post ?>
						</ul>

						*/ ?>
					 
					<?php else: // empty $posts ?>
						<div class="posts-no_posts">
							<p><!-- There are no posts available. --></p>
						</div>
					<?php endif; // empty $posts ?>
				</div>
			</div><div class="cell cell-two">
				<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
			</div>
		</div>
	</div>

<?=$this->load->view('_blocks/footer')?>