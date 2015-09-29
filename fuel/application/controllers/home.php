<?php

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$vars = array();

		// blog posts
		$frontpage_post_count = isset($frontpage_post_count) ? $frontpage_post_count : 3;
		$posts = array();//fuel_model('blog_posts', array('find' => 'all', 'limit' => $frontpage_post_count, 'order' => 'sticky, date_added desc', 'module' => 'blog'));
		$vars['posts'] = $posts;

		$this->fuel->pages->render('home', $vars);
	}
}