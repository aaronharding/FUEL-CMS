<?php
/*
|---------------------------------------------------------------------------------------------------
| IMPORTANT: for a complete list of fuel configurations, go to the modules/fuel/config/fuel.php file
|---------------------------------------------------------------------------------------------------
*/

// path to the fuel admin from the web base directory... MUST HAVE TRAILING SLASH!
$config['fuel_path'] = 'fuel/';

// the name to be displayed on the top left of the admin
$config['site_name'] = 'My Website';

// options are cms, views, and auto. 
// cms pulls views and variables from the database,
// views mode pulls views from the views folder and variables from the _variables folder,
// and the auto option will first check the database for a page and if it doesn't exist or is 
// not published, it will then check for the corresponding view file.
$config['fuel_mode'] = 'auto';

// used for system emails
$config['domain'] = '';

// shows an alert in the admin backend if this is the admin password
$config['default_pwd'] = 'admin';

// specifies which modules are allowed to be used in the fuel admin
$config['modules_allowed'] = array(
	'user_guide',
	'search',
	'blog',
	'backup',
	'page_analysis',
	'google_keywords',
	'validate',
	'tester',
	'cronjobs'
	);

// whether the admin backend is enabled or not
$config['admin_enabled'] = TRUE;

// maximum number of paramters that can be passed to the page. Used to cut down on queries to the db.
// If it is an array, then it will loop through the array using the keys to match against a regular expression:
// $config['max_page_params'] = array('about/news/' => 1);
$config['max_page_params'] = 0;

// will auto search view files. 
// If the URI is about/history and the about/history view 
// does not exist but about does, it will render the about page
$config['auto_search_views'] = FALSE;

// max upload files size for assets
$config['assets_upload_max_size']	= 5000;

// max width for asset images beign uploaded
$config['assets_upload_max_width']  = 1024;

// max height for asset images beign uploaded
$config['assets_upload_max_height']  = 768;

$config['assets_excluded_dirs'] = array(
	'js',
	'css',
	'cache', 
	'swf', 
	);

// text editor settings  (options are markitup or ckeditor)
// markitup: allows you to visualize the code in its raw format - not wysiwyg (http://markitup.jaysalvat.com/)
// ckeditor: suitable for clients; shows what the output will look like in the page (http://ckeditor.com/)
$config['text_editor'] = 'markitup';

// ck editor specific settings... if you use a PHP array, it will use json_encode
$config['ck_editor_settings'] = "{
	toolbar:[
			['Bold','Italic','Strike'],
			['Format'],
			['Image','HorizontalRule'],
			['NumberedList','BulletedList'],
			['Link','Unlink'],
			['Undo','Redo','RemoveFormat'],
			['Preview'],
			['Maximize']
		],
	contentsCss: '".WEB_PATH."assets/css/main.css',
	htmlEncodeOutput: false,
	entities: false,
	bodyClass: 'ckeditor',
	toolbarCanCollapse: false,
	protectedSource: [/\{[\s\S]*?\}/gi, /<\?[\s\S]*?\?>/g]
	}";


/* End of file MY_fuel.php */
/* Location: ./application/config/MY_fuel.php */