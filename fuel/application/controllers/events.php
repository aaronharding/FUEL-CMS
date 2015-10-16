<?php

class Events extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {

		$vars = array();

		// events
		$events = fuel_model('events', array(
			'find' => 'all',
			'module' => 'events'
		));
		$vars['events'] = $events;

		// sidebar stuff!
		$sidebar_model = $this->sidebar_model;
		$vars['sidebar'] = $sidebar_model->get_sidebar(false);

		return $this->fuel->pages->render('events', $vars);
	}

	function single($slug = null) {

		// quick check to make sure there is a slug, otherwise redirect to index
		if(!$slug):
			return $this->index();
		endif;

		$event = fuel_model('events', array(
			'find' => 'one',
			'where' => "slug = '{$slug}'",
			'module' => 'events'
		));

		if (empty($event)):
			return $this->index();
		endif;

		$vars = array();

		// get nice things for event
        $event->speakers_formatted = $event->get_speakers_formatted(true);
		$vars['event'] = $event;

		// sidebar stuff!
		$sidebar_model = $this->sidebar_model;
		$vars['sidebar'] = $sidebar_model->get_sidebar(false, $event->id);

		return $this->fuel->pages->render('event', $vars);
	}
}