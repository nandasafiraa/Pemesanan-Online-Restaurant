<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Kuy</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>asset/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>asset/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>asset/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>asset/img/favicon.png">
	<script src="<?=base_url()?>asset/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?=base_url()?>asset/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p id="msg" class="lead">Silahkan Login</p>
							</div>
							<form action="<?=base_url()?>index.php/Login_user/proses" id="sign_in" method="POST">
								<div id="msg"></div>
								<!-- <div id="pesan" class="alert alert-warning">
								</div> -->

								<div class="form-group">
									<input type="username" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password"placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<div class="row">
                        <div class="col-xs-4">
                            <a class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#daftar" style="text-align: center;">DAFTAR</a>
                        </div>
                        <div class="col-xs-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="text-align: center;">LOGIN</button>
                        </div>
                    </div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Silahkan Anda Login Dahulu</h1>
							<p>by Nanda Safira</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

<div class="modal fade" id="daftar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Pendaftaran Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form id="proses_daftar" action="#" method="post">
        <table>
            <tr>
                <td>Nama Pelanggan</td><td><input type="text" name="nama" class="form-control"></td>
            </tr>
            <tr>
                <td>Alamat</td><td><textarea name="alamat" class="form-control"></textarea> ></td>
            </tr>
            <tr>
                <td>Telepon</td><td><input type="text" name="telp" class="form-control"></td>
            </tr>
            <tr>
                <td>Username</td><td><input type="text" name="username" class="form-control"></td>
            </tr>
            <tr>
                <td>Password</td><td><input type="password" name="password" class="form-control"></td>
            </tr>
        </table>
        <input type="submit" name="daftar" value="DAFTAR">
        <p id="msg"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>

</html>

<script type="text/javascript">
	$("#proses_daftar").submit(function(event) {
        event.preventDefault(); 
        var data_input= $('#proses_daftar').serialize();
        $("#msg").html("<ul><li>Sedang memeriksa...</li></ul>");
        $.ajax({
            url:"<?=base_url()?>index.php/Login_user/simpan",
            type:"post",
            data:data_input,
            dataType:"json",
            success:function(hasil){
                if (hasil['status']==1) {
                    $("#msg").html(hasil['keterangan']);
                    $("[name=nama]").val('');
                    $("[name=alamat]").val('');
                    $("[name=telp]").val('');
                    $("[name=username]").val('');
                    $("[name=password]").val('');
                    setTimeout(function() {
                        $("#proses_daftar").modal("hide");
                    }, 3000);
                } else {
                    $("#msg").html(hasil['keterangan']);
                }
            }

        });
    });

    $("#sign_in").submit(function(event)
    {
        event.preventDefault();
        var datalogin=$("#sign_in").serialize();
        $("#pesan").html("loading...");
        $.ajax({
            url:"<?=base_url()?>index.php/Login_user/proses",
            type:"post",
            data:datalogin,
            dataType:"json",
            success:function(hasil){
                if(hasil['status']==1){
                    $("#pesan").html("Anda Sukses login");
                    setTimeout(function(){
                        location.href="<?=base_url()?>index.php/Dashboard_user";
                    }, 3000);
                } else{
                    $("#pesan").html("Username dan Password tidak cocok");
                }
            }
        })
    })
</script>