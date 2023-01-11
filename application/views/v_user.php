<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title" style="text-align: center;">Data User</h3>
	</div>
		<div class="panel-body">
			<a href="#tambah" class="btn tbn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>	
		<table class="table table-hover">
		<thead>
		<tr style="text-align: center;">
			<th style="text-align: center;">ID User</th>
			<th style="text-align: center;">Username</th>
			<th style="text-align: center;">Password</th>
			<th style="text-align: center;">Nama User</th>
			<th style="text-align: center;">Level</th>
			<th style="text-align: center;">Aksi</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($data_user as $dt_ser) {
				$no++;
				echo '<tr style="text-align:center;">
				<td>'.$dt_ser->id_user.'</td>
				<td>'.$dt_ser->username.'</td>
				<td>'.$dt_ser->password.'</td>
				<td>'.$dt_ser->nama_user.'</td>
				<td>'.$dt_ser->level.'</td>
				<td><a href="#update_user" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_ser->id_user.')">Update</a> <a href="'.base_url('index.php/User/hapus_user/'.$dt_ser->id_user).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin akan menghapus?\')">Delete</a></td>
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
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/User/simpan_user')?>" method="post" enctype="multipart/form-data">
        Username
        <input type="text" name="username" class="form-control"><br>
        Password
        <input type="text" name="password" class="form-control"><br>
        Nama User
        <input type="text" name="nama_user" class="form-control"><br>
        Level
        <input type="text" name="level" class="form-control"><br>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>	
		</div>
	</div>
</div>

<div class="modal fade" id="update_user">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update User</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/User/update_user')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" id="id_user">
        Username
        <input type="text" name="username" id="username" class="form-control"><br>
        Password
        <input type="text" name="password" id="password" class="form-control"><br>
        Nama User
        <input type="text" name="nama_user" id="nama_user" class="form-control"><br>
        Level
        <input type="text" name="level" id="level" class="form-control"><br>
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
	
	function tm_detail(id_ser) {
		$.getJSON("<?=base_url()?>index.php/User/get_detail_user/"+id_ser,function(data){
			$("#id_user").val(data['id_user']);
			$("#username").val(data['username']);
			$("#password").val(data['password']);
			$("#nama_user").val(data['nama_user']);
			$("#level").val(data['level']);
		});
	}

</script>