<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Footer_Images_model extends Base_module_record {

	public function __construct()
	{
		parent::__construct('footer_images');
	}

	public function get_token($type = 'instagram');
	{
		return $this->access_tokens_model->get_token($type);
	}

	public function get_images()
	{	
		return array(1,2,3,4,5);
	}

	public function get_render()
	{
		return $this->get_images();
	}

}

?>