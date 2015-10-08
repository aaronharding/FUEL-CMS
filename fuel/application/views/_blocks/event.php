<div class="events_list-event <?=$class?>-event">
	<div class="events_list-event-title <?=$class?>-event-title">
		<h4><a href="<?=$event->get_url()?>"><?=$event->name?></a></h4>
		<p><?=$event->date_range?></p>
	</div>
	<div class="events_list-event-description <?=$class?>-event-description">
		<p><?=$event->description?></p>
	</div>
	<div class="events_list-event-meta <?=$class?>-event-meta">	
		<?php if($is_events_page): ?>
			<?php if(count($event->locations) > 0): ?>
				<p>at <?=implode(', ', $event->get_locations_formatted(true))?></p>
			<?php endif; ?>
			<?php if(count($event->speakers) > 0): ?>
				<p>with <?=implode(', ', $event->get_speakers_formatted(true))?></p>
			<?php endif; ?>
		<?php endif; ?>
		<p><a href="<?=$event->get_url()?>">More information</a></p>
	</div>
</div>