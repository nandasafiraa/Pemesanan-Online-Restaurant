<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function get_pelanggan()
	{
		$data_pelanggan=$this->db->get('Pelanggan')->result();
		return $data_pelanggan;
	}	
	public function masuk_db()
	{
		$data_pelanggan=array(
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telp'=>$this->input->post('telp'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'));
		$ql_masuk=$this->db->insert('Pelanggan', $data_pelanggan);
		return $ql_masuk;
	}
	public function detail_pelanggan($id_pelanggan='')
	{
		return $this->db->where('id_pelanggan', $id_pelanggan)->get('Pelanggan')->row();
	}
	public function update_pelanggan()
	{
		$dt_up_pelanggan=array(
			'nama' =>$this->input->post('nama'),
			'alamat' =>$this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'username' =>$this->input->post('username'),
			'password' =>$this->input->post('password'));
		return $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))->update('Pelanggan',$dt_up_pelanggan);
	}
	public function hapus_pelanggan($id_pelanggan)
	{
		$this->db->where('id_pelanggan', $id_pelanggan);
		return $this->db->delete('Pelanggan');
	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */