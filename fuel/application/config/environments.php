<?php 
/*
|--------------------------------------------------------------------------
| Environments
|--------------------------------------------------------------------------
|
| This configuration file will automatically set the ENVIRONMENT constant
| based on the server address (e.g. $_SERVER['HTTP_HOST'])
|
|	$environments = array(
|				'development' => array('localhost*', '192.:*'),
|				'production' => array('mysite.com'),
|				);
*/

$environments = array(
				'development' => array('localhost*', '192.*', '*.dev'),
				'staging' => array('staging.aharding*', 'aharding.co.uk'),
				'production' => array('devisionarissen.nl')
				);