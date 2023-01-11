<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title" style="text-align: center;">Data Masakan</h3>
	</div>
		<div class="panel-body">
			<a href="#tambah" class="btn tbn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>	
		<table class="table table-hover">
		<thead>
		<tr style="text-align: center;">
			<th style="text-align: center;">ID Masakan</th>
			<th style="text-align: center;">Nama Masakan</th>
			<th style="text-align: center;">Gambar</th>
			<th style="text-align: center;">Harga</th>
			<th style="text-align: center;">Status Masakan</th>
			<th style="text-align: center;">Aksi</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($arr as $dt_mas) {
				$no++;
				echo '<tr style="text-align:center;">
				<td>'.$dt_mas->id_masakan.'</td>
				<td>'.$dt_mas->nama_masakan.'</td>
				<td><img src='.base_url("asset/gambar/$dt_mas->gambar").' width="125x" height="100px"></img></td>
				<td>'.$dt_mas->harga.'</td>
				<td>'.$dt_mas->status_masakan.'</td>
				<td><a href="#update_masakan" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_mas->id_masakan.')">Update</a> <a href="'.base_url('index.php/Masakan/hapus_masakan/'.$dt_mas->id_masakan).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin akan menghapus?\')">Delete</a></td>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Masakan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Masakan/simpan_masakan')?>" method="post" enctype="multipart/form-data">
        nama Masakan
        <input type="text" name="nama_masakan" class="form-control"><br>
        Upload Gambar
        <input type="file" name="gambar" class="form-control"><br>
        harga
        <input type="text" name="harga" class="form-control"><br>
        status masakan
        <input type="text" name="status_masakan" class="form-control"><br>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>	
		</div>
	</div>
</div>

<div class="modal fade" id="update_masakan">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Masakan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Masakan/update_masakan')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_masakan" id="id_masakan">
        nama masakan
        <input type="text" name="nama_masakan" id="nama_masakan" class="form-control"><br>
        Upload Gambar
        <input type="file" name="gambar" class="form-control"><br>
        harga
        <input type="text" name="harga" id="harga" class="form-control"><br>
        status masakan
        <input type="text" name="status_masakan" id="status_masakan" class="form-control"><br>
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
	
	function tm_detail(id_masak) {
		$.getJSON("<?=base_url()?>index.php/Masakan/get_detail_masakan/"+id_masak,function(data){
			$("#id_masakan").val(data['id_masakan']);
			$("#nama_masakan").val(data['nama_masakan']);
			$("#harga").val(data['harga']);
			$("#status_masakan").val(data['status_masakan']);
		});
	}

</script>