	
	<div class="section footer">
		<?php if(isset($this->footer_images_model)): ?>
		<div class="row footer-instagram">
			<div class="cell cell-full">
				<h5><a href="https://instagram.com/de_visionarissen/" target="_blank">Instagram</a></h5>
				<div class="slider">
					<?php foreach($this->footer_images_model->get_images()->data as $image): ?>
						<?php if($image->type !== "image"): continue; endif ;?>
						<div class="footer-instagram-image">
							<div class="footer-instagram-image_content">
								<?php
									echo "<a href=\"{$image->link}\" target=\"_blank\"><img src=\"{$image->images->thumbnail->url}\" width=\"150\" height=\"150\" alt=\"{$image->caption->text}\"></a>";
								?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row footer-meta">
			<div class="cell cell-half">

				<?php if(isset($global_contact_email) && $global_contact_email !== ""): ?><p>c: <a href="mailto:<?=$global_contact_email?>"><?=$global_contact_email?></a></p><?php endif; ?>
				<?php if(isset($global_telephone_number) && $global_telephone_number !== ""): ?><p>t: <?=$global_telephone_number?></p><?php endif; ?>

			<!-- keep this white space between these div elements on the line below! -->
			</div><div class="cell cell-half">
				<div class="footer-meta-date">&copy; <?=$datePretty?> De Visionarissen</div>
			</div>
		</div>
	</div>

	<?php echo js($js['main']); ?>

	<?php echo "<!-- comment-reply -->"; ?>
	<?=js('comment_reply', BLOG_FOLDER)?>

</body>
</html>