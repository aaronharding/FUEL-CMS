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

$config['modules']['locations'] = array(
    'module_name' => 'Locations',
    'module_uri' => 'locations',
    'model_name' => 'locations_model',
    'model_location' => '',
    'display_field' => 'title',
    'preview_path' => 'locations/{slug}',
    'permission' => 'locations',
    'instructions' => 'Here you can manage the locations for your site.',
    'archivable' => TRUE,
    'nav_selected' => 'locations'
);

$config['modules']['events'] = array(
    'module_name' => 'Events',
    'module_uri' => 'events',
    'model_name' => 'events_model',
    'model_location' => '',
    'display_field' => 'name',
    'preview_path' => 'events/{slug}',
    'permission' => 'events',
    'instructions' => 'Here you can manage the events for your site.<br>New locations and speakers are created in their respective sections before being assigned to the event.',
    'archivable' => TRUE,
    'nav_selected' => 'events'
);

$config['modules']['access_tokens'] = array(
    'module_name' => 'Access Tokens',
    'module_uri' => 'access_tokens',
    'model_name' => 'access_tokens_model',
    'model_location' => '',
    'display_field' => 'name',
    'preview_path' => '',
    'permission' => 'access_tokens',
    'instructions' => 'Here you can manage the examples for your site.',
    'archivable' => TRUE,
    'nav_selected' => 'access_tokens'
);
