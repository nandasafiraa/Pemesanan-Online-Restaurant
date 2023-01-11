<link href="<?=base_url()?>asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title" style="text-align: center;">Data Order</h3>
	</div>
		<div class="panel-body">
		<table class="datatable table table-hover oke">
		<thead>
		<tr style="text-align: center;">
			<th style="text-align: center;">ID Order</th>
			<th style="text-align: center;">Tgl</th>
			<th style="text-align: center;">Keterangan</th>
			<th style="text-align: center;">Status Order</th>
			<th style="text-align: center;">Nama Plggn</th>
			<th style="text-align: center;">Total</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($data_order as $dt_der) {
				$no++;
				echo '<tr style="text-align:center;">
				<td>'.$dt_der->id_order.'</td>
				<td>'.$dt_der->tanggal.'</td>
				<td>'.$dt_der->keterangan.'</td>
				<td>'.$dt_der->status_order.'</td>
				<td>'.$dt_der->nama.'</td>
				<td>'.$dt_der->total_bayar.'</td>
				</tr>';
			}
			?>
		</tbody>
		</table>

</div>
</div>
