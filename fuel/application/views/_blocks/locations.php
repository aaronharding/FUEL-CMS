<div class="locations_list <?=$class?>-locations">
	<?php if(isset($title) && $title != ""): ?><h4><?=$title?></h4><?php endif; ?>
	<?php foreach($locations as $location): ?>
		<?php $this->load->view('_blocks/location', array(
			'location' => $location,
			'class' => $class,
			'show_map' => isset($show_map) ? $show_map : true,
			'title_links' => isset($title_links) ? $title_links : true
		)); ?>	
	<?php endforeach; ?>
</div>