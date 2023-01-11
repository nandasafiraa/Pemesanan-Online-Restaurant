<link href="<?=base_url()?>asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title" style="text-align: center;">Data Order</h3>
	</div>
		<div class="panel-body">
		<a href="#tambah" class="btn tbn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>	
		<table class="datatable table table-hover oke">
		<thead>
		<tr style="text-align: center;">
			<th style="text-align: center;">ID Order</th>
			<th style="text-align: center;">Tgl</th>
			<th style="text-align: center;">Keterangan</th>
			<th style="text-align: center;">Status Order</th>
			<th style="text-align: center;">Nama Plggn</th>
			<th style="text-align: center;">Total</th>
			<th style="text-align: center;">Aksi</th>
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
				<td><a href="#update_order" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_der->id_order.')">Update</a> <a href="'.base_url('index.php/Order/hapus_order/'.$dt_der->id_order).'" class="btn btn-danger" onclick="return confirm(\'Serius Mau menghapus?\')">Delete</a></td>
				</tr>';
			}
			?>
		</tbody>
		</table>
		<?php if ($this->session->flashdata('pesan')!=null): ?>
			<div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
		<?php endif?>
</div>
</div>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Order</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Order/simpan_order')?>" method="post" enctype="multipart/form-data">
        tanggal
        <input type="date" name="tanggal" class="form-control"><br>
        Keterangan
        <input type="text" name="keterangan" class="form-control"><br>
        Status Order
        <input type="text" name="status_order" class="form-control"><br>
        Nama Pelanggan
        <select name="id_pelanggan" class="form-control">
        	<?php
        	foreach ($data_pelanggan as $dt_pel) {
        		echo "<option value= '".$dt_pel->id_pelanggan."'>
        		".$dt_pel->nama."
        		</option>";
        	}
        	?>
        </select><br>
        Total Bayar
        <input type="text" name="total_bayar" class="form-control"><br>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>	
		</div>
	</div>
</div>

<div class="modal fade" id="update_order">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Order</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Order/update_order')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_order" id="id_order">
        tanggal
        <input type="date" name="tanggal" id="tanggal" class="form-control"><br>
        Keterangan
        <input type="text" id="keterangan" name="keterangan" class="form-control"><br>
        Status Order
        <input type="text" id="status_order" name="status_order" class="form-control"><br>
        Nama Pelanggan
        <select id="id_pelanggan" name="id_pelanggan" class="form-control">
        	<?php
        	foreach ($data_pelanggan as $dt_pel) {
        		echo "<option value= '".$dt_pel->id_pelanggan."'>
        		".$dt_pel->nama."
        		</option>";
        	}
        	?>
        </select><br>
        Total Bayar
        <input type="text" id="total_bayar" name="total_bayar" class="form-control"><br>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>	
		</div>
	</div>
</div>

<script type="text/javascript">
    
    function tm_detail(id_der) {
        $.getJSON("<?=base_url()?>index.php/Order/get_detail_order/"+id_der,function(data){
            $("#id_order").val(data['id_order']);
            $("#tanggal").val(data['tanggal']);
            $("#keterangan").val(data['keterangan']);
            $("#status_order").val(data['status_order']);
            $("#id_pelanggan").val(data['id_pelanggan']);
            $("#total_bayar").val(data['total_bayar']);
        });
    }

</script>

<script src="<?=base_url()?>asset/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script type="text/javascript">
    $('.oke').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>