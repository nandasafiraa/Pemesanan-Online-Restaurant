<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_masakan_model extends CI_Model {

	public function get_masakan()
	{
		return $this->db->get('masakan')->result();
	}
	public function cari_get_masakan($nama_masakan)
	{
		return $this->db->like('nama_masakan', $nama_masakan)->get('masakan')->result();
	}
	public function get_detail($id_masakan)
	{
		return $this->db
		->where('id_masakan', $id_masakan)
		->get('masakan')->row();
	}
	public function buat_nota()
	{
		$data = array('id_pelanggan' => $this->session->userdata('id_pelanggan'),
						'tanggal' => date('Y-m-d')
						 );
		return $this->db->insert('order', $data);
	}
	public function get_last_nota()
	{
		return $this->db
			->where('id_pelanggan',$this->session->userdata('id_pelanggan'))
			->order_by('id_order', 'desc')
			->limit('1')
			->get('order')->row();
	}
	public function update_total($id_order)
	{
		$data_update=array(
			'total_bayar'=>$this->cart->total()
		);
		return $this->db->where('id_order', $id_order)->update('order', $data_update);
	}

}

/* End of file Get_masakan_model.php */
/* Location: ./application/models/Get_masakan_model.php */