<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login');
	}

	// public function proses_login()
	// {
	// 	if ($this->input->post('login')) {
	// 	$this->form_validation->set_rules('username','username', 'trim|required');
	// 	$this->form_validation->set_rules('password','password', 'trim|required');

	// 	if ($this->form_validation->run() == TRUE) {
	// 		$this->load->model('Login_model');
	// 		if ($this->Login_model->get_login()->num_rows()>0) {
	// 			$# code...
	// 		}
	// 	}
	// 	}
	// }
	public function proses_login()
	{
		if ($this->input->post('login')) {
			$this->form_validation->set_rules('username','username', 'trim|required');
			$this->form_validation->set_rules('password','password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flasdata('pesan',validation_erros());
			redirect(base_url('index.php/Login'));
		} else
		{
			$this->load->model('Login_model');
			$cek_login=$this->Login_model->get_login();
			if ($cek_login->num_rows()>0) {
				$data_login=$cek_login->row();
				$array = array(
					'id_user' => $data_login->id_user,
					'username' => $data_login->username,
					'password' => $data_login->password,
					'level' => $data_login->level,
					'Login' => TRUE);
				$this->session->set_userdata($array);
				redirect('Dashboard','refresh');
			} else {
				$this->session->set_flashdata('pesan','username dan password tidak cocok');
				redirect(base_url('index.php/Login'));
			}
		}
	}
		}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */