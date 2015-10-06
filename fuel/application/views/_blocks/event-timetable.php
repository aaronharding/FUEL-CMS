<?php if(!empty($timetable_formatted)): ?>
	<?php foreach($timetable_formatted as $time): ?>
		<div class="<?=$class?>">
			<?php if (isset($time[0]) || array_key_exists(0, $time)): ?><h6><?=$time[0]?></h6>					<?php endif; ?>
			<?php if (isset($time[0]) || array_key_exists(1, $time)): ?><blockquote><?=$time[1]?></blockquote>	<?php endif; ?>
		</div>
	<?php endforeach; ?>
<?php endif; ?>