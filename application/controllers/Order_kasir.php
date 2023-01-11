<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_kasir extends CI_Controller {

	public function index()
	{
		$data['konten']="v_order";
		$this->load->model('Order_model');
		$data['data_order']=$this->Order_model->get_order();
		$this->load->model('User_model');
		$data['data_user']=$this->User_model->get_user();
		$this->load->model('Pelanggan_model');
		$data['data_pelanggan']=$this->Pelanggan_model->get_pelanggan();
		$this->load->view('template_kasir', $data, FALSE);
	}
	public function simpan_order()
	{
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required', array('required' => 'Tanggal harus diisi'));
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', array('required' => 'Keterangan harus diisi'));
		$this->form_validation->set_rules('status_order', 'status_order', 'trim|required', array('required' => 'Status Order harus diisi'));
		$this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required', array('required' => 'Id Pelanggan harus diisi'));
		$this->form_validation->set_rules('total_bayar', 'total_bayar', 'trim|required', array('required' => 'Total Bayar harus diisi'));

		if ($this->form_validation->run() == TRUE) 
		{
			$this->load->model('Order_model', 'del');
			$masuk=$this->del->masuk_db();
			if ($masuk==true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Order'),'refresh');
		}
		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Order'),'refresh');
		}
	}
	public function get_detail_order($id_order='')
	{
		$this->load->model('Order_model');
		$data_detail=$this->Order_model->detail_order($id_order);
		echo json_encode($data_detail);
	}
	public function update_order()
	{
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('status_order', 'status_order', 'trim|required');
		$this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required');
		$this->form_validation->set_rules('total_bayar', 'total_bayar', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Order','refresh'));
		} else{
			$this->load->model('Order_model');
			$proses_update=$this->Order_model->update_order();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			} else{
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Order'),'refresh');
		}
	}
	public function hapus_order($id_order)
	{
		$this->load->model('Order_model');
		$this->Order_model->hapus_order($id_order);
		redirect(base_url('index.php/Order'),'refresh');
	}
	public function tampil()
	{
		$this->load->model('Riwayat_model');
		$data['riwayat'] = $this->Riwayat_model->get_riwayat_order();
		$data['konten'] = 'Riwayat_view';
		
		$this->load->view('template_kasir', $data);
	}

}

/* End of file Order_kasir.php */
/* Location: ./application/controllers/Order_kasir.php */