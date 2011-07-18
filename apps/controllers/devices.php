<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Devices extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->quickauth->logged_in())
			redirect('/');
		$this->load->model('device_model','m');
	}

	function index()
	{
		$devices = $this->m->get();
		$data = array();
		$counts = array('active'=>0,'uninstalled'=>0,'total'=>count($devices));
		foreach($devices as $device) {
			$counts[$device->status]++;
		}
		
		$data['sub_title'] = 'Devices';
		$data['current_page'] = 'Devices';
		$data['devices'] = $devices;
		$data['counts'] = $counts;
		$this->load->view('devices/home',$data);
	}
	
	function bulk_actions()
	{
		if(empty($_POST) || empty($_POST['devices']))
			redirect('/devices');
		
		$devices = explode('|',$_POST['devices']);
		
		switch($_POST['action']) {
			case 'Delete':
				$this->m->mass_delete($devices);
				break;
			case 'Activate':
				$this->m->mass_update($devices,array('status'=>'active'));
				break;
			case 'Deactivate':
				$this->m->mass_update($devices,array('status'=>'uninstalled'));
				break;
		}
		
		redirect('/devices');
	}
}

/* End of file devices.php */
/* Location: ./apps/controllers/devices.php */