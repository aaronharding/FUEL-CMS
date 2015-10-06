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

		// upcoming event
		$today = date("Y-m-d H:i:s");
		$upcoming_event = fuel_model('events', array(
			'find' => 'one',
			'order' => 'sticky, start_date desc',
			'where' => "start_date >= '$today'",
			'module' => 'events'
		));

		// turn timetable raw text into nice parts
		// first split raw text newlines into an array
		$times = explode("\n", $upcoming_event->timetable);
		foreach($times as $key => &$time) {
			// skip empty values, just in case
			if(empty($time) || trim($time) === "") {
				unset($times[$key]);
				continue;
			}
			// trim whitespace and explode string into another array from the comma ,
			$time = preg_split('/\s*,\s*/', trim($time), 2);  
		}
		$upcoming_event->timetable_formatted = $times;

		// make nice authors
		if(count($upcoming_event->speakers) > 0) {
			$speakers = array();
			foreach ($upcoming_event->speakers as $speaker) {
				array_push($speakers, $speaker->get_clickable_name());
			}
			$upcoming_event->speakers_formatted = $speakers;
		}

		$vars['upcoming_event'] = $upcoming_event;

		// misc
		$vars['is_homepage'] = true;

		$this->fuel->pages->render('home', $vars);
	}
}