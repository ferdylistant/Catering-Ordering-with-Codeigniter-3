<?php
foreach ($tentang_resto->result_array() as $about) {
}
?>
<!-- Section body -->
<section class="section-contact bg1-pattern p-t-173 p-b-10">
	<div class="p-t-17 p-b-10">
		<div class="container">
			<h3 class="tit-mainmenu tit10 p-b-35">
				<img src="<?php echo base_url('images/icons/png/028-customer-service.png') ?>" style="width: 40px;"> HUBUNGI KAMI
			</h3>
		</div>
	</div>
</section>
<!-- Map -->
<section class="section-contact bg1-pattern p-t-10 p-b-113">
	<div class="container">
		<div class="map bo8 bo-rad-10 of-hidden">
			<div class="contact-map size37" id="map"></div>
		</div>
	</div>

	<div class="container">
		<h3 class="tit7 t-center p-b-62 p-t-105">
			Send us a Message
		</h3>
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
			<p>Silahkan isi dan lengkapi inputan yang ada!</p>
			</div>
			</div>
			</div>
			</div>";
		}elseif($this->session->flashdata('sukses')){
			echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
			<div class='modal-dialog'>
			<!-- Modal content-->
			<div class='modal-content' role='document'>
			<div class='modal-header'>
			<h4 class='modal-title txt24'>Sukses!</h4>
			<button type='button' class='close' data-dismiss='modal'>&times;</button>
			</div>
			<div class='modal-body'>
			<p>Pesan Terkirim!</p>
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
			<p>Berhasil mendaftar!</p>
			</div>
			</div>
			</div>
			</div>";

		} ?>
		<?php echo form_open(base_url('saran'),'wrap-form-reservation size22 m-l-r-auto')?>
		<div class="row">
			<div class="col-md-4">
				<!-- Name -->
				<span class="txt9">
					Name
				</span>

				<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
					<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="nama_saran" placeholder="Name">
				</div>
			</div>

			<div class="col-md-4">
				<!-- Email -->
				<span class="txt9">
					Email
				</span>

				<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
					<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email_saran" placeholder="Email">
				</div>
			</div>

			<div class="col-md-4">
				<!-- Phone -->
				<span class="txt9">
					Phone
				</span>

				<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
					<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="telp_saran" placeholder="Phone">
				</div>
			</div>

			<div class="col-12">
				<!-- Message -->
				<span class="txt9">
					Message
				</span>
				<textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="isi_saran" placeholder="Message"></textarea>
			</div>
		</div>

		<div class="wrap-btn-booking flex-c-m m-t-13">
			<!-- Button3 -->
			<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
				Submit
			</button>
		</div>
		<?php echo form_close();?>

		<div class="row p-t-135">
			<div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
				<div class="dis-flex m-l-23">
					<div class="p-r-40 p-t-6">
						<img src="<?php echo base_url()?>asset/global/images/icons/map-icon.png" alt="IMG-ICON">
					</div>

					<div class="flex-col-l">
						<span class="txt5 p-b-10">
							Location
						</span>

						<span class="txt23 size38">
							<?php echo $about['alamat_resto']?>
						</span>
					</div>
				</div>
			</div>

			<div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
				<div class="dis-flex m-l-23">
					<div class="p-r-40 p-t-6">
						<img src="<?php echo base_url()?>asset/global/images/icons/phone-icon.png" alt="IMG-ICON">
					</div>


					<div class="flex-col-l">
						<span class="txt5 p-b-10">
							Call Us
						</span>

						<span class="txt23 size38">
							<?php echo $about['telp_resto']?>
						</span>
					</div>
				</div>
			</div>

			<div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
				<div class="dis-flex m-l-23">
					<div class="p-r-40 p-t-6">
						<img src="<?php echo base_url()?>asset/global/images/icons/clock-icon.png" alt="IMG-ICON">
					</div>


					<div class="flex-col-l">
						<span class="txt5 p-b-10">
							Opening Hours
						</span>

						<span class="txt23 size38">
							09:30 Pagi – 23:00 Malam <br/>Every Day
						</span>
						<span class="txt23 size38">
							<?php
							date_default_timezone_set('Asia/Jakarta');
							if (date('H:i') < "09:30" || date('H:i') > "23:00") {
								echo "<span class='badge badge-danger'>Tutup</span>";
							}
							else{
								echo "<span class='badge badge-success'>Buka</span>";
							}?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>