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
				</ul></span>
            </div>


		<div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                      <h4 class="card-title"><i class="fa fa-table"></i> TAMBAH KATEGORI GALLERY</h4>
                      <p class="card-description">
                        <hr>
                      </p>
                      <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>

               <?php echo form_open('sistem/kategori_galeri_simpan/','class="form-horizontal"'); ?>
                        <div class="form-group row">
                          <label for="Nama Kategori Gallery" class="col-sm-3 col-form-label">Nama Kategori Gallery</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_kategori_galeri" placeholder="Nama Kategori">
                          </div>
                        </div>                      
                        <input type="submit" name="submit" class="btn btn-success mr-2" value="Save">
                        <a href="<?php echo base_url()?>sistem/kategori_galeri" class="btn btn-dark">Cancel</a>
                        
                        
                      <?php echo form_close();?>
                      
                    </div>
                  </div>
        </div>
    </div>