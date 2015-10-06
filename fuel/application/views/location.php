<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section">
	<div class="row">
		<div class="cell cell-full"><?php echo fuel_var('body', 'location')?></div>
	</div>
</div>


<?=$this->load->view('_blocks/footer')?>