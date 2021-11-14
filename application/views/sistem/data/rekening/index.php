<div class="row purchace-popup">
            <div class="col-lg-12">
              <span class="d-block d-md-flex align-items-center text-center "style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <ul class="breadcrumb py-0">
					<li>
						
						<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
						<i class="mdi mdi-arrow-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/rekening" class="mt-2 text-dark">Rekening</a>
					</li>
				</ul></span>
            </div>
			
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <h4 class="card-title"><i class="fa fa-credit-card"></i> DATA REKENING</h4>
                  <?php 
				if ($this->session->flashdata('hapus')){
							echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
							<span>Rekening Delete</span>  
							</div>";
							echo "<meta http-equiv='refresh' content='1;url=rekening'>";
				}
				else if($this->session->flashdata('berhasil')){
							echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
							<span>Rekening Save</span>  
							</div>";
				}
				else if($this->session->flashdata('update')){
							echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
							<h6>Rekening Update</h6>  
							</div>";
							echo "<meta http-equiv='refresh' content='1;url=rekening'>";
				}
				else if($this->session->flashdata('ada')){
							echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
							<span>Rekening Exist</span>  
							</div>";
				}
			?>
                  <p class="card-description">
                    <a class="btn btn-success btn-block" href="<?php echo base_url();?>sistem/rekening_tambah">Add<i class="mdi mdi-plus"></i></a>
                    <hr>
                  </p>
							<table class="table table-striped table-bordered table-hover" id="table" >
							<thead>
							<tr>
								<th>No</th>								
								<th>Nama Bank</th>
								<th>Nomor Rekening</th>
								<th>Nama Pemilik</th>
								<th>Gambar</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
											<?php
										$no=1;
										
											foreach ($rekening->result_array() as $tampil) { ?>
										<tr >

											<td class="py-1"><?php echo $no;?></td>											
											<td><?php echo $tampil['nama_bank'];?></td>
											<td><?php echo $tampil['nomor_rekening'];?></td>
											<td><?php echo $tampil['nama_pemilik'];?></td>
											<td><img src="<?php echo base_url()?>images/rekening/<?php echo $tampil['gambar']?>" ></td>
											<td><a class="btn btn-outline-primary" href="<?php echo base_url();?>sistem/rekening_edit/<?php echo $tampil['id_rekening'];?>"><i class="fa fa-edit"></i></a> &nbsp;
											<a class="btn btn-outline-danger" href="<?php echo base_url();?>sistem/rekening_delete/<?php echo 	$tampil['id_rekening'];?>" onclick="return confirm('Yakin Ingin Menghapus: <?php echo $tampil['nama_bank'];?>, <?php echo $tampil['nomor_rekening'];?> A.n.<?php echo $tampil['nama_pemilik'];?>')"> <i class="fa fa-times"></i></a>
										
											</td>
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