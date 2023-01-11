<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function index()
	{
		$data['konten']="v_pelanggan";
		$this->load->model('Pelanggan_model');
		$data['data_pelanggan']=$this->Pelanggan_model->get_pelanggan();
		$this->load->view('template', $data, FALSE);
	}
	public function simpan_pelanggan()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required', array('required' => 'Nama harus diisi'));
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required', array('required' => 'Alamat harus diisi'));
		$this->form_validation->set_rules('telp', 'telp', 'trim|required', array('required' => 'Telepon harus diisi'));
		$this->form_validation->set_rules('username', 'username', 'trim|required', array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'password', 'trim|required', array('required' => 'Password harus diisi'));
		if ($this->form_validation->run() == TRUE ) 
		{
			$this->load->model('Pelanggan_model', 'pela');
			$masuk=$this->pela->masuk_db();
			if ($masuk==true) {
					$this->session->set_flashdata('pesan', 'sukses masuk');
				} else{
					$this->session->set_flashdata('pesan', 'gagal masuk');
				}
				redirect(base_url('index.php/Pelanggan'),'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Pelanggan'),'refresh');
		}
	}
	public function get_detail_pelanggan($id_pelanggan='')
	{
		$this->load->model('Pelanggan_model');
		$data_detail=$this->Pelanggan_model->detail_pelanggan($id_pelanggan);
		echo json_encode($data_detail);
	}
	public function update_pelanggan()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'telp', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Pelanggan'),'refresh');
		} else {
			$this->load->model('Pelanggan_model');
			$proses_update=$this->Pelanggan_model->update_pelanggan();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Pelanggan'),'refresh');
		}
	}
	public function hapus_pelanggan($id_pelanggan)
	{
		$this->load->model('Pelanggan_model');
		$this->Pelanggan_model->hapus_pelanggan($id_pelanggan);
		redirect(base_url('index.php/Pelanggan'),'refresh');
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */