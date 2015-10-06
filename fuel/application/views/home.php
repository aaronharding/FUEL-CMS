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
				<a href="<?=$upcoming_event->get_url()?>"><h2><?=$upcoming_event->name?></a></h2>
			</div>
		</div>
		<div class="row">
			<div class="cell cell-five">
				<?php if(!empty($upcoming_event->image)): ?>
					<img class="home-upcoming_event-image" src="assets/images/<?=$upcoming_event->image?>">
				<?php endif; ?>
				<h6><?=$upcoming_event->description?></h6>
			</div><div class="cell cell-three home-upcoming_event-timetable">
				<?php $this->load->view('_blocks/event-timetable', array(
					'timetable_formatted' => $upcoming_event->timetable_formatted,
					'class' => 'home-upcoming_event-timetable-time'
				)); ?>
			</div>
		</div>
		<?php if(!empty($upcoming_event->speakers_formatted)): ?>
		<div class="row">
			<div class="cell cell-full">
				With: <?php echo implode(', ', $upcoming_event->speakers_formatted); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; // upcoming event ?>

	<div class="section main">
		<div class="row">
			<div class="cell cell-six">

				<?php if (!empty($posts)) : ?>

					<ul>
					<?php foreach($posts as $post) : ?>
						<li>
					    	<h4><a href="<?php echo $post->url; ?>"><?php echo $post->title; ?></a></h4>
					    <?php echo $post->get_excerpt(200, 'Read More'); ?>
						</li>
					<?php endforeach; // $posts as $post ?>
					</ul>
				 
				<?php else: // empty $posts ?>
					&nbsp;
				<?php endif; // empty $posts ?>

			</div><div class="cell cell-two">
				right
			</div>
		</div>
	</div>

<?=$this->load->view('_blocks/footer')?>