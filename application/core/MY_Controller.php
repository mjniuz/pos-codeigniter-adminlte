<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('session');
		// Check Session Login
		$this->is_login = false;
		if(isset($_SESSION['logged_in'])){
			$this->is_login = true;
			$dump = $this->auth_model->dump_profile($this->session->id);
			$this->user_photo = $dump[0]['photo_profile'];
			$this->username = $dump[0]['username'];
		}		
		
		$this->page_limit = 10;
	}
	public function index()
	{
		$this->load->view('latihan');
	}
}
