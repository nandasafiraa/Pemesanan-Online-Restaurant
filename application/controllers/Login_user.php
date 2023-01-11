<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login_user');		
	}
	public function proses()
	{
		$this->load->model('login_user_model', 'l_user');
		$login=$this->l_user->cek_user();
		if ($login->num_rows()>0) {
			$dt_user=$login->row();
			$array = array(
				'id_pelanggan' => $dt_user->id_pelanggan,
				'nama' => $dt_user->nama,
				'alamat' => $dt_user->alamat,
				'telp' => $dt_user->telp,
				'username' => $dt_user->username,
				'password' => $dt_user->password,
				'login_user' => true);
			$this->session->set_userdata($array);
			$data['status']=1;
			echo json_encode($data);
		} else{
			$data['status']=0;
			echo json_encode($data);
		}
	}
	public function simpan()
	{
		$this->load->model('login_user_model', 'l_user');
		$cek_data=$this->l_user->tambah_user();
		if ($cek_data) {
			$data['status']=1;
			$data['keterangan']="anda sukses menambah data";
			echo json_encode($data);
		}
		else{
			$data['status']=0;
			$data['keterangan']="anda gagal menambah data";
			echo json_encode($data);
		}
	}

}

/* End of file Login_user.php */
/* Location: ./application/controllers/Login_user.php */