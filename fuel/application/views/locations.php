<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section">
	<div class="row">
		<div class="cell cell-full">
			<h2>Locaties</h2>
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
				<h4>Er is op dit moment geen locatie bekend.</h4>
				<p>Neem een kijkje op <a href="/blog">de blog</a> om te zien wat er leeft.</p>
			<?php endif; // empty $locations ?>

		</div><div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>