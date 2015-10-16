<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Footer_Images_model extends Base_module_model {

	public $url = "https://api.instagram.com/v1/users/2208964526/media/recent?access_token=";

	public function __construct()
	{
		parent::__construct('footer_images');
	}

	public function get_token($type = 'instagram')
	{
		return $this->access_tokens_model->get_token($type);
	}

	public function get_images()
	{	
		$data = file_get_contents($this->url . $this->get_token('instagram'));
		$json = json_decode($data);
		return $json;
	}

	public function get_render()
	{
		return $this->get_images();
	}

}

?>