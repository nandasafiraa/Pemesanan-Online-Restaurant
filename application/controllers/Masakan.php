<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller {

	public function index()
	{
		$data['konten']="v_masakan";
		$this->load->model('Masakan_model');
		$data['arr']=$this->Masakan_model->get_masakan();
		$this->load->view('template',$data, FALSE);
	}
	public function simpan_masakan()
	{
		$this->form_validation->set_rules('nama_masakan', 'nama_masakan', 'trim|required', array('required' => 'Nama Masakan harus diisi'));
		$this->form_validation->set_rules('harga', 'harga', 'trim|required', array('required' => 'Harga harus diisi'));
		$this->form_validation->set_rules('status_masakan', 'status_masakan', 'trim|required', array('required' => 'Status Masakan harus diisi'));
		if ($this->form_validation->run() == TRUE) 
		{
			$this->load->model('Masakan_model', 'mas');
			$masuk=$this->mas->masuk_db();
			if ($masuk==true) 
			{
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Masakan'),'refresh');
		}
	}
	public function get_detail_masakan($id_masakan='')
	{
		$this->load->model('Masakan_model');
		$data_detail=$this->Masakan_model->detail_masakan($id_masakan);
		echo json_encode($data_detail);
	}
	public function update_masakan()
	{
		$this->form_validation->set_rules('nama_masakan', 'nama_masakan', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('status_masakan', 'status_masakan', 'trim|required');
		if ($this->form_validation->run() == FALSE ) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Masakan'),'refresh');
		} else {
			$this->load->model('Masakan_model');
			$proses_update=$this->Masakan_model->update_masakan();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Masakan'),'refresh');
		}
	}
	public function hapus_masakan($id_masakan)
	{
		$this->load->model('Masakan_model');
		$this->Masakan_model->hapus_masakan($id_masakan);
		redirect(base_url('index.php/Masakan'),'refresh');
	}

}

/* End of file Masakan.php */
/* Location: ./application/controllers/Masakan.php */