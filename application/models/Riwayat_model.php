<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_model extends CI_Model {

	public function get_riwayat_order()
	{
		return $this->db->select('*')
						->join('masakan','masakan.id_masakan = detail_order.id_masakan')
						->join('order','order.id_order = detail_order.id_order')
						->join('pelanggan', 'pelanggan.id_pelanggan = order.id_pelanggan')
						->get('detail_order')
						->result();
	}
	public function get_transaksi_by_id($id)
	{
		return $this->db->select('detail_order.no_meja, masakan.nama_masakan, masakan.harga, order.total_bayar')
						->join('masakan','masakan.id_masakan = detail_order.id_masakan')
						->join('order','order.id_order = detail_order.id_order')
						->where('id_detail_order', $id)
						->get('detail_order')
						->result();
	}
	public function cetak_nota()
	{
		$this->load->view('cetak_nota_view');
	}		

}

/* End of file Riwayat_model.php */
/* Location: ./application/models/Riwayat_model.php */