<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Access_tokens_model extends Base_module_record {

	public function __construct()
	{
		parent::__construct('access_tokens'); // table name
	}

	public $instagram = array(
		'url' => 'https://api.instagram.com/oauth/access_token',
		'client_id' => null,
		'client_secret' => null,
		'redirect_uri' => 'http://devisionarissen.dev/access_token/instagram'
	);

	public function get_token($name = 'instagram')
	{
		return $this->access_tokens_model->find_one(array(
			'name' => $name
		), '', 'array');
	}

	public function index($name = 'instagram', $code = null)
	{
		// fast forward if no data was met
		if($code === null) {
			header("Location: https://instagram.com/oauth/authorize/?client_id={$this->$name['client_id']}&redirect_uri=http://devisionarissen.dev/access_token/{$name}");
			die();
		}

		$access_token = null;

		// switch for access token names
		if($name == 'instagram') {
			// build up url to swap $code for an access token
			$params = $this->$name;
			$params['grant_type'] = 'authorization_code';
			$params['code'] = $code;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $params['url']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			$data = curl_exec($ch);
			curl_close($ch);

			$json = json_decode($data, true);
			die($data);
			$access_token = isset($json['access_token']) ? $json['access_token'] : null;
		}

		if($access_token) {
			$this->access_tokens_model->update(array(
				'access_token' => $access_token
			), array(
				'name' => $name
			));
		}
	}

}

?>