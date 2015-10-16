<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section">
	<div class="row">
		<div class="cell cell-full">
			<h2>Locations</h2>
		</div>
	</div>
</div>

<div class="section main locations">
	<div class="row">
		<div class="cell cell-six">

			<?php if (!empty($locations)) : ?>
				<?php $this->load->view('_blocks/locations', array(
					'title' => null,
					'locations' => $locations,
					'class' => 'locations',
					'show_map' => false,
					'title_links' => true
				)); ?>
			<?php else: // empty $locations ?>
				<h4>There are currently no locations.</h4>
				<p>We are planning some very soon, why not head over and see what's being discussed at <a href="/blog">the blog</a>?</p>
			<?php endif; // empty $locations ?>

		</div><div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>