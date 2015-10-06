<?php

class Events extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index($slug = null) {

		var_dump($slug);

		$vars = array();

		$slug = uri_segment(2);

		var_dump($slug);
		die('no event');

		if($slug):
			$vars['slug'] = $slug;
			$this->fuel->pages->render('event', $vars);
		else:
			$this->fuel->pages->render('events', $vars);
		endif;
	}
}