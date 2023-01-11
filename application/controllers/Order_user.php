<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_user extends CI_Controller {

	public function index()
	{
		$data['konten']="v_order_user";
		$this->load->model('Order_model');
		$data['data_order']=$this->Order_model->get_order();
		$this->load->model('User_model');
		$data['data_user']=$this->User_model->get_user();
		$this->load->model('Pelanggan_model');
		$data['data_pelanggan']=$this->Pelanggan_model->get_pelanggan();
		$this->load->view('template_user', $data, FALSE);
	}

}

/* End of file Order_user.php */
/* Location: ./application/controllers/Order_user.php */