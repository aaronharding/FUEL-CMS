<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(FUEL_PATH.'models/base_module_model.php');
 
class Access_Tokens_model extends Base_module_model {

	// settings
	public $instagram = array(
		'url' => 'https://api.instagram.com/oauth/access_token',
		'user_id' => '2208964526',
		'client_id' => 'a05d9f724f964b42a6da2b974f5367c4',
		'client_secret' => 'ee1358c6509449e398a459460f24aa9f',
		'redirect_uri' => 'http://devisionarissen.dev/access_tokens/authed/instagram'
	);
 
 	// construct
    function __construct()
    {
        parent::__construct('access_tokens');
    }

	function list_items($limit = NULL, $offset = NULL, $col = 'name', $order = 'asc', $just_count = FALSE)
	{
		// do not show access token in list
		$this->db->select('id, name, user_id', FALSE);
        $data = parent::list_items($limit, $offset, $col, $order, $just_count);
        return $data;
	}

	function form_fields($values = array(), $related = array())
	{
		// do not show access token in form
		$fields = parent::form_fields($values, $related);
		unset($fields['access_token']);
		return $fields;
	}

    // short hand to get a token
	public function get_token($name = 'instagram')
	{
		if(isset($this->$name)) {
			$params = $this->$name;
		} else {
			die('Nope');
		}

		$record = $this->access_tokens_model->find_one(array(
			'name' => $name,
			'user_id' => $params['user_id']
		));
		return $record->access_token;
	}

	public function index($name = 'instagram', $code = null)
	{
		if(isset($this->$name)) {
			$params = $this->$name;
		} else {
			die('Nope');
		}

		// try and get code from get variable
		// (usually sent along by instagram, etc.)
		if(!$code) {
			$code = $this->input->get('code');
		}

		// fast forward if no data was met
		if(!$code) {
			header("Location: https://instagram.com/oauth/authorize/?client_id={$params['client_id']}&redirect_uri={$params['redirect_uri']}&response_type=code");
			die();
		}

		$access_token = null;

		// switch for access token names
		if($name == 'instagram') {
			// build up url
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
			$access_token = isset($json['access_token']) ? $json['access_token'] : null;
		}
		// else if ($name == 'facebook') {
			// ...
		// }

		// and update
		if($access_token) {
			echo "Got access token. Adding in for $name and {$params['user_id']}.";
			$record = $this->access_tokens_model->find_one(array(
				'name' => $name,
				'user_id' => $params['user_id']
			));
			$record->access_token = $access_token;
			$record->save();
		}
	}
}
 
class Access_Token_model extends Base_module_record {

}