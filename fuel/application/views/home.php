<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<?php echo fuel_var('body', '')?>

<?php /* $this->load->view('_blocks/posts', array(
	'post_count' => $frontpage_post_count,
	'headline' => $frontpage_post_headline
))*/ ?>

hello, world

<?=$this->load->view('_blocks/footer')?>