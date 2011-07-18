<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index() 
	{
	
	}
	
	function login()
	{
		if(isset($_POST['user']) && isset($_POST['pass']) && strlen($_POST['user']) > 0 && strlen($_POST['pass']) > 0)
		{
			$ret = $this->quickauth->login($_POST['user'], $_POST['pass']);
			if($ret !== true)
				$this->session->set_flashdata('login_failed',$ret);
					
		} else {
			$this->session->set_flashdata('login_failed',0);
		}
		if(isset($_GET['next_url']) && strlen($_GET['next_url']) > 0)
			redirect(trim($_GET['next_url']));
		else
			redirect('/');
	}
	
	function logout()
	{
		$this->quickauth->logout();
		redirect('/');
	}
	
	function register()
	{
		if(empty($_POST) && !empty($_GET))
			$_POST = $_GET;
		if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['fname']) && isset($_POST['lname']))
		{
			echo 'You Tried!';
			$userdata = array(
				'username' => $_POST['user'],
			    'password' => $_POST['pass'],
			    'first_name' => $_POST['fname'],
			    'last_name' => $_POST['lname']
			);
			$var = $this->quickauth->register($userdata);
			if($var > 0) {
				$this->login();
			}
		}
	}
	
	function jsonregister()
	{
		$response = array('status' => 'success');
		if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['fname']) && isset($_POST['lname']))
		{
			$userdata = array(
				'username' => $_POST['user'],
			    'password' => $_POST['pass'],
			    'firstname' => $_POST['fname'],
			    'lastname' => $_POST['lname']
			);
			$var = $this->quickauth->register($userdata);
			if($var < 1)
			{
				$response['status'] = 'failed';
				$response['message'] = 'Registration process failed.';
				if($var == -1)
					$response['message'] = 'Username already taken!';
			}
		} else {
			$response['status'] = 'failed';
			$response['message'] = 'Not enough fields supplied for registration';
		}
		echo json_encode($response);
		return;
	}
	
	function jsonlogin()
	{
		$response = array('status' => 'success');
		if(isset($_POST['user']) && isset($_POST['pass']))
		{
			if($this->quickauth->login($_POST['user'], $_POST['pass'])) 
				$response['extra_data'] = $this->quickauth->user();
			else {
				$response['status'] = 'failed';
				$response['message'] = 'Invalid login credentials';
			}
			
		} else {
			$response['status'] = 'failed';
			$response['message'] = 'Please provide both an email and a password';
		}
		echo json_encode($response);
		return;
	}
	
	function jsonlogout()
	{
		$response = array('status' => 'success');
		$this->quickauth->logout();
		echo json_encode($response);
		return;
	}
	
	function jsoncheck()
	{
		$response = array('status' => 'success', 'login_status'=>true);
		if($this->quickauth->logged_in()) {
			$response['extra_data'] = $this->quickauth->user();
		} else {
			$response['login_status'] = false;
		}
		echo json_encode($response);
		return;
	}
	
}