<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_user_model extends CI_Model {

	public function get_order()
	{
		return $this->db->join('user', 'user.id_user=order.id_user')->join('pelanggan','pelanggan.id_pelanggan=order.id_pelanggan')->get('order')->result();
	}	

}

/* End of file Order_user_model.php */
/* Location: ./application/models/Order_user_model.php */