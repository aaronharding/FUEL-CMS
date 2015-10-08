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
			<?php $this->load->view('_blocks/location-map', array(
				'address' => $location->google_map_address,
				'lat' => $location->lat,
				'lng' => $location->lng,
				'class' => 'location-location-google_map',
				'width' => 785,
				'height' => 400
			)); ?>
			</div>

			<?php if(!empty($location->current_events)): ?>
				<?php $this->load->view('_blocks/events', array(
					'title' => 'What\'s going on',
					'events' => $location->current_events,
					'class' => 'current_events'
				)); ?>
			<?php endif; ?>

			<?php if(!empty($location->past_events)): ?>
				<h5 class="past_events"><a href="#" data-replacetext="Hide past events">View past events</a></h5>
				<?php $this->load->view('_blocks/events', array(
					'title' => '',
					'events' => $location->past_events,
					'class' => 'past_events'
				)); ?>
			<?php endif; ?>

		</div><div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>