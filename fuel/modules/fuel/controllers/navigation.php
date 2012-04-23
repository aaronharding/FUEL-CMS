<?php
require_once('module.php');

class Navigation extends Module {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function upload()
	{
		$this->load->library('form_builder');
		$this->load->module_model(FUEL_FOLDER, 'navigation_groups_model');
		$this->load->module_model(FUEL_FOLDER, 'navigation_model');
		
		$this->js_controller_params['method'] = 'upload';
		
		if (!empty($_POST))
		{
			$params = $this->input->post();
			
			if (!empty($_FILES['file']['name']))
			{
				$error = FALSE;
				$file_info = $_FILES['file'];
				$params['file_path'] = $file_info['tmp_name'];
				if (!$this->fuel->navigation->upload($params))
				{
					$error = TRUE;
				}

				if ($error)
				{
					add_error(lang('error_upload'));
				}
				else
				{
					// change list view page state to show the selected group id
					$this->session->set_flashdata('success', lang('navigation_success_upload'));
					redirect(fuel_url('navigation?group_id='.$params['group_id']));
				}
				
			}
			else
			{
				add_error(lang('error_upload'));
			}
		}
		
		$fields = array();
		$nav_groups = $this->navigation_groups_model->options_list('id', 'name', array('published' => 'yes'), 'id asc');
		if (empty($nav_groups)) $nav_groups = array('1' => 'main');
		
		$fields['group_id'] = array('type' => 'select', 'options' => $nav_groups, 'class' => 'add_edit navigation_group');
		$fields['file'] = array('type' => 'file', 'accept' => '');
		$fields['clear_first'] = array('type' => 'enum', 'options' => array('yes' => 'yes', 'no' => 'no'));
		$this->form_builder->set_fields($fields);
		$this->form_builder->submit_value = '';
		$this->form_builder->use_form_tag = FALSE;
		$vars['instructions'] = lang('navigation_import_instructions');
		$vars['form'] = $this->form_builder->render();
		$vars['back_action'] = ($this->fuel->admin->last_page() AND $this->fuel->admin->is_inline()) ? $this->fuel->admin->last_page() : fuel_uri($this->module_uri);

		$crumbs = array($this->module_uri => $this->module_name, lang('action_upload'));
		$this->fuel->admin->set_titlebar($crumbs);
		
		$this->fuel->admin->render('upload', $vars, Fuel_admin::DISPLAY_NO_ACTION);
	}	
	
	function parents($group_id = NULL, $parent_id = NULL, $id = NULL)
	{
		if (is_ajax() AND !empty($group_id))
		{
			$this->load->library('form');
			$where = array();
			if (!empty($group_id)) $where['group_id'] = $group_id;
			if (!empty($id)) $where['id !='] = $id;
			if (!empty($id)) $where['parent_id !='] = $id;
			
			$parent_options = $this->model->options_list('id', 'nav_key', $where);
			$select = $this->form->select('parent_id', $parent_options, $parent_id, '', 'None');
			$this->output->set_output($select);
		}
		else if ($parent_id != 0)
		{
			show_error(lang('error_missing_params'));
		}
	}
	
}