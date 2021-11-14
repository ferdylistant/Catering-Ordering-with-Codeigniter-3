<div class="row purchace-popup">
	<div class="col-12">
		<span class="d-block d-md-flex align-items-center text-center "style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
			<ul class="breadcrumb py-0">
				<li>
					<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
					<i class="mdi mdi-arrow-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>sistem/saran" class="mt-2 text-dark">Kritik & Saran</a>
				</li>
			</ul></span>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
					<h4 class="card-title"><i class="menu-icon fa  fa-comments-o"></i> KRITIK & SARAN</h4>
					<p class="card-description">

						<hr>
					</p>
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="table" >
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Email</th>
								<th class="text-center">No Telepon</th>
								<th class="text-center">Saran/Kritik</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$no=1;
							foreach ($saran->result_array() as $tampil) { ?>
								<tr >
									<td><?php echo $no;?></td>
									<td><?php echo $tampil['nama_saran'];?></td>
									<td><?php echo $tampil['email_saran'];?></td>
									<td><?php echo $tampil['telp_saran'];?></td>
									<td><p style="text-overflow: ellipsis;white-space: normal;"><?php echo $tampil['isi_saran'];?></p></td>
								</tr>
								<?php
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>