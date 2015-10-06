<?php

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$vars = array();

		// blog posts
		$frontpage_post_count = isset($frontpage_post_count) ? $frontpage_post_count : 7;
		$posts = fuel_model('blog_posts', array('find' => 'all', 'limit' => $frontpage_post_count, 'order' => 'sticky, date_added desc', 'module' => 'blog'));
		$vars['posts'] = $posts;

		// upcoming or current event
		$today = date("Y-m-d H:i:s");
		$upcoming_event = fuel_model('events', array(
			'find' => 'one',
			// find all events with end date's in the future (as in they haven't ended yet)
			// and sort by start_date desc, so the event that started first will be shown
			// oh and keep sticky events always on top
			'order' => 'sticky, start_date desc',
			'where' => "end_date >= '$today'",
			'module' => 'events'
		));
        
        $upcoming_event->timetable_formatted = $upcoming_event->get_timetable_formatted();
        $upcoming_event->speakers_formatted = $upcoming_event->get_speakers_formatted_with_url();
		
		$vars['upcoming_event'] = $upcoming_event;

		// let the header know that this is the homepage
		$vars['is_homepage'] = true;

		$this->fuel->pages->render('home', $vars);
	}
}