<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section">
	<div class="row">
		<div class="cell cell-full">
			<h2>Events</h2>
		</div>
	</div>
</div>

<div class="section main events">
	<div class="row">
		<div class="cell cell-six">

			<?php if (!empty($events)) : ?>
				<?php $this->load->view('_blocks/events', array(
					'title' => null,
					'events' => $events,
					'class' => 'events'
				)); ?>
			<?php else: // empty $events ?>
				<h4>There are currently no events.</h4>
				<p>We are planning some very soon, why not head over and see what's being discussed at <a href="/blog">the blog</a>?</p>
			<?php endif; // empty $events ?>

		</div><div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>