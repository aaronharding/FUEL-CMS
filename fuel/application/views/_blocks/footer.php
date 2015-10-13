	
	<div class="section footer">
		<div class="row">
			<div class="cell cell-half footer-instagram">
				<?php // echo $this->footer_images_model->get_render(); ?>
			</div>
		</div>
		<div class="row">
			<div class="cell cell-half">

				<?php if(isset($global_contact_email) && $global_contact_email !== ""): ?><p>c: <a href="mailto:<?=$global_contact_email?>"><?=$global_contact_email?></a></p><?php endif; ?>
				<?php if(isset($global_telephone_number) && $global_telephone_number !== ""): ?><p>t: <?=$global_telephone_number?></p><?php endif; ?>

			<!-- keep this white space between these div elements on the line below! -->
			</div><div class="cell cell-half">
				<?php 
				?>
				<div class="footer-date">&copy; <?=$datePretty?> De Visionarissen</div>
			</div>
		</div>
	</div>

	<?=jquery()?>
	<?php echo js($js['main']); ?>

	<?php echo "<!-- comment-reply -->"; ?>
	<?=js('comment_reply', BLOG_FOLDER)?>

</body>
</html>