<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section">
	<div class="row">
		<div class="cell cell-full">
			<h2>Evenementen</h2>
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
					'class' => 'events',
					'is_events_page' => true
				)); ?>
			<?php else: // empty $events ?>
				<h4>Er is op dit moment geen samenkomst geplant.</h4>
				<p>Wij zijn een nieuwe samenkomst aan het plannen, neem een kijkje op <a href="/blog">de blog</a> om te zien wat er leeft</p>
			<?php endif; // empty $events ?>

		</div><div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>