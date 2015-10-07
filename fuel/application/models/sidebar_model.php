<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Sidebar_model extends Base_module_record {

	public function get_recent_posts()
	{
		$recent_posts = array("Lorem ipsum dolor sit amet, consectetur adipisicing elit.", "Error, magni nostrum voluptate dolorem.", "Accusantium provident saepe tempora repellat totam veritatis corporis unde quae doloremque, eius quasi dolorem quos, impedit eligendi!");
		return $recent_posts;
	}

	public function get_recent_comments()
	{
		$recent_comments = array(
			"Joe on A Phenomenological Reading of Miscarriage",
			"Bill on Manifest in Behaviour",
			"Dave on Cartesian Conceptions? Sellars (and Husserl) on Perceptual Consciousn…"
		);
		return $recent_comments;
	}

	// remove below line comment 
	public function get_upcoming_event($id = 0)//null)
	{
		// upcoming or current event
		$today = date("Y-m-d H:i:s");
		$event = fuel_model('events', array(
			'find' => 'one',
			// find all events with end date's in the future (as in they haven't ended yet)
			// and sort by start_date desc, so the event that started first will be shown
			// oh and keep sticky events always on top
			'order' => 'sticky, start_date desc',
			'where' => "end_date >= '$today'",
			'module' => 'events',
			'return_method' => 'object'
		));

		// return empty array if nothing was found
		// or if the upcoming event is on the same page as the event 
		if(empty($event) || $id !== null && $event->id != $id):
			return array();
		else:
			return $event;
		endif;
	}

}

?>