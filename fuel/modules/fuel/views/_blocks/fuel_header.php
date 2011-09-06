<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="shell">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 	<title><?=$page_title?></title>

	<?=css('datepicker, jqmodal, markitup, jquery.tooltip, jquery.supercomboselect, jquery.treeview, fuel', 'fuel')?>

	<?php foreach($css as $c) : echo css($c); endforeach; ?>
	
	<script type="text/javascript">
		<?=$this->load->module_view(FUEL_FOLDER, '_blocks/fuel_header_jqx', array(), TRUE)?>
	</script>
	<?=js('jquery/jquery', 'fuel')?>
	<?=js('jqx/jqx', 'fuel')?>
	<?=js($this->config->item('fuel_javascript', 'fuel'), 'fuel')?>
	<?php if (!empty($js)) { echo js($js); } ?>

	<?php if (!empty($this->js_controller)) : ?> 
	<script type="text/javascript">
		<?php if ($this->js_controller != 'BaseFuelController') : ?>
		jqx.addPreload('fuel.controller.BaseFuelController');
		<?php endif; ?>
		jqx.init('fuel.controller.<?=$this->js_controller?>', <?=json_encode($this->js_controller_params)?> );
	</script>
	<?php endif; ?>

</head>
