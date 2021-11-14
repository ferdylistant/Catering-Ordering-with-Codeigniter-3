<html>
<head>
	<title>Cetak PDF</title>
	<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/jqueryui/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/css/vendor.bundle.addons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/css/style.css">
	<link rel="shortcut icon" href="<?php echo base_url();?>images/logokj/Administrator.png" />
	<style>
	table {
		border-collapse:collapse;
		table-layout:fixed;width: 630px;
	}
	table td {
		word-wrap:break-word;
		width: 20%;
	}
</style>
</head>
<body>
	<?php foreach ($tentang->result_array() as $value) {} ?>
	<section style="">
		<div class="container">
			<div class="row" style="margin-top: 30px">
				<div class="col-md-3 text-center">
					<img style="width: 30%" src="<?php echo base_url()?>images/logo/logokj1.png">
				</div>
				<div class="row text-center" style="margin-left: 12%">
					<div class="col-lg-12">
						<h3><?php echo $value['nama_resto']?></h3>
						<span><?php echo $value['alamat_resto']?></span>
						<p style="color: #119c98;text-decoration: underline;"><?php echo $value['email_resto']?></p>
					</div>
				</div>
			</div>
			<hr>


			<div class="row">
				<div class="col-lg-12">
					<div class="text-center"><b><u><?php echo $ket; ?></u></b></div>
					<br /><br />
					<table class="table table-bordered">
						<thead style="background-color: #f3f5f6;">
							<tr>
								<th><b>	Kode Pemesanan</b></th>
								<th><b>	Nama</b></th>
								<th><b>	Telepon</b></th>
								<th><b>	Alamat</b></th>
								<th><b>	Tanggal Pemesanan</b></th>
								<th><b>	Total Pemesanan</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if( ! empty($transaksi)){
								$no = 1;
								$total = 0;
								foreach($transaksi as $data){
									$tgl_order_masuk = date('d-m-Y', strtotime($data->tgl_order_masuk)); ?>
									<tr>
										<td>KJ<?php echo $data->id_order ?></td>
										<td><?php echo $data->nama_order ?></td>
										<td><?php echo $data->telp_order ?></td>
										<td><?php echo $data->alamat_order ?></td>
										<td><?php echo ($data->tgl_order_masuk)?></td>
										<td><?php echo rupiah($data->total_order) ?></td>
									</tr>
									<?php $no++;$total += $data->total_order; ?>
								<?php } ?>
							<?php } ?>
						</tbody>
						<tfoot style="background-color: #f3f5f6;">

							<tr>
								<td colspan="5"><strong><h3>Total Pemesanan Pelanggan </h3></strong>	</td>
								<td><strong><h3 style="word-wrap:break-word;">Rp.<?php echo number_format($total)?></h3></strong></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</section>

	<script>
		window.load=print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
<script src="<?php echo base_url();?>asset/admin/jqueryui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>asset/admin/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url();?>asset/admin/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo base_url();?>asset/admin/js/off-canvas.js"></script>
<script src="<?php echo base_url();?>asset/admin/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url();?>asset/admin/js/dashboard.js"></script>
<!-- End custom js for this page-->
<script src="<?php echo base_url();?>asset/admin/pages/scripts/form-validation.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>asset/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#table').DataTable({
			rowReorder:{
				selector: 'td:nth-child(2)'
			},
			responsive: true
		});
	});
</script>
</html>