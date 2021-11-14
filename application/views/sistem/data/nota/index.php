<div class="row purchace-popup">
	<div class="col-12">
		<span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
			<ul class="breadcrumb py-0">
				<li>
					<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
					<i class="mdi mdi-arrow-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>sistem/nota" class="mt-2 text-dark">Nota</a>
				</li>
			</ul>
		</span>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
				<h4 class="card-title"><i class="menu-icon fa fa-shopping-cart"></i> NOTA</h4>
				<p class="card-description">
					<hr>
				</p>
				<?php foreach ($nota as $nota) { ?> 
				<div class="row" style="padding-bottom: 30px">
					<div class="col-lg-6">
						<h3>Pemesanan</h3>
						
						<ul class="list-group">
							<li class="list-group-item">
								<label><strong>Kode Pemesanan:</strong></label>
								<span style="float: right;"><?php echo $nota['id_order'] ?></span>
							</li>
							<li class="list-group-item">
								<label><strong>Tanggal Pemesanan:</strong></label>
								<span style="float: right;"><?php echo format_hari_tanggal_jam($nota['tgl_order_masuk']) ?></span>
							</li>
							<li class="list-group-item">
								<label><strong>Batas Pembayaran:</strong></label>
								<span style="float: right;"><?php echo format_hari_tanggal_jam($nota['deadline_pembayaran']); ?></span>
							</li>
							<li class="list-group-item">
								<label><strong>Total Pemesanan:</strong></label>
								<span style="float: right;"><?php echo rupiah($nota['total_order']); ?></span>
							</li>
							<li class="list-group-item">
								<label><strong>Status:</strong></label>
								<span style="float: right;"><?php
								if ($nota['status_order']==0) { ?>
								<span  class="badge badge-danger">Belum Transaksi</span>
								<?php }
								else if ($nota['status_order']=="201") { ?>
								<span class="badge badge-warning">Pending</span>
								<?php }
								else if ($nota['status_order']=="200") { ?>
								<span class="badge badge-success">Lunas</span>
								<?php }
								else if ($nota['status_order']=="1") { ?>
								<span class="badge badge-primary">dikemas</span>
								<?php }
								elseif($nota['status_order']=="2"){?>
								<span class="badge badge-secondary text-dark">Selesai</span>
								<?php }
								elseif($nota['status_order']=="407") { ?>
								<span class="badge badge-dark">Kadaluarsa</span>
								<?php } ?>
							</span>
						</li>
						<?php if ($nota['status_order']=='200') { ?>
						<li class="list-group-item">
							<?php echo form_open('sistem/status')?>
							<div class="form-group">
								<input type="hidden" name="id_order" value="<?php echo $nota['id_order']?>">
								<label><strong>Ubah Status</strong></label>
								<select name="status_order" class="form-control">
									<option value="">Pilih Status</option>
									<option value="1">Dikemas</option>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin')" name="proses">Proses</button>
							</div>
							<?php echo form_close();?>
						</li>
						<?php }
						elseif($nota['status_order']=='1'){ ?>
						<li class="list-group-item">
							<?php echo form_open('sistem/status')?>
							<div class="form-group">
								<input type="hidden" name="id_order" value="<?php echo $nota['id_order']?>">
								<label><strong>Ubah Status</strong></label>
								<select name="status_order" class="form-control">
									<option value="">Pilih Status</option>
									<option value="2">Selesai</option>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin')" name="proses">Proses</button>
							</div>
							<?php echo form_close();?>
						</li>
						<?php } ?>
					</ul>

				</div>
				<div class="col-lg-6">
					<h3>Pelanggan</h3>
					<ul class="list-group">
						<li class="list-group-item">
							<label><strong>Nama:</strong></label>
							<span style="float: right;"><?php echo $nota['nama_order']?></span>
						</li>
						<li class="list-group-item">
							<label><strong>Email:</strong></label>
							<span></span>
							<span style="float: right;"><?php echo $nota['email_pelanggan']?></span>
						</li>
						<li class="list-group-item">
							<label><strong>Nomor Telepon:</strong></label>
							<span style="float: right;"><?php echo $nota['telp_order']?></span>
						</li>
						<li class="list-group-item">
							<label><strong>Alamat:</strong></label>
							<span style="float: right;width: 30%;word-wrap:break-word;white-space: normal;"><?php echo $nota['alamat_order'].', '.$nota['tipe'].' '.$nota['distrik'].', '.$nota['provinsi'].', '.$nota['kodepos_pengiriman']?></span>
						</li>
					</ul>
				</div>
			</div>
			<?php }?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Nama Produk</th>
							<th>Jenis Produk</th>
							<th>Detail</th>
							<th>Jumlah Pesan</th>
							<th>Harga Produk</th>
							<th>Sub-Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($tpesan as $tpesan) { ?>
						<tr>
							<td class="py-1"><?php echo $no;?></td>
							<td class="isotope-item"><a class="btn-show-gallery" href="<?php echo base_url()?>images/menu/<?php echo $tpesan['gambar_menu'] ?>" data-lightbox="menu"><img src="<?php echo base_url()?>images/menu/<?php echo $tpesan['gambar_menu'];?>"></a></td>
							<td><?php echo $tpesan['nama_produk'];?></td>
							<td><?php echo $tpesan['jenis_produk'];?></td>
							<td><?php echo $tpesan['deskripsi'] ?></td>
							<td><?php echo $tpesan['jumlah_order'] ?></td>
							<td><?php echo $tpesan['harga_produk'] ?></td>
							<td><?php echo $tpesan['sub_harga'] ?></td>
						</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
			<br>
			<a href="<?php echo base_url()?>sistem/pesanan" class="btn btn-primary"><i class="fa fa-table"></i> Lihat Semua Pemesanan</a>&nbsp;
			<?php if ($nota['status_order'] == '200' || $nota['status_order'] == '1' || $nota['status_order'] == '2'): ?>
				<a href="<?php echo base_url()?>sistem/pembayaran/<?php echo $nota['id_order']?>" class="btn btn-success"><i class="fa fa-money"></i> Lihat Pembayaran</a>
			<?php endif ?>
		</div>
	</div>
</div>
</div>