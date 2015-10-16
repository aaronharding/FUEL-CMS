<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<?php echo fuel_var('body', '')?>

<?php /* $this->load->view('_blocks/posts', array(
	'post_count' => $frontpage_post_count,
	'headline' => $frontpage_post_headline
))*/ ?>

	<div class="section main">
		<div class="row">
			<div class="cell cell-six">

				<h2><?php echo $heading; ?></h2>
				<?php echo $message; ?>

			</div><div class="cell cell-two">
				<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
			</div>
		</div>
	</div>

<?=$this->load->view('_blocks/footer')?>