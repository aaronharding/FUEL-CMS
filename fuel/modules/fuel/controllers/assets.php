<?php
require_once('module.php');

class Assets extends Module {
	
	public $module = '';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function items($inline = FALSE)
	{
		$dirs = $this->fuel->assets->dirs();
		$this->filters['group_id']['options'] = $dirs;
		parent::items($inline);
	}

	function create($dir = NULL, $inline = FALSE)
	{
		$id = NULL;

		if ($inline)
		{
			$this->fuel->admin->set_inline(TRUE);
		}
		
		$inline = $this->fuel->admin->is_inline();

		if (!empty($dir))
		{
			$dir = uri_safe_decode($dir);
		}

		if (!empty($_POST))
		{
			if (!empty($_FILES['userfile___0']) AND $_FILES['userfile___0']['error'] != 4)
			{

				$this->model->on_before_post();

				if ($this->input->post('asset_folder')) 
				{
					$dir = $this->input->get_post('asset_folder');
					if (!in_array($dir, array_keys($this->fuel->assets->dirs()))) 
					{
						show_404();
					}
				}
				
				$subfolder = ($this->config->item('assets_allow_subfolder_creation', 'fuel')) ? str_replace('..'.DIRECTORY_SEPARATOR, '', $this->input->get_post('subfolder')) : ''; // remove any going down the folder structure for protections
				$upload_path = $this->config->item('assets_server_path').$this->fuel->assets->dir($dir).DIRECTORY_SEPARATOR.$subfolder; //assets_server_path is in assets config
				$posted['upload_path'] = $upload_path;
				$posted['overwrite'] = ($this->input->get_post('overwrite')) ? TRUE : FALSE;
				$posted['create_thumb'] = ($this->input->get_post('create_thumb')) ? TRUE : FALSE;
				$posted['resize_method'] = ($this->input->get_post('resize_method')) ? $this->input->get_post('resize_method') : 'maintain_ratio';
				$posted['resize_and_crop'] = $this->input->get_post('resize_and_crop');
				$posted['width'] = $this->input->get_post('width');
				$posted['height'] = $this->input->get_post('height');
				$posted['master_dim'] = $this->input->get_post('master_dim');
				$posted['file_name'] = $this->input->get_post('userfile_file_name');
				$posted['unzip'] = ($this->input->get_post('unzip')) ? TRUE : FALSE;
				
				$id = $posted['file_name'];
				
				if ($this->fuel->assets->upload($posted))
				{
					foreach($_FILES as $filename => $fileinfo)
					{
						$msg = lang('module_edited', $this->module_name, $fileinfo['name']);
						$this->fuel->logs->write($msg);
					}
					$flashdata = $_POST;
					$uploaded_data = $this->fuel->assets->uploaded_data();
					$first_file = current($uploaded_data);

					// set the uploaded file name to the first file
					$flashdata['uploaded_file_name'] = trim(str_replace(assets_server_path().$dir, '', $first_file['full_path']), '/');

					$this->session->set_flashdata('uploaded_post', $flashdata);
					$this->fuel->admin->set_notification(lang('data_saved'), Fuel_admin::NOTIFICATION_SUCCESS);
					
					$this->model->on_after_post($posted);

					$inline = $this->fuel->admin->is_inline();

					$query_str_arr = $this->input->get_post();
					$query_str = (!empty($query_str_arr)) ? http_build_query($query_str_arr) : '';

					if ($inline === TRUE)
					{
						$url = fuel_uri($this->module.'/inline_create/?'.$query_str, TRUE);
					}
					else
					{
						$url = fuel_uri($this->module.'/create/?'.$query_str, TRUE);
					}
					redirect($url);
					
				}
				else
				{
					add_errors($this->fuel->assets->errors());
				}
				
			}
			else
			{
				add_errors(lang('error_upload'));
			}
		}
		
		$form_vars = $this->input->get();
		if (!empty($dir))
		{
			$form_vars['asset_folder'] = $dir;
		}
		$form_vars['asset_folder'] = (!empty($form_vars['asset_folder'])) ? trim($form_vars['asset_folder'], '/') : '';
		$vars = $this->_form($form_vars, $inline);

		$list_view = ($inline) ? $this->module_uri.'/inline_items/' : $this->module_uri;
		$crumbs = array($list_view => $this->module_name, lang('assets_upload_action'));
		$this->fuel->admin->set_titlebar($crumbs);
		$this->fuel->admin->set_inline(($inline === TRUE));
		
		if ($inline === TRUE)
		{
			$this->fuel->admin->set_display_mode(Fuel_admin::DISPLAY_COMPACT_TITLEBAR);
		}
		else
		{
			$vars['actions'] = $this->load->module_view(FUEL_FOLDER, '_blocks/module_create_edit_actions', $vars, TRUE);
		}
		$this->fuel->admin->render($this->views['create_edit'], $vars);
		return $id;
		
		
	}
	
	function inline_create($field = NULL)
	{
		$this->create($field, TRUE);
	}
	
	function select($dir = NULL)
	{
		if (!is_numeric($dir))
		{
			$dir = fuel_uri_string(1, NULL, TRUE);
			$dirs = $this->fuel->assets->dirs();
			foreach($dirs as $key => $d)
			{
				if ($d == $dir)
				{
					$dir = $key;
					break;
				}
			}
		}

		$value = $this->input->get_post('selected');
		
		$this->js_controller_params['method'] = 'select';
		$this->js_controller_params['folder'] = $dir;
	
		$this->load->helper('array');
		$this->load->helper('form');
		$this->load->library('form_builder');
		$this->model->add_filters(array('group_id' => $dir));
		$options = options_list($this->model->list_items(), 'name', 'name');
		
		$preview = '<div id="asset_preview"></div>';
		$field_values['asset_folder']['value'] = $dir;
		$fields['asset_select'] = array('value' => $value, 'label' => lang('assets_select_action'), 'type' => 'select', 'options' => $options, 'after_html' => $preview, 'display_label' => FALSE);
		$this->form_builder->css_class = 'asset_select';
		$this->form_builder->submit_value = NULL;
		$this->form_builder->use_form_tag = FALSE;
		$this->form_builder->set_fields($fields);
		$this->form_builder->display_errors = FALSE;
		$this->form_builder->set_field_values($field_values);
		$vars['form'] = $this->form_builder->render();
		$this->fuel->admin->set_inline(TRUE);

		$crumbs = array('' => $this->module_name, lang('assets_select_action'));
		$this->fuel->admin->set_panel_display('notification', FALSE);
		$this->fuel->admin->set_titlebar($crumbs);
		$this->fuel->admin->render('modal_select', $vars);
	}
	
	// no editing of images... just creating/overwriting existing
	function edit($dir = NULL)
	{
		redirect(fuel_uri('assets/create/'.$dir));
	}
	
	// seperated to make it easier in subclasses to use the form without rendering the page
	function _form($field_values = NULL, $inline = FALSE)
	{
		$this->load->library('form_builder');
		$this->load->helper('convert');
		if (!empty($dir)) $dir = uri_safe_decode($dir);
		
		$model = $this->model;
		$this->js_controller_params['method'] = 'add_edit';
		
		$fields = $this->model->form_fields();
		$not_hidden = array();
		if (!empty($field_values['hide_options']) AND is_true_val($field_values['hide_options']))
		{
			$not_hidden = array('userfile');
		}
		else if (!empty($field_values['hide_image_options']) AND is_true_val($field_values['hide_image_options']))
		{
			$not_hidden = array('userfile', 'asset_folder', 'subfolder', 'userfile_file_name', 'overwrite');
		}
		
		// hide certain fields if params were passed
		if (!empty($not_hidden))
		{
			foreach($fields as $key => $field)
			{
				if (!in_array($key, $not_hidden))
				{
					$fields[$key]['type'] = 'hidden';
				}
			}
		}
		
		if ($this->session->flashdata('uploaded_post'))
		{
			$field_values = $this->session->flashdata('uploaded_post');
		}
		
		// load custom fields
		$this->form_builder->load_custom_fields(APPPATH.'config/custom_fields.php');

		$this->form_builder->submit_value = 'Save';
		$this->form_builder->use_form_tag = false;
		$this->form_builder->set_fields($fields);
		$this->form_builder->display_errors = false;
		$this->form_builder->set_field_values($field_values);
		$vars['form'] = $this->form_builder->render();
		
		// other variables
		$vars['id'] = NULL;
		$vars['data'] = array();
		$vars['action'] =  'create';
		$preview_key = preg_replace('#^(.*)\{(.+)\}(.*)$#', "\\2", $this->preview_path);
		if (!empty($vars['data'][$preview_key])) $this->preview_path = preg_replace('#^(.*)\{(.+)\}(.*)$#e', "'\\1'.\$vars['data']['\\2'].'\\3'", $this->preview_path);
		
		// active or publish fields
		//$vars['publish'] = (!empty($saved['published']) && ($saved['published'] == 'yes')) ? 'Unpublish' : 'Publish';
		$vars['module'] = $this->module;
		$vars['actions'] = $this->load->view('_blocks/module_create_edit_actions', $vars, TRUE);
		$vars['notifications'] = $this->load->view('_blocks/notifications', $vars, TRUE);
		
		if ($inline === TRUE)
		{
			$vars['form_action'] = $this->module_uri.'/inline_create/'.$vars['id'];
		}
		else
		{
			$vars['form_action'] = $this->module_uri.'/create/'.$vars['id'];
		}

		return $vars;
	}

	function view($id = null)
	{
		$url = $this->preview_path.'/'.$id;
		redirect($url);
	}
	

}