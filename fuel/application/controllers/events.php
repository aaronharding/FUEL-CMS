<?php

class Events extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {

		$vars = array();
		$this->fuel->pages->render('events', $vars);
	}

	function single($slug = null) {

		// quick check to map sure there is a slug, otherwise redirect to index
		if(!$slug):
			return $this->index();
		endif;

		$event = fuel_model('events', array(
			'find' => 'one',
			'where' => "slug = '{$slug}'",
			'module' => 'events'
		));

		if (empty($event)) :
			return $this->index();
		endif;

		// get nice things
        $event->timetable_formatted = $event->get_timetable_formatted();
        $event->speakers_formatted = $event->get_speakers_formatted_with_url();

		$vars = array();
		$vars['event'] = $event;

		$this->fuel->pages->render('event', $vars);
	}
}