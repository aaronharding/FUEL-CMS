<div class="locations_list-location <?=$class?>-location">
	<?php if($title_links): ?>
		<h4><?=$location->get_clickable($location->title, '', false)?></h4>
	<?php else: ?>
		<h4><?=$location->title?></h4>
	<?php endif; ?>
	<p><?=$location->excerpt?></p>
	<?php if($show_map): ?>
		<p><?php echo $location->get_clickable("Meer informatie"); ?></p>
		<?php $this->load->view('_blocks/location-map', array(
			'address' => $location->google_map_address,
			'lat' => $location->lat,
			'lng' => $location->lng,
			'class' => 'google_map',
			'width' => 758,
			'height' => 400
		)); ?>
	<?php else: ?>
		<p><?php echo $location->get_clickable("Meer informatie en routebeschrijving", '', false); ?></p>
	<?php endif; ?>
</div>	