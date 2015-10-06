<?php if(isset($address)): ?>

	<iframe
		width="<?=$width?>"
		height="<?=$height?>"
		class="<?=$class?>"
		frameborder="0"
		scrolling="no"
		marginheight="0"
		marginwidth="0" 
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDu6_7V9QPrN6cU9A848pb_xigtzwEGjMw
			&q=<?=$address?>"
		allowfullscreen>
	</iframe>
	<h6><a href="http://maps.google.com/maps?z=12&t=m&q=<?=$address?>" target="_blank">Get directions here</a></h6>

<?php elseif(isset($lat) && isset($lng)): ?>

	<iframe
		src="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$lng?>+<?=$lat?>"
		width="<?=$width?>"
		height="<?=$height?>"
		class="<?=$class?>"
		frameborder="0"
		scrolling="no"
		marginheight="0"
		marginwidth="0" 
		allowfullscreen>
	</iframe>
	<h6><a href="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$lng?>+<?=$lat?>" target="_blank">Get directions here</a></h6>
	
<?php endif; ?>