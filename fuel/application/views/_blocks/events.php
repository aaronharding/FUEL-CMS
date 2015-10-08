<div class="events_list <?=$class?>-events">
	<?php if(isset($title) && $title != ""): ?><h4 class="events_list-events-title <?=$class?>-events-title"><?=$title?></h4><?php endif; ?>
	<?php foreach($events as $event): ?>
		<?php $this->load->view('_blocks/event', array(
			'event' => $event,
			'class' => $class,
			'is_events_page' => isset($is_events_page) ? $is_events_page : false
		)); ?>
	<?php endforeach; ?>
</div>	