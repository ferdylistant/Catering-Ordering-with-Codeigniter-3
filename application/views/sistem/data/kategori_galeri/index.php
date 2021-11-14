<div class="row purchace-popup">
	<div class="col-12">
		<span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
			<ul class="breadcrumb py-0">
				<li>
					<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
					<i class="mdi mdi-arrow-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>sistem/kategori_galeri" class="mt-2 text-dark">Kategori Galeri</a>
				</li>
			</ul>
		</span>           					
	</div>					
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
				<h4 class="card-title"><i class="fa fa-table"></i> KATEGORI GALLERY</h4>
				<?php 
				if ($this->session->flashdata('hapus')){
					echo "<div class='alert alert-danger' align='center'>
					<span>Kategori Galeri Delete</span>  
					</div>";
					echo "<meta http-equiv='refresh' content='1;url=kategori_galeri'>";
				}
				else if($this->session->flashdata('berhasil')){
					echo "<div class='alert alert-success' align='center'>
					<span>Kategori Galeri Save</span>  
					</div>";
					echo "<meta http-equiv='refresh' content='1;url=kategori_galeri'>";
				}
				else if($this->session->flashdata('update')){
					echo "<div class='alert alert-success' align='center'>
					<span>Kategori Galeri Update</span>  
					</div>";
					echo "<meta http-equiv='refresh' content='1;url=kategori_galeri'>";
				}
				else if($this->session->flashdata('ada')){
					echo "<div class='alert alert-danger' align='center'>
					<span>Kategori Galeri Exist</span>  
					</div>";
				}?>
				<p class="card-description">
					<a class="btn btn-success btn-block" href="<?php echo base_url();?>sistem/kategori_galeri_tambah">Add<i class="mdi mdi-plus"></i></a>
					<hr>
				</p>
				<table class="table table-striped table-bordered table-hover" id="table" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">No</th>								
							<th class="text-center">Kategori Galeri</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						foreach ($kategori_galeri->result_array() as $tampil) { ?>
							<tr>
								<td class="text-center"><?php echo $no;?></td>
								<td class="text-center"><?php echo $tampil['nama_kategori_galeri'];?></td>
								<td class="text-center">
									<a class="btn btn-outline-primary" href="<?php echo base_url();?>sistem/kategori_galeri_edit/<?php echo $tampil['id_kategori_galeri'];?>"><i class="fa fa-edit"></i>
									</a>
									&nbsp;
									<a class="btn btn-outline-danger hapus-kategori-galeri" href="<?php echo base_url();?>sistem/kategori_galeri_delete/<?php echo $tampil['id_kategori_galeri'];?>"> <i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
							<?php $no++; }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
