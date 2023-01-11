<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function index()
	{
		$this->load->model('Riwayat_model');
		$data['riwayat'] = $this->Riwayat_model->get_riwayat_order();
		$data['konten'] = 'Riwayat_view';
		
		$this->load->view('template', $data);
	}
	public function get_detil_transaksi_by_id($id_detail_order)
	{
			$this->load->model('Riwayat_model');
			$detil_order = $this->Riwayat_model->get_transaksi_by_id($id_detail_order);
			$data['show_detil'] = "";
			$total = 0;
			$no = 1;
			$data['show_detil'] .= '<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>No Meja</th>
										<th>Nama Masakan</th>
										<th>Harga</th>
										<th>Sub Total</th>
									</tr>';

			foreach ($detil_order as $d) {
				$data['show_detil'] .= '<tr>
									<td>'.$no.'</td>
									<td>'.$d->no_meja.'</td>
									<td>'.$d->nama_masakan.'</td>
									<td>'.$d->harga.'</td>
									<td>'.$d->total_bayar.'</td>
								</tr>';

				$no++;
				$total += $d->total_bayar;
			}
			$data['show_detil'] .= '</table>';
			$data['show_detil'] .= '<h3><p class="text-right">Total Belanja:</p></h3>
									<h2><p class="text-right">Rp '.$total.',- </p></h2>';
			echo json_encode($data);
	}
	public function cetak_nota()
	{
		$this->load->view('cetak_nota_view');
	}


}

/* End of file Riwayat.php */
/* Location: ./application/controllers/Riwayat.php */