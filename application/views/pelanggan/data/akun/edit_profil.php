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
					<?php
					foreach ($edit->result_array() as $tampil) { ?>
					<?php } ?>
					<!-- Block4 -->
					<div class="blo4 p-b-63">
						<div class="pic-blo4 bo-b-rad-10 pos-relative">
							<?php
							if ($tampil['poto_profil']=='') { ?>
								<img style="width: 80%;height: 240px;border-top-left-radius: 10px;
								border-top-right-radius: 10px; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;" src="<?php echo base_url()?>upload/profil/user.jpg" alt="<?php echo $tampil['nama_pelanggan'] ?>">	
							<?php }
							else{ ?>
								<img style="width: 80%;height: 240px;border-top-left-radius: 10px;
								border-top-right-radius: 10px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;" src="<?php echo base_url()?>upload/pelanggan/<?php echo $tampil['poto_profil']?>" alt="<?php echo $tampil['nama_pelanggan'] ?>">
							<?php } ?>
						</div>
						<div class="text-blo4 p-t-33">
							<h4 class="p-b-16">
								<a href="<?php echo base_url('akun') ?>" class="tit9"><?php echo $tampil['nama_pelanggan'] ?></a>
							</h4>
							<div class="txt32 flex-w p-b-24">
								<span>
									<?php echo $tampil['email_pelanggan'] ?>
									<span class="m-r-6 m-l-4">|</span>
								</span>
								<span>
									<?php echo $tampil['alamat_pelanggan'] ?>
									<span class="m-r-6 m-l-4">|</span>
								</span>
								<span>
									<?php echo $tampil['telp_pelanggan'] ?>

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
					<h3 class="text-center">
						<img src="<?php echo base_url()?>images/icons/png/026-diagram.png" style="width: 40px"> 
						Profile Edit
					</h3>
					<hr>
					<?php echo form_open_multipart('akun/profile_update','class="wrap-form-reservation size22 m-l-r-auto"') ?> 


					<div class="row m-t-10">
						<input type="hidden" name="id_pelanggan" value="<?php echo $tampil['id_pelanggan'];?>"/>
						<div class="col-sm-12">
							<!-- Name -->
							<span class="txt9">
								Nama
							</span>

							<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="nama_pelanggan" placeholder="Nama" value="<?php echo $tampil['nama_pelanggan'] ?>" >
							</div>
						</div>
						
						<div class="col-sm-12">
							<!-- Phone -->
							<span class="txt9">
								Telepon
							</span>

							<div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="telp_pelanggan" placeholder="Telepon" value="<?php echo $tampil['telp_pelanggan'] ?>" >
							</div>
						</div>					

						<div class="col-sm-12">
							<!-- Phone -->
							<span class="txt9">
								Alamat
							</span>

							<div class="bo2 bo-rad-10 m-t-3 m-b-43" style="width: 100%;height: 60%">
								<textarea class="bo-rad-10 sizefull txt10 p-l-20"  name="alamat_pelanggan" placeholder="Alamat"><?php echo $tampil['alamat_pelanggan'] ?></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<span class="txt9">
								Gambar Profil
							</span>

							<div class="bo2 bo-rad-10 m-t-3 m-b-25">
								<?php 
								if ($tampil['poto_profil']=='') {?>
									<img class="bg-white bo-rad-10" class="m-t-3" src="<?php echo base_url()?>upload/profil/user.jpg" alt="logo" style="width: 100px">
								<?php }
								else{?>
									<img id="blah" class="bg-white bo-rad-10" class="list-group-item" src="<?php echo base_url()?>upload/pelanggan/<?php echo $tampil['poto_profil']?>" alt="profile" style="width: 100px">
									<?php} ?>
								<?php }?>
								<input class="bo-rad-10 sizefull txt10 p-l-2" type="file" name="poto_profil" onchange="readURL(this);" value="<?php echo $tampil['poto_profil'] ?>">
							</div>
						</div>
					</div>

					<div class="flex-c-m m-t-6">
						<!-- Button3 -->
						<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
							Update
						</button>
					</div>
					<?php echo form_close(); ?>			
				</div>
			</div>
		</div>
	</div>
</section>

