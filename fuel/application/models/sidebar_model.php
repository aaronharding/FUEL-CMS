<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Sidebar_model extends Base_module_record {

	public function get_recent_posts()
	{
		$recent_posts = array();
		$recent_posts = $this->_CI->fuel->blog->get_recent_posts(3);
		return $recent_posts;
	}

	public function get_recent_comments()
	{
		$recent_comments = array();
		$recent_comments = $this->_CI->fuel->blog->get_recent_comments(3);
		foreach ($recent_comments as &$comment) {
			$comment->post_link_title = $comment->get_post()->link_title;
		}
		return $recent_comments;
	}

	// remove below line comment 
	public function get_upcoming_event($id = null)
	{
		// upcoming or current event
		$today = date("Y-m-d H:i:s");
		$event = fuel_model('events', array(
			'find' => 'one',
			// find all events with end date's in the future (as in they haven't ended yet)
			// and sort by start_date desc, so the event that started first will be shown
			// oh and keep sticky events always on top
			'order' => 'sticky, start_date desc',
			'where' => "end_date >= '{$today}'",
			'module' => 'events',
			'return_method' => 'object'
		));

		// return empty array if nothing was found
		// or if the upcoming event is on the same page as the event 
		if(empty($event) || ($id != null) || ($event->id != $id)):
			return array();
		else:
			return $event;
		endif;
	}

	public function get_meta()
	{
		$meta = array();
		return $meta;
	}

	public function get_sidebar($is_homepage = false, $event_id = null)
	{
		$sidebar = array();

		$sidebar['is_homepage'] = $is_homepage;
		$sidebar['recent_posts'] = $this->get_recent_posts();
		$sidebar['recent_comments'] = $this->get_recent_comments();
		$sidebar['meta'] = $this->get_meta();

		if(!$is_homepage) {
			$sidebar['upcoming_event'] = $this->get_upcoming_event($event_id);
		}

		return $sidebar;
	}

	public function __construct()
	{
		parent::__construct();
	}

}

?>