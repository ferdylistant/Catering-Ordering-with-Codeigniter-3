
<?php $this->pelanggan_model->cek_login() ?>
<style type="text/css">
.btn-edit-profil{
	background: #2193b0;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	color: #fff;
	border: 3px solid #eee;
	border-radius: 7px;
}
.btn-edit-profil:hover{
	background: #2193b0;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	color: #fff;
	border: 3px solid #eee;
}
.btn-ubah-password{
	background: #fc4a1a;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #f7b733, #fc4a1a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	color: #fff;
	border: 3px solid #eee;
	border-radius: 7px;
}
.btn-ubah-password:hover{
	background: #fc4a1a;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #f7b733, #fc4a1a);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #f7b733, #fc4a1a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	color: #fff;
	border: 3px solid #eee;
	border-radius: 7px;
}
.notify {
	display: block;
	background: #fff;
	padding: 12px 18px;
	width: 100%;
	max-width: 800px;
	margin: 0 auto;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	margin-bottom: 20px;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 2px 0px;
}
</style>
<!-- Content page -->
<section class="p-t-130">
	<div class="bo5-b p-t-17 p-b-17">
		<div class="container">

			<span class="txt33 p-b-35 p-t-58">
				MY PROFILE
			</span>
		</div>
	</div>

	<div class="container">

		<div class="row">
			<div class="col-md-4 col-lg-4">
				<div class="p-t-80 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
					
					<!-- Block4 -->
					<div class="blo4 p-b-63">
						<div class="pic-blo4 pos-relative">
						<?php $poto = $this->session->userdata('poto_profil');
						$idP = base64_encode($pelanggan['id_pelanggan']);
						if ($pelanggan['poto_profil']=='') { ?>

						<img style="width: 80%;height: 240px;border-top-left-radius: 10px;
						border-top-right-radius: 10px;" src="<?php echo base_url()?>upload/profil/user.jpg" alt="<?php echo $pelanggan['nama_pelanggan'] ?>">	

						<?php }
						else{ ?>

						<img style="width: 80%;height: 240px;border-top-left-radius: 10px;
						border-top-right-radius: 10px;" src="<?php echo base_url()?>upload/pelanggan/<?php echo $pelanggan['poto_profil'] ?>" alt="<?php echo $pelanggan['nama_pelanggan'] ?>">
						<?php } ?>
					</div>
					<a class="bo-b-rad-10 btn6 flex-c-m txt11 trans-0-4" href="<?php echo base_url()?>akun/p_edit/<?php echo $idP;?>" style="width: 80%;
					height: 50px;"><i class="fa fa-upload" style="padding-right: 6px;"></i>Edit Profile</a>

					<div class="text-blo4 p-t-33">
						<h4 class="p-b-16">
							<a href="<?php echo base_url('akun') ?>" class="tit9"><?php echo $pelanggan['nama_pelanggan'] ?></a>
						</h4>
						<div class="txt32 flex-w p-b-24">
							<span>
								<?php echo $pelanggan['email_pelanggan'] ?>
								<span class="m-r-6 m-l-4">|</span>
							</span>
							<span>
								<?php echo $pelanggan['alamat_pelanggan']?>
								<span class="m-r-6 m-l-4">|</span>
							</span>
							<span>
								<?php echo $pelanggan['telp_pelanggan']?>

							</span>
						</div>
						<div class="categories">
							<ul>
								<li class="bo5-b p-t-8 p-b-8">
									<button id="r_t" class="txt27 klik_menu">
										<img style="width: 40px" src="<?php echo base_url();?>images/icons/png/013-tap.png">
										Riwayat Transaksi
									</button>
								</li>
								<li class="bo5-b p-t-8 p-b-8">
									<button id="nt" class="txt27 klik_notif">
										<img style="width: 40px" src="<?php echo base_url();?>images/icons/png/032-marketing.png">
										Notifikasi
										<span class="badge badge-danger pull-right labelBadge" style="padding: 0.25em 0.4em!important;
										font-size: 100%;
										font-weight: 800;
										line-height: 1;
										vertical-align: center!important;
										text-align: center;"></span>
									</a>

								</li>
								<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										<img style="width: 40px" src="<?php echo base_url();?>images/icons/keys.png">
										Ubah Password
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--bagian kanan-->
		<div class="col-lg-8">
			<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md notif notify" id="tampilkan">
				<div id="akunprofil ">
					<h3 class="text-center"><img src="<?php echo base_url()?>images/icons/png/026-diagram.png" style="width: 40px"> Profile Saya</h3>
					<p class="text-center txt4 m-t-10">kelola informasi pribadi anda untuk mengontrol, melindungi,dan mengamankan akun</p>
					<hr>
					<table class="table table-striped m-t-17" style="width: 100%;height: 210px">

						<tr>
							<td class="txt27" height="30" align="center"><strong>Nama&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
							<td class="txt10" height="30" align="center"><?php echo $pelanggan['nama_pelanggan']?></td>
						</tr>
						<tr>
							<td class="txt27" height="30" align="center"><strong>Email&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
							<td class="txt10" height="30" align="center"><?php echo $pelanggan['email_pelanggan'];?></td>
						</tr>
						<tr>
							<td class="txt27" height="30" align="center"><strong>Alamat :</strong></td>
							<td class="txt10" height="30" align="center"><?php echo $pelanggan['alamat_pelanggan'];?></td>
						</tr>
						<tr>
							<td class="txt27" height="30" align="center"><strong>Telepon:</strong></td>
							<td class="txt10" height="30" align="center"><?php echo $pelanggan['telp_pelanggan']?></td>
						</tr>
					</table>
					<div align="center">
						<a href="<?php echo base_url()?>akun/p_edit/<?php echo $idP;?>" class="btn btn-edit-profil">Edit Profil</a>&nbsp;<a href="#" class="btn btn-ubah-password">Ubah Password</a>
					</div>
				</div>				
			</div>
		</div>
		<!-- Batas Bagian Kanan -->
	</div>
</div>
</section>


