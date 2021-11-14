
<?php $this->pelanggan_model->cek_login() ?>
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
				<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md" id="tampilkan">
					<span class="txt33 p-b-35 p-t-58">
						<img src="<?php echo base_url()?>images/icons/png/030-calculator.png" style="width: 40px">
						Detail Transaksi
					</span>
					<?php foreach ($dtl as $detail) {?>
					<ul class="list-group m-t-20 m-b-20">
						<li class="list-group-item">
							<div class="isotope-item">
								<a class="btn-show-gallery" href="<?php echo base_url()?>images/menu/<?php echo $detail['gambar_menu'] ?>" data-lightbox="menu">
									<img class="img-rounded" style="width: 80px" src="<?php echo base_url()?>images/menu/<?php echo $detail['gambar_menu'] ?>"></a>
								</div>
							</li>
							<li class="list-group-item">
								<strong>Kode Pemesanan</strong>
								<span style="float: right">
									<?php echo $detail['id_order'] ?>
								</span>
							</li>
							<li class="list-group-item">
								<strong>Nama</strong>
								<span style="float: right">
									<?php echo $detail['nama_produk'] ?>
								</span>
							</li>
							<li class="list-group-item">
								<strong>Jenis</strong>
								<span style="float: right;">
									<?php echo $detail['jenis_produk']?>
								</span>
							</li>
							<li class="list-group-item">
								<strong>Deskripsi</strong>
								<?php
								if ($detail['deskripsi']=='') {?>
								<span style="float: right;">
									Tidak ada deskripsi
								</span>
								<?php }
								else{?>
								<span style="float: right;width: 40%;word-wrap:break-word;white-space: normal;">
									<?php echo $detail['deskripsi'] ?>
								</span>
								<?php } ?>

							</li>
							<li class="list-group-item">
								<strong>Harga</strong>
								<span style="float: right;">
									<?php echo rupiah($detail['harga_produk']) ?>
								</span>
							</li>
							<li class="list-group-item">
								<strong>Jumlah Pemesanan</strong>
								<span style="float: right;">
									<?php echo $detail['jumlah_order'] ?>
								</span>
							</li>
							<li class="list-group-item">
								<strong>Sub-Total</strong>
								<span style="float: right;">
									<?php echo rupiah($detail['sub_harga']) ?>
								</span>
							</li>
						</ul>
						<?php } ?>
						<?php
						if ($detail['status_order']=='407'){ ?>
						<div class="alert alert-danger" style="border-left: solid"><b><i class="fa  fa-exclamation-circle text-danger"></i> Penolakan:</b> 
							<span>Waktu pembayaran Anda telah melewati batas!</span>
							<button type="button" class="close text" data-dismiss="alert">×</button>
						</div>
						<?php }
						elseif($detail['status_order']=='201'){ ?>
						<div class="alert alert-danger" style="border-left: solid"><b><i class="fa  fa-exclamation-circle text-danger"></i> Peringatan:</b> 
							<span>Anda belum melakukan pembayaran. Silakan lakukan pembayaran melalui Virtual Account Bank Transfer Anda, seperti yang tertera pada rincian pembayaran sesuai pemesanan Anda!</span>
							<button type="button" class="close text" data-dismiss="alert">×</button>
						</div>
						<?php }
						elseif($detail['status_order']=='0'){ ?>
						<div class="alert alert-danger" style="border-left: solid"><b><i class="fa  fa-exclamation-circle text-danger"></i> Peringatan:</b> 
							<span>Silakan lakukan konfirmasi pembayaran pada portal website kami, lalu melakukan transaksi pembayaran melalui Virtual Account Bank Transfer yang tertera!</span>
							<button type="button" class="close text" data-dismiss="alert">×</button>
						</div>
						<?php }
						else{ ?>
						<?php 
						if($detail['status_order']=='1'){ ?>
						<div class="alert alert-primary" style="border-left: solid"><b><i class="fa  fa-exclamation-circle text-primary"></i> Pemberitahuan:</b> 
							<span>Pesanan Anda sedang dikemas, silahkan ditunggu :)</span>
							<button type="button" class="close text" data-dismiss="alert">×</button>
						</div>
						<?php }
						elseif($detail['status_order']=='2'){ ?>
						<div class="alert alert-success" style="border-left: solid"><b><i class="fa  fa-exclamation-circle text-success"></i></b> Terimakasih telah melakukan pemesanan di Kampung Jawa Resto. Kami berharap Anda senang dan kembali :)</span>
							<button type="button" class="close text" data-dismiss="alert">×</button>
						</div>
						<?php } ?>
						<span class="txt33 p-b-35">
							<img src="<?php echo base_url()?>images/icons/png/026-diagram.png" style="width: 40px"> 
							Riwayat Pembayaran
						</span>
						<?php $no = 0; ?>
						<div class="table-responsive">
							<table class="table table-striped  table-bordered m-t-20" id="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Transaksi</th>
										<th>Pembayaran Atas Nama</th>
										<th>Tanggal Pembayaran</th>
										<th>Dari Bank</th>
										<th>Tipe Pembayaran:</th>
										<th>Virtual Account:</th>
										<th>Nominal Pembayaran:</th>
										<th>Mata Uang:</th>
									</tr>
								</thead>
								<?php foreach ($pembayaran as $rp){ ?>
								<tbody>
									<td><?php echo $no+=1;?></td>
									<td><?php echo $rp['id_transaksi'] ?></td>
									<td><?php echo $rp['nama_order'] ?></td>
									<td><?php echo format_hari_tanggal_jam($rp['waktu_transaksi'])?></td>
									<td><?php echo $rp['bank'] ?></td>
									<td><?php echo $rp['tipe_pembayaran'] ?></td>
									<td><?php echo $rp['va_number'] ?></td>
									<td><?php echo rupiah($rp['total_transaksi']) ?></td>
									<td><?php echo $rp['currency'] ?></td>

								</tbody>
								<?php } ?>
							</table>
						</div>
						<?php } ?>
						<li class="list-group-item m-t-20">
							<a href="<?php echo base_url('akun')?>" class="btn btn-warning"><span class="mdi mdi-arrow-left"></span> Kembali</a>

							<?php $id_order = base64_encode($detail['id_order']);
							if($detail["status_order"]==0){ ?>
							<a href="<?php echo base_url()?>nota/confirm/<?php echo $id_order ?>" class="btn btn-primary" style="float: right;
							">Konfirmasi Pembayaran <span class="mdi mdi-arrow-right"></span></a>
							<?php }
							elseif($detail["status_order"]=='407'){ ?>
							
							<?php }
							else{ ?>
							<a href="<?php echo base_url()?>nota/confirm/<?php echo $id_order ?>" class="btn btn-primary" style="float: right;
							">Lihat Nota <span class="mdi mdi-arrow-right"></span></a>
							<?php }	 ?>
						</li>
					</div>
				</div>
			</div>
		</div>
	</section>
