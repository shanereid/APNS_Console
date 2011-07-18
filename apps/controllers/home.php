<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if(!$this->quickauth->logged_in())
			$this->login();
		else {
			$data = array();
			$data['sub_title'] = 'Dashboard';
			$data['current_page'] = 'Dashboard';
			$this->load->view('dashboard',$data);
		}
	}
	
	function login()
	{
		$data = array();
		$failure = $this->session->flashdata('login_failed');
		if(isset($_GET['next_url']))
			$data['next_url'] = trim($_GET['next_url']);
		if(is_int($failure))
			$data['fail_type'] = $failure;
		
		$this->load->view('login',$data);
	}
}

/* End of file start_page.php */
/* Location: ./apps/controllers/start_page.php */