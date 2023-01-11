<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function get_order()
	{
		return $this->db->join('pelanggan','pelanggan.id_pelanggan=order.id_pelanggan')->get('order')->result();
	}
	public function masuk_db()
	{
		$data_order['tanggal']=$this->input->post('tanggal');
		$data_order['keterangan']=$this->input->post('keterangan');
		$data_order['status_order']=$this->input->post('status_order');
		$data_order['id_pelanggan']=$this->input->post('id_pelanggan');
		$data_order['total_bayar']=$this->input->post('total_bayar');
		$ql_masuk=$this->db->insert('Order', $data_order);
		return $ql_masuk;
	}
	public function detail_order($id_order='')
	{
		return $this->db->where('id_order', $id_order)->get('order')->row();
	}
	public function update_order()
	{
		$dt_up_order=array(
			'tanggal' => $this->input->post('tanggal'),
			'keterangan' => $this->input->post('keterangan'),
			'status_order' => $this->input->post('status_order'),
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'total_bayar' => $this->input->post('total_bayar'));
		return $this->db->where('id_order', $this->input->post('id_order'))->update('Order', $dt_up_order);
	}
	public function hapus_order($id_order)
	{
		$this->db->where('id_order', $id_order);
		return $this->db->delete('order');
	}
	

}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */