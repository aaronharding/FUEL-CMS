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

		$vars['upcoming_event'] = $upcoming_event;

		// misc
		$vars['is_homepage'] = true;

		$this->fuel->pages->render('home', $vars);
	}
}