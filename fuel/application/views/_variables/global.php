<?php 

// declared here so we don't have to in each controller's variable file
$CI =& get_instance();

// generic global page variables used for all pages
$vars = array();
$vars['layout'] = 'main';
$vars['page_title'] = fuel_nav(array('render_type' => 'page_title', 'delimiter' => ' - ', 'order' => 'desc', 'home_link' => 'De Visionarissen'));
$vars['meta_keywords'] = '';
$vars['meta_description'] = '';
$vars['js'] = ENVIRONMENT === "nothing_set_up_yet" ? array(
    'dist/devisionarissen.js'
) : array(
	'windowScroll.js',
	'vendor/jquery.transit.min.js',
	'classes/HideAndShow.js',
	'main.js'
);
$vars['css'] = ENVIRONMENT === "nothing_set_up_yet" ? array(
    'dist/devisionarissen.css'
) : array(
	'main.css'
);
$vars['body_class'] = trim('unloaded ' . uri_segment(1) . ' ' . uri_segment(2));

// page specific variables
$pages = array();
?>