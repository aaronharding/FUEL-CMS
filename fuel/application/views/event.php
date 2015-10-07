<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<div class="section event-title">
	<div class="row">
		<div class="cell cell-full">
			<h2><?=$event->name?></h2>
		</div>
	</div>
</div>

<div class="section event-introduction">
	<div class="row">
		<?php if(!empty($event->image)): ?>
			<div class="cell cell-three">
				<img src="/assets/images/<?=$event->image?>" alt="<?=$event->name?>">
			</div>
			<div class="cell cell-five">
				<h6><?=$event->description?></h6>
			</div>
		<?php else: ?>
			<div class="cell cell-full">
				<h6><?=$event->description?></h6>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="section main event">
	<div class="row">
		<div class="cell cell-six">

			<?php if(count($event->locations) > 0): ?>
				<?php foreach($event->locations as $location): ?>
					<div class="event-location">
						<h4><a href="<?=$location->url?>"><?=$location->title?></a></h4>
						<?php $this->load->view('_blocks/event-location', array(
							'address' => $location->google_map_address,
							'lat' => $location->lat,
							'lng' => $location->lng,
							'class' => 'google_map',
							'width' => 758,
							'height' => 400
						)); ?>
					</div>			
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if(count($event->speakers) > 0): ?>
				<div class="event-speakers">
					<h4>Speakers</h4>
					<?php foreach($event->speakers as $speaker): ?>
						<h5><?=$speaker->name?></h5>			
						<?php if(isset($speaker->blurb) && $speaker->blurb !== ""): ?><p><?=$speaker->blurb?></p><?php endif; ?>				
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="event-timetable">
				<h4>Timetable</h4>
				<?php $this->load->view('_blocks/event-timetable', array(
					'timetable_formatted' => $event->timetable_formatted,
					'class' => 'event-timetable-time'
				)); ?>
			</div>
			
		</div>
		<div class="cell cell-two">
			<?php $this->load->view('_blocks/sidebar', $sidebar); ?>
		</div>
	</div>
</div>

<?=$this->load->view('_blocks/footer')?>