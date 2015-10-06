<?php

class Locations extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index($slug = null) {
		
		$vars = array();

		var_dump($slug);

		$slug = uri_segment(2);

		var_dump($slug);
		die();

		if($slug):
			$vars['slug'] = $slug;
			$this->fuel->pages->render('location', $vars);
		else:
			$this->fuel->pages->render('locations', $vars);
		endif;
	}
}