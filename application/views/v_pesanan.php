<h2>Pesanan Anda</h2>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background: white">
	<div class="row">
		<a href="<?=base_url('index.php/Dashboard_user')?>" class="btn btn-primary">Belanja lagi</a> 
		<a href="#bayar" onclick="simpan_list_db()" data-toggle="modal" class="btn btn-warning">Pesan</a>
	<table class="table table-hover table-stripped">
		<thead>
			<tr>
				<th>NO</th>
				<th>Nama Masakan</th>
				<th>Jumlah</th>
				<th>No Meja</th>
				<th>Subtotal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody id="tm_pesanan">

		</tbody>
	</table>
	<div id="pesan"></div>
	</div>
</div>

<div class="modal fade" id="bayar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
      </div>
      <div class="modal-body">
        <h3>Terimakasiha anda telah memesan produk kami</h3>
        <p>untuk melanjutkan pembelian, silahkan Membayar Sebesar Rp. <span id="totalnya">0</span> ke kasir</p>
        <form method="post" id="upload_bukti" enctype="multipart/form-data">
          <input type="hidden" name="id_order" id="id_order">
          <input type="submit" name="submit" value="Kirim" data-dismiss="modal" class="btn btn-success" style="float: left;margin-right: 10px">
          <img src="#" id="loading" style="width: 30px; float: left; display: none;">
          <span id="pesan1"></span>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function load_cart() {
		$("#tm_pesanan").html('');
	$.getJSON("<?=base_url()?>index.php/Pesan/tm_pesanan",function(hasil){
		var no=0;
		$.each(hasil['data_cart'],function(key,obj){
			no++;
			$("#tm_pesanan").append(
				'<tr>'+
					'<td>'+no+'</td>'+
					'<td>'+obj['name']+'</td>'+
					'<td>'+obj['qty']+'</td>'+
					'<td>'+obj['meja']+'</td>'+
					'<td align="left">'+obj['subtotal']+'</td>'+
					'<td><a href="#" onclick="if(confirm(\'Apakah Yakin?\')){ hapus_cart(\''+obj['rowid']+'\')}"><i class="material-icons">delete</i></a></td>'+
				'</tr>'
				);
		});
		$("#tm_pesanan").append(
			'<tr>'+
				'<td colspan="4">Total keseluruhan</td><td align="left">'+hasil['total_seluruh']+'</td><td><a href="#" onclick="if(confirm(\'Apakah Anda Yakin Menghapus data ini?\')){ hapus_all()}"><i class="material-icons">delete</i></a></td>'+
			'</tr>'
		);
	});
	}
load_cart();

function simpan_list_db() {
	$.getJSON("<?=base_url()?>index.php/Pesan/simpan_bayar",function(hasil){
		if(hasil['status']==1){
			$("#pesan").html('Anda Sukses menyimpan ke nota');
			$("#pesan").show('animate');
			$("#pesan").addClass("alert alert-success");
			setTimeout(function() {
				$("#pesan").hide('animate');
				$("#pesan").removeClass("alert alert-success");
				setTimeout(function() {
					$("#totalnya").html(hasil['total']);
					$("#bayar").modal("show");
					$("#id_nota").val(hasil['id_nota']);
					load_total_cart();
					load_cart();
				}, 500);
			}, 3000);
		}
	});
}

function hapus_cart(id){
	$.getJSON("<?=base_url()?>index.php/Pesan/hapus_cart/"+id,function(hasil){
		if (hasil['status']==1) {
			load_cart();
			load_total_cart();
			$("#pesan").html('Sukses menghapus item');
				$("#pesan").show('animate');
				$("#pesan").addClass("alert alert-success");
		} else{
			$("#pesan").html('Gagal menghapus item');
				$("#pesan").show('animate');
				$("#pesan").addClass("alert alert-danger");
		}
		setTimeout(function() {
				$("#pesan").hide('animate');
				$("#pesan").removeClass("alert alert-danger");
			}, 3000);
	});
}	
 function hapus_all(){
 	$.getJSON("<?=base_url()?>index.php/Pesan/hapus_semua",function
		(hasil){
				load_total_cart();
				load_cart();
			$("#pesan").html('Sukses menghapus item');
			$("#pesan").show('animate');
			$("#pesan").addClass("alert alert-success");
			setTimeout(function() {
				$("#pesan").hide('animate');
				$("#pesan").removeClass("alert alert-success");
			}, 3000);
			}); 
 }
</script>