<?php

class Access_tokens extends CI_Controller {

	function __construct() {
		parent::__construct();
    	$this->load->model('access_tokens_model'); 
	}

	function index($name = null) { 
		$code = $this->input->get('code');
		$this->access_tokens_model->index($name, $code);
	}
}