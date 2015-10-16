<?php 
	$q = isset($address) ? $address : ((isset($lat) && isset($lng)) ? "{$lat}+{$lng}" : null);
?>

<?php if($q !== null): ?>

	<iframe
		width="<?=$width?>"
		height="<?=$height?>"
		class="<?=$class?>"
		frameborder="0"
		scrolling="no"
		marginheight="0"
		marginwidth="0" 
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAprqcR7OkBBUhyt8AKO7uCkiEWfOhzpkI
			&q=<?=$q?>"
		allowfullscreen>
	</iframe>
	<h6><a href="http://maps.google.com/maps?z=12&t=m&q=<?=$q?>" target="_blank">Get directions here</a></h6>
	
<?php endif; ?>