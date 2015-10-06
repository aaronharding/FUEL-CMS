<?php $this->load->view('_blocks/header')?>
	
	<div class="section">
		<div class="row">
			<div class="cell cell-full">
				<h1><?php echo fuel_var('heading'); ?></h1>
				<?php echo fuel_var('body', ''); ?>
			</div>
		</div>
	</div>
	
<?php $this->load->view('_blocks/footer')?>
