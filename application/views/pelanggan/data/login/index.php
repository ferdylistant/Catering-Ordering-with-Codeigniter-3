<?php $this->pelanggan_model->cek_sudah_login() ?>
<?php foreach ($tentang_resto->result_array() as $tentang) {} ?>
<style type="text/css">
#lupaPass {
	background-color: rgba(0,0,0,0.8);
	z-index: 1250;

}

#lupaPass .modal-dialog {
	max-width: 100% !important;
	height: 100% !important;
	padding: 0;
	margin: 0;
	display: -webkit-box;
	display: -webkit-flex;
	display: -moz-box;
	display: -ms-flexbox;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	position: relative;
}
.forget-password{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	opacity: 0;
	-webkit-transition: all 2s;
	-o-transition: all 2s;
	-moz-transition: all 2s;
	transition: all 2s;
}
.forget-password .panel-body{
	width: 80%;
	margin: auto;
	padding: 10%;
	background: #fff;
	border-radius: 5px;
	-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.wrap-model-lupa {
	width: 854px;
	height: auto;
	position: relative;
	margin: 15px;
}
.btnForget{
	background: #c0392b;
	border:none;
}
.forget-password .dropdown button{
	width: 100%;
}
.forget-password .dropdown ul{
	width: 100%;
}
</style>
<?php 
if ($this->session->flashdata('warning')) {
	echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
	<div class='modal-dialog'>
	<!-- Modal content-->
	<div class='modal-content' role='document'>
	<div class='modal-header'>                				
	<h4 class='modal-title txt24'>Peringatan!</h4>
	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	</div>
	<div class='modal-body'>
	<p>Silahkan login!</p>
	</div>           
	</div>
	</div>
	</div>";
}elseif($this->session->flashdata('error')){
	echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
	<div class='modal-dialog'>
	<!-- Modal content-->
	<div class='modal-content' role='document'>
	<div class='modal-header'>                				
	<h4 class='modal-title txt24'>Peringatan!</h4>
	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	</div>
	<div class='modal-body'>
	<p>Email atau Password yang Anda masukkan salah!</p>
	</div>           
	</div>
	</div>
	</div>";
}elseif($this->session->flashdata('sukses')){
	echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='...' aria-hidden='true'>
	<div class='modal-dialog'>
	<!-- Modal content-->
	<div class='modal-content' role='document'>
	<div class='modal-header'>                				
	<h4 class='modal-title txt24'>Peringatan!</h4>
	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	</div>
	<div class='modal-body'>
	<p>Berhasil logout!</p>
	</div>           
	</div>
	</div>
	</div>";
}elseif($this->session->flashdata('berhasil')){
	echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
	<div class='modal-dialog'>
	<!-- Modal content-->
	<div class='modal-content' role='document'>
	<div class='modal-header'>                				
	<h4 class='modal-title txt24'>Peringatan!</h4>
	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	</div>
	<div class='modal-body'>
	<p>Silahkan cek email Anda untuk melakukan aktivasi akun!</p>
	</div>           
	</div>
	</div>
	</div>";
}
?>
<!-- Reservation -->
<section class="section-reservation bg-white p-t-180 p-b-80">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-t-45 p-b-30">
				<div class="wrap-text-welcome t-center m-b-35">
					<h3 class="tit3 t-center ">
						LOGIN
					</h3>
					<span class="tit2 t-center">
						Selamat datang di Kampung Jawa!
					</span>
				</div>
				<?php echo form_open(base_url('login'),'class="size22 m-l-r-auto"') ?> 
				<div class="row">			
					<div class="col-sm-12">
						<!-- Email -->
						<span class="txt9">
							Email
						</span> 

						<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email_pelanggan" placeholder="Email" value="<?php echo set_value('email_pelanggan') ?>">
							<?php echo form_error('email_pelanggan','<span class="text-danger">','</span>')?>
						</div>
					</div>
					<div class="col-sm-12">
						<!-- Password -->
						<span class="txt9">
							Password
						</span>
						<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" autocomplete="off" type="password" name="password_pelanggan" placeholder="Password">
							<?php echo form_error('password_pelanggan','<span class="text-danger">','</span>')?>
						</div>
					</div>
				</div>
				<center>
					<a href="<?php echo base_url();?>signup">Buat Akun</a>&nbsp;<span class="txt24 trans-0-4">|&nbsp;</span><a href="#" data-toggle="modal" data-target="#lupaPass">Lupa Password</a>
				</center>
				<div class="flex-c-m m-t-6">

					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
						Masuk
					</button>
				</div>
				<div class="text-center m-t-7"><span class="text-secondary trans-0-4">Atau</span></div>
				
				<div class="text-center m-t-7">
					
					<a href="<?php echo $login_url;?>"><img src="<?php echo base_url()?>images/sign_in.jpg" style="width: 250px"></a>
				</div>
					
				
				
				<?php echo form_close(); ?>
			</div>
			<div class="col-md-6 p-b-30">
				<div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto" style="box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2);">
					<img src="<?php echo base_url()?>images/login/gambar-login.jpg" alt="IMG-OUR">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-reservation bg1-pattern">
	<div class="container">
		<div class="info-reservation flex-w p-t-30 p-b-70">
			<div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
				<h4 class="txt5 m-b-18">
					Any Question
				</h4>

				<p class="size25">
					Jika ada kritik/saran yang membangun, atau sebuah pertanyaan terkait <?php echo $tentang['nama_resto'] ?>, silakan hubungi call-center kami:
					<span class="txt24"><?php echo $tentang['telp_resto']?></span>
				</p>
			</div>

			<div class="size24 w-full-md p-t-40">
				<h4 class="txt5 m-b-18">
					For Event Booking
				</h4>

				<p class="size26">
					Memesan tempat untuk bersantai atau memesan tempat untuk keperluan acara, silahkan menghubungi kontak berikut:
					<span class="txt24"><?php echo $tentang['telp_resto']?></span>
				</p>
			</div>

		</div>
	</div>
</section>
<div class="modal fade" id="lupaPass" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog" role="document">
		<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

		<div class="wrap-model-lupa">
			<div class="w-full wrap-pic-w op-0-0"><img src="<?php echo base_url();?>asset/global/images/icons/video-16-9.jpg" alt="IMG"></div>
			<div class="forget-password">
				<div class="panel-body">
					<div class="text-center">
						<img src="https://usa.afsglobal.org/SSO/SelfPasswordRecovery/images/send_reset_password.svg?v=3" style="width:30%;margin-bottom:5%;" alt="" border="0">
						<h2 class="text-center">Lupa Password?</h2>
						<p style="margin-bottom: 10px">You can reset your password here.</p>
						<form action="<?php echo base_url()?>lupa_password" class="form" method="post">
							<div id='valdas'></div>
							<div class="form-group bo2">
								
								<div class="input-group">
									<input type="email" name="email" id="email" placeholder="Masukkan email Anda..." class="form-control bo1">
								</div>
							</div>
							<div class="form-group">
								<button class="btn3 flex-c-m size13 txt11 trans-0-4 btn-block" id="reset" style="width: 100%!important" type="submit">Reset Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




