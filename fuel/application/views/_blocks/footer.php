	
	<div class="section footer">
		<div class="row">
			<div class="cell cell-half">

				<?php
					$global_contact_email = isset($global_contact_email) ? $global_contact_email : null;
					$global_telephone_number = isset($global_telephone_number) ? $global_telephone_number : null;
				?>
				
				<p>c: <a href="mailto:<?=$global_contact_email?>"><?=$global_contact_email?></a></p>
				<p>t: <?=$global_telephone_number?></p>

			<!-- keep this white space between these div elements on the line below! -->
			</div><div class="cell cell-half">
				<?php 
					// footer date
					$dateFrom = intval(2015);
					$date = intval(date("Y"));
					if( $dateFrom !== $date ) $date = "$dateFrom — $date";
				?>
				<div class="footer-date">&copy; <?=$date?> De Visionarissen</div>
			</div>
		</div>
	</div>

	<?=jquery()?>
	<?php echo js($js); ?>

</body>
</html>