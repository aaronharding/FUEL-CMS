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
        $event->timetable_formatted = $event->timetable_formatted;
        $event->speakers_formatted = $event->get_speakers_formatted(true);
		$vars['event'] = $event;

		// sidebar stuff!
		$sidebar_model = $this->sidebar_model;
		$vars['sidebar'] = array();
		$vars['sidebar']['recent_posts'] = $sidebar_model->recent_posts;
		$vars['sidebar']['recent_comments'] = $sidebar_model->recent_comments;
		$vars['sidebar']['upcoming_event'] = $sidebar_model->get_upcoming_event($event->id);

		$this->fuel->pages->render('event', $vars);
	}
}