<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function index()
	{
		$data['konten']="v_pesanan";
		$this->load->view('template_user', $data);		
	}
	public function tambah_cart($id_masakan, $jumlah, $meja)
	{
		$this->load->model('get_masakan_model','gt_msk');
		$dt_detail=$this->gt_msk->get_detail($id_masakan);

		$data=array(
			'id' => $dt_detail->id_masakan,
			'qty' =>$jumlah,
			'meja' =>$meja,
			'price' =>$dt_detail->harga,
			'name' =>$dt_detail->nama_masakan,
		);

		$tambah_cart=$this->cart->insert($data);
		if ($tambah_cart) {
			$dt['total_cart']=$this->cart->total_items();
			$dt['status']=1;
			echo json_encode($dt);
		}
		else{
			$dt['total_cart']=$this->cart->total_items();
			$dt['status']=0;
			echo json_encode($dt);
		}
	}
	public function show_cart_items()
	{
		$dt['total_cart']=$this->cart->total_items();
		echo json_encode($dt);
	}
	public function tm_pesanan()
	{
		$data['total_seluruh']=$this->cart->total();
		$data['data_cart']=$this->cart->contents();
		echo json_encode($data);
	}
	public function simpan_bayar()
	{
		$this->load->model('get_masakan_model', 'gt_msk');
		$buat_nota=$this->gt_msk->buat_nota();
		if ($buat_nota) 
		{
			$dt_nota=$this->gt_msk->get_last_nota();
			foreach ($this->cart->contents() as $item) {
				$object[]= array(
				'id_order' =>$dt_nota->id_order,
				'id_masakan'=>$item['id'],
				'jumlah'=>$item['qty'],
				'no_meja'=>$item['meja']
			);
		$masuk_data=$this->db->insert_batch('detail_order', $object);
		if ($masuk_data) {
			$this->gt_msk->update_total($dt_nota->id_order);
			$data['status']=1;
			$data['id_order']=$dt_nota->id_order;
			$data['total']=$this->cart->total();
			$this->cart->destroy();
			echo json_encode($data);
		}else {
			$data['status']=0;
			echo json_encode($data);
		}
		}
	}
	}
	public function hapus_cart($id='')
	{
		$data= array(
			'rowid' => $id,
			'qty' => 0
		);
		$update_cart=$this->cart->update($data);
		if ($update_cart) {
			$data['status']=1;
			echo json_encode($data);
		} else {
			$data['status']=0;
			echo json_encode($data);
		}
	}
	public function hapus_semua()
	{
		$this->cart->destroy();
		$data['status']=1;
		echo json_encode($data);
	}

}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */