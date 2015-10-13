<?php $this->load->view('_blocks/header')?>
	
<div class="section">
	<div class="row">
		<div class="cell cell-full">
			<h2><?php echo fuel_var('heading', ''); ?></h2>
		</div>
	</div>
</div>

<div class="section main layout-main">
	<div class="row">
		<div class="cell cell-six">

			<?php echo fuel_var('body', ''); ?>

		</div><div class="cell cell-two">
			<?php // $this->load->view('_blocks/sidebar', $this->sidebar_model->get_sidebar()); ?>
		</div>
	</div>
</div>
	
<?php $this->load->view('_blocks/footer')?>