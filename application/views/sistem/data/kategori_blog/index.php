<div class="row purchace-popup">
	<div class="col-lg-12">
		<span class="d-block d-md-flex align-items-center text-center " style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
			<ul class="breadcrumb py-0">
				<li>
					<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
					<i class="mdi mdi-arrow-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>sistem/kategori_blog" class="mt-2 text-dark">Kategori Blog</a>
				</li>
			</ul>
		</span>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
				<h4 class="card-title"><i class="fa fa-table"></i> KATEGORI BLOG</h4>
				<?php 
				if ($this->session->flashdata('hapus')){
					echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
					<span>Kategori Blog Delete</span>  
					</div>";

				}
				else if($this->session->flashdata('berhasil')){
					echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
					<span>Kategori blog Save</span>  
					</div>";
					echo "<meta http-equiv='refresh' content='1;url=kategori_blog'>";
				}
				else if($this->session->flashdata('update')){
					echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
					<h6>Kategori blog update</h6>  
					</div>";
					redirect(base_url('sistem/kategori_blog'));
				}
				else if($this->session->flashdata('ada')){
					echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
					<span>Kategori Blog Exist</span>  
					</div>";
				}?>
				<p class="card-description">
					<a class="btn btn-success btn-block" href="<?php echo base_url();?>sistem/kategori_blog_tambah">Add<i class="mdi mdi-plus"></i></a>
					<hr>
				</p>
				<table class="table table-striped table-bordered table-hover" id="table" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">No</th>								
							<th class="text-center">Nama Kategori Blog</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
						foreach ($kategori_blog->result_array() as $tampil) { ?>
							<tr>
								<td class="text-center"><?php echo $no;?></td>
								<td class="text-center"><?php echo $tampil['nama_kategoriblog'];?></td>
								<td class="text-center">
									<a class="btn btn-outline-primary" href="<?php echo base_url();?>sistem/kategori_blog_edit/<?php echo $tampil['id_kategoriblog'];?>">
										<i class="fa fa-edit"></i>
									</a> 
									&nbsp;
									<a class="btn btn-outline-danger hapus-kategori-blog" href="<?php echo base_url();?>sistem/kategori_blog_delete/<?php echo $tampil['id_kategoriblog'];?>"> <i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
							<?php $no++;}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>