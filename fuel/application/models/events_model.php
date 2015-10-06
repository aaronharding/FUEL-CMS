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

	// turn timetable raw text into nice parts
	public function get_timetable_formatted()
	{
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
		return $times;
	}

	// make nice authors with clickable url
	public function get_speakers_formatted_with_url()
	{
		$speakers = array();
		if(count($this->speakers) > 0) {
			foreach ($this->speakers as $speaker) {
				array_push($speakers, $speaker->get_clickable_name());
			}
		}
		return $speakers;
	}

	// make nice authors
	public function get_speakers_formatted()
	{
		$speakers = array();
		if(count($this->speakers) > 0) {
			foreach ($this->speakers as $speaker) {
				array_push($speakers, $speaker->name);
			}
		}
		return $speakers;
	}

}
?>