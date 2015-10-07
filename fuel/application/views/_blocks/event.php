<div class="events_list-event <?=$class?>-event">
	<div class="events_list-event-title <?=$class?>-event-title">
		<h5><a href="<?=$event->get_url()?>"><?=$event->name?></a></h5>
		<p><?=$event->date_range?></p>
	</div>
	<p><?=$event->description?></p>
	<p><a href="<?=$event->get_url()?>">More information</a></p>
</div>