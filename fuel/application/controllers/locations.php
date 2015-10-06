<?php

class Locations extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {

		$vars = array();
		$this->fuel->pages->render('locations', $vars);
	}

	function single($slug = null) {

		// quick check to map sure there is a slug, otherwise redirect to index
		if(!$slug):
			return $this->index();
		endif;

		$location = fuel_model('locations', array(
			'find' => 'one',
			'where' => "slug = '{$slug}'",
			'module' => 'locations'
		));

		if (empty($location)) :
			return $this->index();
		endif;

		$vars = array();
		$vars['location'] = $location;

		$this->fuel->pages->render('location', $vars);
	}
}