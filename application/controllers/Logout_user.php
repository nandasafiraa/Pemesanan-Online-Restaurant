<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_user extends CI_Controller {

	public function index()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/Login_user'),'refresh');	
	}

}

/* End of file Logout_user.php */
/* Location: ./application/controllers/Logout_user.php */