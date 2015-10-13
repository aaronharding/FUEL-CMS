<?php 

// declared here so we don't have to in each controller's variable file
$CI =& get_instance();

// generic global page variables used for all pages
$vars = array();
$vars['layout'] = 'main';
$vars['page_title'] = fuel_nav(array('render_type' => 'page_title', 'delimiter' => ' - ', 'order' => 'desc', 'home_link' => 'De Visionarissen'));
$vars['meta_keywords'] = '';
$vars['meta_description'] = '';

// user agent and device things
$vars['is_mobile'] = $CI->agent->is_mobile();
$vars['device'] = $vars['is_mobile'] ? 'mobile' : 'desktop';

// date the site was created
$vars['dateCreated'] = intval(2015);
// now day
$vars['dateNow'] = intval(date("Y"));
$vars['datePretty'] = $vars['dateCreated'] !== $vars['dateNow'] ? "{$vars['dateCreated']} — {$vars['dateNow']}" : $vars['dateNow'];

// script things
$vars['js'] = array();
$vars['js']['main'] = (ENVIRONMENT === "production") ? array('dist/hello.js') : array(
	'windowScroll.js',
	'vendor/jquery.transit.min.js',
	'classes/HideAndShow.js',
	'classes/Popovers.js',
	'main.js'
);

// css things
$vars['css'] = array();
$vars['css']['main'] = (ENVIRONMENT === "production") ? array('dist/hello.css') : array(
	'main.css'
);

switch($vars['device'])
{
	case 'mobile':
		$vars['css']['device'] = (ENVIRONMENT === "production") ? array('dist/mobile.css') : array('mobile.css');
		break;
	default:
		$vars['css']['device'] = (ENVIRONMENT === "production") ? array('dist/desktop.css') : array('desktop.css');
		break;
}

$vars['body_class'] = trim('unloaded ' . uri_segment(1) . ' ' . uri_segment(2));

// page specific variables
$pages = array();
?>