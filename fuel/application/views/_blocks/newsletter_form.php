<?php /*
<?php foreach($fields as $field) : ?>
<div>
    <?=$field['label']?>
    <p><?=$field['field']?></p>
</div>
<?php endforeach; ?>
<input type="hidden" name="return_url" id="return_url" value="http://devisionarissen.dev/">
<input type="hidden" name="form_url" id="form_url" value="http://devisionarissen.dev/">
<?=$__antispam___field?>
<input type="submit" value="<?=$submit_value?>">
*/ ?>
<form action="http://devisionarissen.dev/forms/process/newsletter" method="post">
	
	<input type="text" value="" name="name" id="name" class="name" placeholder="Your name">
	<input type="email" value="" name="email" id="email" class="email" placeholder="Your e-mail">
	<input type="submit" class="search-submit" value="Subscribe">

	<?php
	if ($this->config->item('csrf_protection')) :
	    $this->security->csrf_set_cookie();
	?>
	    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>"/>
	<?php endif;?>

</form>