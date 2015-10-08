<div class="locations_list-location <?=$class?>-location">
	<h4><?=$location->title?></h4>
	<p><?=$location->excerpt?></p>
	<?php if($show_map): ?>
		<p><?php echo $location->get_clickable("More information"); ?></p>
		<?php $this->load->view('_blocks/location-map', array(
			'address' => $location->google_map_address,
			'lat' => $location->lat,
			'lng' => $location->lng,
			'class' => 'google_map',
			'width' => 758,
			'height' => 400
		)); ?>
	<?php else: ?>
		<p><?php echo $location->get_clickable("More information and directions"); ?></p>
	<?php endif; ?>
</div>	