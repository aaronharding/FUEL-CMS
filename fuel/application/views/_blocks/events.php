<div class="events_list <?=$class?>-events">
	<?php if(isset($title) && $title != ""): ?><h4><?=$title?></h4><?php endif; ?>
	<?php foreach($events as $event): ?>
		<?php $this->load->view('_blocks/event', array(
			'event' => $event,
			'class' => $class
		)); ?>
	<?php endforeach; ?>
</div>	