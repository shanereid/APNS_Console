<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->quickauth->logged_in())
			redirect('/');
	}

	function index()
	{
		$data = array();
		$data['sub_title'] = 'Messages';
		$data['current_page'] = 'Messages';
		$this->load->view('messages/home',$data);
	}
}

/* End of file messages.php */
/* Location: ./apps/controllers/messages.php */