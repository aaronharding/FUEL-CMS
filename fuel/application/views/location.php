<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section location-title">
	<div class="row">
		<div class="cell cell-full">
			<h2><?=$location->title?></h2>
		</div>
	</div>
</div>

<div class="section location-introduction">
	<div class="row">
		<?php if(!empty($location->image)): ?>
			<div class="cell cell-three">
				<img src="/assets/images/<?=$location->image?>" alt="<?=$location->name?>">
			</div>
			<div class="cell cell-five">
				<h6><?=$location->excerpt?></h6>
			</div>
		<?php else: ?>
			<div class="cell cell-full">
				<h6><?=$location->excerpt?></h6>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="section main location">
	<div class="row">
		<div class="cell cell-six">
			
			<div class="location-content">
				<?=$location->content?>
			</div>

			<div class="location-location">
			<?php $this->load->view('_blocks/event-location', array(
				'address' => $location->google_map_address,
				'lat' => $location->lat,
				'lng' => $location->lng,
				'class' => 'location-location-google_map',
				'width' => 785,
				'height' => 400
			)); ?>
			</div>

			<?php if(!empty($location->current_events)): ?>
				<div class="location-events">
					<h4>Events at this location</h4>
					<?php foreach($location->current_events as $event): ?>
						<div class="location-event">
							<div class="location-event-title">
								<h5><a href="<?=$event->get_url()?>"><?=$event->name?></a></h5>
								<p><?=$event->date_range?></p>
							</div>
							<p><?=$event->description?></p>
							<p><a href="<?=$event->get_url()?>">More information</a></p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>