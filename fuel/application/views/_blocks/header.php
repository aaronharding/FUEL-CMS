<!doctype>
<!--[if lte IE 8]>		<html itemscope itemtype="http://schema.org/Product" class="no-js lt-ie10 lt-ie9"><![endif]-->
<!--[if IE 9]>          <html itemscope itemtype="http://schema.org/Product" class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 10]><!--> <html itemscope itemtype="http://schema.org/Product" class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<!-- ᶘ ᵒᴥᵒᶅ by aharding.co.uk -->
 	<title>
		<?php 
			if (!empty($is_blog)) :
				echo $CI->fuel->blog->page_title($page_title, ' : ', 'right');
			else:
				echo fuel_var('page_title', '');
			endif;
		?>
	</title>

	<meta name="keywords" content="<?php echo fuel_var('meta_keywords')?>">
	<meta name="description" content="<?php echo fuel_var('meta_description')?>">

	<?php
		echo css($css);

		if (!empty($is_blog)):
			echo $CI->fuel->blog->header();
		endif;
	?>
</head>
<body class="<?php echo fuel_var('body_class', '');?>">

<?php if(!empty($is_homepage)): ?>

	<div class="section logo">
		<div class="row">
			<div class="cell cell-full">
				logo
			</div>
		</div>
	</div>

<?php else: // homepage check ?>


<?php endif; ?>