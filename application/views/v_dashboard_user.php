<h2>Selamat Datang Di Pesan Makanan Online</h2>
<div class="col-md-12">
	<div class="row"><input style="width: 220px" type="text" id="cari" name="cari" class="form-control" placeholder="Cari Disini"></div><br>
	<div class="row">
  <div id="tampil_masakan"></div>
</div>
</div>

<div class="modal fade" id="detail_masakan">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Detail Masakan</h4>
	</div>
	<div class="modal-body">
	<div class="row">
	<div class="col-md-6">
		<div id="gambar"></div>
	</div>
	<div class="col-md-6">
		<div id="deskripsi"></div>
		<div id="jumlah"></div><br>
		<div id="meja"></div><br>
		<br>
		<div id="btn"></div>
		<div id="pesan"></div>
	</div>
	</div>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$.getJSON("<?=base_url()?>index.php/Get_masakan",function(data){
		var datanya="";
		$.each(data,function(key,dt){
			datanya+=
			'<div class="col-xs-6 col-md-3"><a href="#detail_masakan" '+
			'class="thumbnail text-center" data-toggle="modal" onclick="tm_detail('+dt['id_masakan']+')" style="text-decoration:none">'+
			'<img style="height:100px" src="<?=base_url('asset/gambar/')?>'+ dt['gambar']+'" alt="...">'+dt['nama_masakan']+'<br>'+dt['harga']+
			'</a>'+
			'</div>';
		});
		$("#tampil_masakan").html(datanya);
	});

	$("#cari").on('keyup',function(){
		$.getJSON("<?=base_url()?>index.php/Get_masakan/cari/"+$("#cari").val(),function(data){
			var datanya="";
			$.each(data,function(key,dt){
				datanya+=
				'<div class="col-xs-6 col-md-3"><a href="#detail_masakan" ' + 'class="thumbnail text-center" data-toggle="modal" onclick="tm_detail('+dt['id_masakan']+')" style="text-decoration:none">'+
				'<img style="height:100px" src="<?=base_url('asset/gambar/')?>'+dt['gambar']+'" alt="...">'+dt['nama_masakan']+'<br>'+dt['harga']+
				'</a>'+
				'</div>';
			});
			$("#tampil_masakan").html(datanya);
		});
	});

//tampilkan detail masakan
function tm_detail(id_masakan){
	$.getJSON("<?=base_url()?>index.php/Get_masakan/detail/"+id_masakan,function(data){
		$("#gambar").html(
			'<img src="<?=base_url()?>asset/gambar/'+data['gambar']+'" style="width:100%">');
		$("#deskripsi").html(
			'<table class="table table-hover table-stripped">'+
			'<tr><td>Nama Masakan</td><td>'+data['nama_masakan']+'</td></tr>'+
			'<tr><td>Harga Masakan</td><td>'+data['harga']+'</td></tr>'+
			'</table>');
		$("#jumlah").html(
			'<label>jumlah</label><br>'+
			'<input type="number" id="jumlah_item" value="1" class="form-control">');
		$("#meja").html(
			'<label>No Meja</label><br>'+
			'<input type="number" id="jumlah_meja" value="1" class="form-control">');
		$("#btn").html('<button id="beli" onclick="beli('+data['id_masakan']+')" class="btn btn-info">Beli</button> '+
			'<a href="<?=base_url()?>index.php/Pesan" class="btn btn-danger">CHECK OUT</a>');
	});
}

//menambahkan makanan ke pesanan
function beli(id_masakan)
{
	var jumlah=$('#jumlah_item').val();
	var meja=$('#jumlah_meja').val();
	$('pesan').hide();
	$('pesan').removeClass("alert alert-success");
	$.getJSON("<?=base_url()?>index.php/Pesan/tambah_cart/"+id_masakan+"/"+jumlah+"/"+meja,function(hasil)
	{
		$('#cart').html(hasil['total_cart']);
		$('#pesan').html("Item anda telah ditambahkan ke Keranjang");
		$('#pesan').addClass('alert alert-success');
		$('#pesan').show('animate');
		setTimeout(function() {
			$("#pesan").hide('fade');
		}, 3000);
	});
}

</script>