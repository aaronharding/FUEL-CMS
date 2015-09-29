<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section">
	<div class="row">
		<div class="cell cell-full"></div>
	</div>
</div>

<?php echo fuel_var('body', '')?>

<?php /* $this->load->view('_blocks/posts', array(
	'post_count' => $frontpage_post_count,
	'headline' => $frontpage_post_headline
))*/ ?>

	<?php if (!empty($upcoming_event)) : ?>
	<div class="section upcoming_event">
		<div class="row">
			<div class="cell cell-full">
				<h2><?=$upcoming_event->name?></h2>
				<?php if(isset($upcoming_event->event_subtitle)): ?>
					<h5>Speaker<?php if(count($upcoming_event->speakers) > 1) :?>s<?php endif; ?> <?=$upcoming_event->event_subtitle?></h5>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<?php if(!empty($upcoming_event->image)): ?>

				<div class="cell cell-three upcoming_event-image">
					<img src="assets/images/<?=$upcoming_event->image?>">
				</div><div class="cell cell-four">
					<h6><?=$upcoming_event->description?></h6>
				</div><div class="cell cell-one">
					<h6><?=$upcoming_event->timetable?><h6>
				</div>

			<?php else: ?>

				<div class="cell cell-six">
					<h6><?=$upcoming_event->description?></h6>
				</div><div class="cell cell-two">
					<h6><?=$upcoming_event->timetable?></h6>
				</div>

			<?php endif; ?>
		</div>
	</div>
	<?php endif; // upcoming event ?>

	<div class="section main">
		<div class="row">
			<div class="cell cell-six">

				<?php if (!empty($posts)) : ?>

					<h2>The Latest from our Blog</h2>
					<ul>
					<?php foreach($posts as $post) : ?>
						<li>
					    	<h4><a href="<?php echo $post->url; ?>"><?php echo $post->title; ?></a></h4>
					    <?php echo $post->get_excerpt(200, 'Read More'); ?>
						</li>
					<?php endforeach; // $posts as $post ?>
					</ul>
				 
				<?php else: // empty $posts ?>
					<h2>..</h2>
				<?php endif; // empty $posts ?>

			</div><div class="cell cell-two">
				right
			</div>
		</div>
	</div>

<?=$this->load->view('_blocks/footer')?>