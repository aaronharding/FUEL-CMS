<!doctype>
<!--[if lte IE 8]>		<html itemscope itemtype="http://schema.org/Product" class="no-js lt-ie10 lt-ie9"><![endif]-->
<!--[if IE 9]>          <html itemscope itemtype="http://schema.org/Product" class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 10]><!--> <html itemscope itemtype="http://schema.org/Product" class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	
	<!-- ᶘ ᵒᴥᵒᶅ with help from Aaron Harding http://aharding.co.uk/ -->

 	<title><?php 
			if (!empty($is_blog)):
				echo $CI->fuel->blog->page_title($page_title, ' - ', 'right');
			else:
				if($page_title == 'De Visionarissen')//fuel_var('page_title'))
					echo $page_title;
				else
					echo $page_title;//fuel_var('page_title', '');
			endif;
		?></title>

	<meta name="keywords" content="<?php echo fuel_var('meta_keywords')?>">
	<meta name="description" content="<?php echo fuel_var('meta_description')?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<base href="/">

	<?php
		echo css($css['main']);
		echo css($css['device']);	

		if (!empty($is_blog)):
			echo $CI->fuel->blog->header();
		endif;
	?>

	<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
	<link rel="manifest" href="/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="shortcut icon" type="image/png" href="favicon.ico">

	<script>
		var DV = DV || {};
		DV.device = '<?=$device?>';
		<?php if(!empty($is_homepage)): ?>DV.is_homepage = <?=$is_homepage?><?php endif; ?>
	</script>

	<!-- :( -->
	<?=jquery()?>

</head>
<body class="<?php echo fuel_var('body_class', '');?><?php if(!empty($is_homepage) && $is_homepage): echo " homepage"; endif; ?>">

<?php if(!empty($is_homepage) && $is_homepage): ?>

	<div class="logo">
		<div class="logo-image"></div>
		<div class="logo-text">
			<h2><span>De Visionarissen</span></h2>
			<h6><?=$frontpage_subtitle?></h6>
		</div>
	</div>

<?php endif; ?>

<div class="section header<?php if(!empty($is_homepage) && $is_homepage): echo " header-hidden"; endif; ?>">
	<div class="header-logo">
		<a href="/">
			<img src="/assets/img/clouds-fs8.png" alt="De Visionarissen" width="42" height="30"> <span>De Visionarissen</span>
		</a>
	</div>
	<div class="row">
		<div class="cell cell-full">
			<div class="header-nav">
				<?php
					echo fuel_nav();
				?>
				<!-- <ul>
					<li><a href="/events">Events</a></li>
					<li><a href="/locations">Locations</a></li>
					<li><a href="/blog/authors">Authors</a></li>
					<li><a href="/blog">Blog</a></li>
				</ul> -->
			</div>
		</div>
	</div>
</div>