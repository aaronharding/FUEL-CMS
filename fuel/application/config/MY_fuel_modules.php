<?php 
/*
|--------------------------------------------------------------------------
| MY Custom Modules
|--------------------------------------------------------------------------
|
| Specifies the module controller (key) and the name (value) for fuel
*/


/*********************** EXAMPLE ***********************************

$config['modules']['quotes'] = array(
	'preview_path' => 'about/what-they-say',
);

$config['modules']['projects'] = array(
	'preview_path' => 'showcase/project/{slug}',
	'sanitize_images' => FALSE // to prevent false positives with xss_clean image sanitation
);

*********************** /EXAMPLE ***********************************/



/*********************** OVERWRITES ************************************/

$config['module_overwrites']['categories']['hidden'] = TRUE; // change to FALSE if you want to use the generic categories module
$config['module_overwrites']['tags']['hidden'] = TRUE; // change to FALSE if you want to use the generic tags module

/*********************** /OVERWRITES ************************************/

$config['modules']['events'] = array(
    'module_uri' => 'events',
    'model_name' => 'events_model',
    'model_location' => '',
    'display_field' => 'name',
    'preview_path' => 'event/{slug}',
    'permission' => 'events',
    'instructions' => 'Here you can manage the events for the site.',
    'archivable' => TRUE,
    'nav_selected' => 'events'
);

$config['modules']['locations'] = array(
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => '', // put in the advanced module name here
);
