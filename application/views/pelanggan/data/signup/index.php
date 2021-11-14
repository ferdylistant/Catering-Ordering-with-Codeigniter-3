<?php foreach ($tentang_resto->result_array() as $tentang) {} ?>
<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-180 p-b-113">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 p-b-30">
				<div class="t-center">
					<span class="tit2 t-center">
						Buat akun untuk memesan lebih mudah
					</span>

					<h3 class="tit3 t-center m-b-3 m-t-2">
						REGISTRASI
					</h3>
				</div>

				<?php echo form_open('signup','class="wrap-form-reservation size22 m-l-r-auto"') ?>

				<div class="row">
					<div class="col-md-12">
						<!-- Name -->
						<span class="txt9">
							Nama
						</span>

						<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="nama_pelanggan" placeholder="Nama lengkap" value="<?php echo set_value('nama_pelanggan') ?>">
							<?php echo form_error('nama_pelanggan','<span class="text-danger">','</span>')?>
						</div>
					</div>
					<div class="col-md-12">
						<!-- Email -->
						<span class="txt9">
							Email
						</span>

						<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email_pelanggan" placeholder="example@mail.com" value="<?php echo set_value('email_pelanggan') ?>">
							<?php echo form_error('email_pelanggan','<span class="text-danger">','</span>')?>
						</div>
					</div>

					<div class="col-md-6">
						<!-- Email -->
						<span class="txt9">
							Password
						</span>

						<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password_pelanggan" placeholder="Password">
							<?php echo form_error('password_pelanggan','<span class="text-danger">','</span>')?>
						</div>
					</div>

					<div class="col-md-6">
						<!-- Phone -->
						<span class="txt9">
							Repeat Password
						</span>

						<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="konfirmasi_password" placeholder="Konfirmasi password">
							<?php echo form_error('konfirmasi_password','<span class="text-danger">','</span>')?>
						</div>
					</div>
				</div>

				<div class="flex-c-m m-t-6">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
						Daftar
					</button>&nbsp;<span class="flex-w txt24 trans-0-4">Sudah punya akun?&nbsp;<a href="<?php echo base_url();?>login" class=" txt25"> Masuk</a></span>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>

		<div class="info-reservation flex-w p-t-80">
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


