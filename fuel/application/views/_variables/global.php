<?php 

// declared here so we don't have to in each controller's variable file
$CI =& get_instance();

// generic global page variables used for all pages
$vars = array();
$vars['layout'] = 'main';
$vars['page_title'] = fuel_nav(array('render_type' => 'page_title', 'delimiter' => ' : ', 'order' => 'desc', 'home_link' => 'Home'));
$vars['meta_keywords'] = '';
$vars['meta_description'] = '';
$vars['js'] = array(
    'main.js'
);
$vars['css'] = array(
	'main.css'
);
$vars['body_class'] = trim('unloaded ' . uri_segment(1) . ' ' . uri_segment(2));

// page specific variables
$pages = array();
?>