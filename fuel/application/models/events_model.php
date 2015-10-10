<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Events_model extends Base_module_model {

	// read more about models in the user guide to get a list of all properties. Below is a subset of the most common:
	public $record_class = 'Event'; // the name of the record class (if it can't be determined)
	public $filters = array(); // filters to apply to when searching for items
	public $required = array('name');
	public $foreign_keys = array(); // map foreign keys to table models
	public $linked_fields = array(); // fields that are linked meaning one value helps to determine another. Key is the field, value is a function name to transform it. (e.g. array('slug' => 'title'), or array('slug' => arry('name' => 'strtolower')));
	public $boolean_fields = array(); // fields that are tinyint and should be treated as boolean
	public $unique_fields = array(); // fields that are not IDs but are unique. Can also be an array of arrays for compound keys
	public $parsed_fields = array('description', 'description_formatted', 'excerpt', 'excerpt_formatted');
	public $serialized_fields = array(); // fields that contain serialized data. This will automatically serialize before saving and unserialize data upon retrieving
	public $has_many = array(
		'speakers' => '../../modules/blog/models/blog_users_model'
	); // keys are model, which can be a key value pair with the key being the module and the value being the model, module (if not specified in model parameter), relationships_model, foreign_key, candidate_key
	public $belongs_to = array(
		'locations' => 'locations'
	); // keys are model, which can be a key value pair with the key being the module and the value being the model, module (if not specified in model parameter), relationships_model, foreign_key, candidate_key
	public $formatters = array(); // an array of helper formatter functions related to a specific field type (e.g. string, datetime, number), or name (e.g. title, content) that can augment field results
	public $display_unpublished_if_logged_in = FALSE;
	public $form_fields_class = ''; // a class that can extend Base_model_fields and manipulate the form_fields method
	protected $friendly_name = 'events'; // a friendlier name of the group of objects
	protected $singular_name = 'event'; // a friendly singular name of the object

	public function __construct()
	{
		parent::__construct('events'); // table name
	}

	public function list_items($limit = null, $offset = null, $col = 'name', $order = 'asc')
	{
		$this->db->select('id, name, SUBSTRING(description, 1, 50) AS description, start_date, end_date, date_added, last_updated, published', FALSE);
		$data = parent::list_items($limit, $offset, $col, $order);
		return $data;
	}
	
	public function on_before_clean($values)
	{
		$values = parent::on_before_clean($values);

		// auto update slug
		if (empty($values['slug']) && !empty($values['name']))
			$values['slug'] = url_title($values['name'], 'dash', TRUE);

		return $values;
	}
	
	public function form_fields($values = array(), $related = array())
	{
		$fields = parent::form_fields($values, $related);

		$fields['timetable']['type'] = 'textarea';

		$fields['slug']['comment'] = 'If no slug is provided, one will be provided for you';

		$fields['image']['comment'] = 'You can remove the image by emptying the text field and saving.';

		return $fields;
	}
	
	public function _common_query()
	{
		parent::_common_query();
		$this->db->order_by('start_date asc');
	}
	
}

class Event_model extends Base_module_record {

	public $timetable_formatted = array();
	public $speakers_formatted = array();
	public $locations_formatted = array();

	public $timetable_formatted_cache = array();
	public $speakers_formatted_cache = array();
	public $locations_formatted_cache = array();
	
	public function get_start_date_formatted($format = 'F')
	{
		return date($format, strtotime($this->start_date));
	}

	public function get_date_range()
	{
		return date_range_string($this->start_date, $this->end_date);
	}
	
	public function get_image_path()
	{
		return img_path($this->image);
	}

	public function get_url()
	{
		return "events/" . $this->slug;
	}

	function get_clickable_name($popover = true)
    {
    	if($popover == true)
    		return '<a data-popover="' . htmlspecialchars(json_encode($this->popover_data), ENT_QUOTES, 'UTF-8') .'" href="'.$this->get_url().'">'.$this->name.'</a>';
       	else
    		return "<a href=\"" . $this->get_url() . "\">{$this->name}</a>";
    }

	function get_popover_data()
	{
		return array(
			'name' => $this->name,
			'url' => $this->url,
			'image' => 'assets/images/' . $this->image,
			'text' => $this->get_date_range(),
			'data' => $this->popover_text
		);
	}

	function get_popover_text()
	{
		$data = array();

		$speakers = array( 'title' => 'with ' . implode(', ', $this->get_speakers_formatted(true, false)));
		$locations = array( 'title' => 'at ' . implode(', ', $this->get_locations_formatted(true, false)));

		array_push($data, $speakers);
		array_push($data, $locations);

		return $data;
	}

	// turn timetable raw text into nice parts
	public function get_timetable_formatted()
	{
		if(!empty($this->timetable_formatted_cache)) {
			return $this->timetable_formatted_cache;
		}

		// first split raw text newlines into an array
		$times = explode("\n", $this->timetable);
		foreach($times as $key => &$time) {

			// skip empty values, just in case
			if(empty($time) || trim($time) === "") {
				unset($times[$key]);
				continue;
			}

			// trim whitespace and explode string into another array from the comma ,
			$time = preg_split('/\s*,\s*/', trim($time), 2);  
		}

		$this->timetable_formatted_cache = $times;
		return $times;
	}

	// make nice authors
	public function get_speakers_formatted($with_url = false, $popover = true)
	{
		if(!empty($this->speakers_formatted_cache)) {
			return $this->speakers_formatted_cache;
		}

		$speakers = array();
		if(count($this->speakers) > 0) {
			foreach ($this->speakers as $speaker) {
				if($with_url) {
					array_push($speakers, $speaker->get_clickable_name($popover));
				} else {
					array_push($speakers, $speaker->name);
				}
			}
		}

		$this->speakers_formatted_cache = $speakers;
		return $speakers;
	}

	// make nice locations
	public function get_locations_formatted($with_url = false, $popover = true)
	{
		if(!empty($this->locations_formatted_cache)) {
			return $this->locations_formatted_cache;
		}

		$locations = array();
		if(count($this->locations) > 0) {
			foreach ($this->locations as $location) {
				if($with_url) {
					array_push($locations, $location->get_clickable_title($popover));
				} else {
					array_push($locations, $location->title);
				}
			}
		}

		$this->locations_formatted_cache = $locations;
		return $locations;
	}

	public function get_description_first_sentence($strict = false, $end = '.?!')
	{
		$description = $this->description;
		preg_match("/^[^{$end}]+[{$end}]/", $description, $result);
	    if (empty($result)) {
	        return ($strict ? false : $description);
	    }
	    return $result[0];
	}

}
?>