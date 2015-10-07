<?php $this->load->view('_blocks/header')?>
	
	<div class="section">
		<div class="row">
			<div class="cell cell-full">
				<h2><?php echo fuel_var('heading'); ?></h2>
				<?php echo fuel_var('body', ''); ?>
			</div>
		</div>
	</div>
	
<?php $this->load->view('_blocks/footer')?>
