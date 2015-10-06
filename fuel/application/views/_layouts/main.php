<?php $this->load->view('_blocks/header')?>
	
	<div class="section layout-main">
		<div class="row">
			<div class="cell cell-full">
				<h2><?php echo fuel_var('heading', ''); ?></h2>
				<p><?php echo fuel_var('body', ''); ?></p>
			</div>
		</div>
	</div>
	
<?php $this->load->view('_blocks/footer')?>