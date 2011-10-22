<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_backup_test extends Tester_base {
	
	public $init = array();
	
	public function __construct()
	{
		parent::__construct();
		
		// load needed helpers
		$this->CI->load->helper('convert');
		$this->fuel =& $this->CI->fuel;
	}

	public function test_backup()
	{
		$params = array(
						'download' => FALSE,
						'file_prefix' => 'test',
						'file_date_format' => 'm-d-Y',
						'zip' => TRUE,
						'include_assets' => FALSE,
						);
		$this->fuel->backup->database($params);
		$backup_data = $this->fuel->backup->backup_data();
		
		// check that file exists
		$test = (file_exists($backup_data['full_path']) AND !$this->fuel->backup->has_errors());
		$expected = TRUE;
		$this->run($test, $expected, 'Test that zip was stored in proper directory: '.$backup_data['full_path']);

		// check that the file name is correct
		$test = $backup_data['filename'];
		$expected = 'test_'.date('m-d-Y').'.sql.zip';
		$this->run($test, $expected, 'Test that name of the zipped file is correct: '.$backup_data['filename']);
		
		// check for assets by comparing file size
		$orig_file_info = get_file_info($backup_data['full_path']);
		$params['include_assets'] = TRUE;
		$this->fuel->backup->do_backup($params);
		$backup_data2 = $this->fuel->backup->backup_data();
		
		$new_file_info = get_file_info($backup_data2['full_path']);
		$test = $new_file_info['size'] > $orig_file_info['size'];
		$expected = TRUE;
		$this->run($test, $expected, 'Test that assets are included in zip by comparing file size: '.$orig_file_info['size'].' > '.$new_file_info['size']);
		
		// check AUTO file name
		$params['file_prefix'] = 'AUTO';
		$orig_sitename = $this->fuel->config('site_name');
		$this->fuel->set_config('site_name', 'My Website Test'); // set the name of the site which is used when auto creating the name
		$this->fuel->backup->do_backup($params);
		$backup_data3 = $this->fuel->backup->backup_data();
		
		$test = $backup_data3['filename'];
		$expected = 'my_website_test_'.date('m-d-Y').'.sql.zip';
		$this->run($test, $expected, 'Test that name of the zipped file is correct after set to AUTO: '.$backup_data3['filename']);
		
		// check for just assets upload file name
		$params['include_assets'] = TRUE;
		$this->fuel->backup->assets($params);
		$backup_data4 = $this->fuel->backup->backup_data();
		
		$test = $backup_data4['filename'];
		$expected = 'my_website_test_'.date('m-d-Y').'.zip';
		$this->run($test, $expected, 'Test that backup of just the assets: '.$backup_data3['filename']);
		
		// check that just the assets were included by comparing file size
		$params['include_assets'] = TRUE;
		$this->fuel->backup->do_backup($params);
		$backup_data5 = $this->fuel->backup->backup_data();
		
		$new_file_info2 = get_file_info($backup_data5['full_path']);
		$test = $new_file_info2['size'] > $orig_file_info['size'];
		$expected = TRUE;
		$this->run($test, $expected, 'Test that assets are included in zip by comparing file size: '.$new_file_info2['size'].' > '.$orig_file_info['size']);
		
		// check data without zipping
		$params['include_assets'] = FALSE;
		$params['zip'] = FALSE;
		$this->fuel->backup->do_backup($params);
		$backup_data6 = $this->fuel->backup->backup_data();
		
		$test = $backup_data6['filename'];
		$expected = 'my_website_test_'.date('m-d-Y').'.sql';
		$this->run($test, $expected, 'Test that file is not zipped: '.$backup_data6['filename']);
	
		
		// set sitename back to prevent UI issues
		$this->fuel->set_config('site_name', $orig_sitename); // set the name of the site which is used when auto creating the name
		
		// test removing backups
		$this->fuel->backup->remove($backup_data6['filename']);
		$this->fuel->backup->remove($backup_data5['filename']);
		$this->fuel->backup->remove($backup_data4['filename']);
		$this->fuel->backup->remove($backup_data3['filename']);
		$this->fuel->backup->remove($backup_data2['filename']);
		$this->fuel->backup->remove($backup_data['filename']);
		
		$test = file_exists($backup_data6['full_path']) AND 
				file_exists($backup_data5['full_path']) AND 
				file_exists($backup_data4['full_path']) AND 
				file_exists($backup_data3['full_path']) AND 
				file_exists($backup_data2['full_path'])  
				;
		$expected = FALSE;
		$this->run($test, $expected, 'Test removing of backup files: '.$backup_data3['filename'].' and '.$backup_data2['filename']);
		
		
	}

}
