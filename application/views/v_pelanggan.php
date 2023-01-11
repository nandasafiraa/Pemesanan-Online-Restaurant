<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title" style="text-align: center;">Data Pelanggan</h3>
	</div>
		<div class="panel-body">
			<a href="#tambah" class="btn tbn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>	
		<table class="table table-hover apik">
		<thead>
		<tr style="text-align: center;">
			<th style="text-align: center;">ID Pelanggan</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;">Alamat</th>
			<th style="text-align: center;">Telp</th>
			<th style="text-align: center;">Username</th>
			<th style="text-align: center;">Password</th>
			<th style="text-align: center;">Aksi</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($data_pelanggan as $dt_pel) {
				$no++;
				echo '<tr style="text-align:center;">
				<td>'.$dt_pel->id_pelanggan.'</td>
				<td>'.$dt_pel->nama.'</td>
				<td>'.$dt_pel->alamat.'</td>
				<td>'.$dt_pel->telp.'</td>
				<td>'.$dt_pel->username.'</td>
				<td>'.$dt_pel->password.'</td>
				<td><a href="#update_pelanggan" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_pel->id_pelanggan.')">Update</a> <a href="'.base_url('index.php/Pelanggan/hapus_pelanggan/'.$dt_pel->id_pelanggan).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin akan menghapus?\')">Delete</a></td>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Pelanggan/simpan_pelanggan')?>" method="post" enctype="multipart/form-data">
        Nama
        <input type="text" name="nama" class="form-control"><br>
        Alamat
        <input type="text" name="alamat" class="form-control"><br>
        Telepon
        <input type="text" name="telp" class="form-control"><br>
        Username
        <input type="text" name="username" class="form-control"><br>
        Password
        <input type="text" name="password" class="form-control"><br>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>	
		</div>
	</div>
</div>

<div class="modal fade" id="update_pelanggan">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Pelanggan/update_pelanggan')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pelanggan" id="id_pelanggan">
        nama
        <input type="text" name="nama" id="nama" class="form-control"><br>
        alamat
        <input type="text" name="alamat" id="alamat" class="form-control"><br>
        Telepon
        <input type="text" name="telp" id="telp" class="form-control"><br>
        Username
        <input type="text" name="username" id="username" class="form-control"><br>
        Password
        <input type="text" name="password" id="password" class="form-control"><br>
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
	
	function tm_detail(id_pela) {
		$.getJSON("<?=base_url()?>index.php/Pelanggan/get_detail_pelanggan/"+id_pela,function(data){
			$("#id_pelanggan").val(data['id_pelanggan']);
			$("#nama").val(data['nama']);
			$("#alamat").val(data['alamat']);
			$("#telp").val(data['telp']);
			$("#username").val(data['username']);
			$("#password").val(data['password']);
		});
	}

</script>