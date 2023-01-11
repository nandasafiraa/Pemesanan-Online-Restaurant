<!DOCTYPE html>
<html>
<head>
	<title>NOTA</title>
	<link href="<?php echo base_url(); ?>asset/vendor/css/vendor.bundle.base.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/vendor/css/vendor.bundle.addons.css" rel="stylesheet">
	<script src="<?=base_url()?>asset/vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>asset/vendor/linearicons/style.css">
</head>
<body>
	<div id="nota"></div>
	<script type="text/javascript">
		$("#nota").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/riwayat/get_detil_transaksi_by_id/<?php echo$this->uri->segment(3); ?>', function (data) {
			$("#nota").html(data.show_detil);

			window.print();
		});

	</script>
</body>
</html>