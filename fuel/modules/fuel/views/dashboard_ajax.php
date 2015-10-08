<?php if ($this->fuel->auth->has_permission('logs')) : ?>
<?php if (!empty($latest_activity)) : ?>
<div class="dashboard_pod" style="width: 400px;">

	<h3><?=lang('dashboard_hdr_latest_activity')?></h3>
	<ul class="nobullets">
		<?php foreach($latest_activity as $val) : ?>
		<li><strong><?=english_date($val['entry_date'], true)?>:</strong> <?=$val['message']?> - <?=$val['name']?></li>
		<?php endforeach; ?>
	</ul>
	<a href="<?=fuel_url('logs')?>"><?=lang('dashboard_view_all_activity')?></a>
</div>
<?php endif; ?>
<?php endif; ?>

<?php if (!empty($recently_modifed_pages)) : ?>
<div class="dashboard_pod" style="width: 230px;">
	<h3><?=lang('dashboard_hdr_modified')?></h3>
		<ul class="nobullets">
			<?php foreach($recently_modifed_pages as $val) : ?>
			<li><a href="<?=fuel_url('pages/edit/'.$val['id'])?>"><?=$val['location']?></a></li>
			<?php endforeach; ?>
		</ul>
		<a href="<?=fuel_url('pages')?>"><?=lang('dashboard_view_all_pages')?></a>
</div>
<?php endif; ?>


<div class="clear"></div>
