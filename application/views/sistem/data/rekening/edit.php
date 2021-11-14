<div class="row purchace-popup">
    <div class="col-12">
       <span class="d-block d-md-flex align-items-center text-center "style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        	<ul class="breadcrumb py-0">
				<li>
					<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
					<i class="mdi mdi-arrow-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>sistem/galeri" class="mt-2 text-dark">Rekening</a>
				</li>
			</ul> 
		</span>
    </div>
<div class="col-12 grid-margin">
    	<div class="card">
        	<div class="card-body"style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            	<h4 class="card-title"><i class="fa fa-image"></i> EDIT REKENING</h4>                  
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
                    <?php echo form_open_multipart('sistem/rekening_update/','class="form-horizontal"'); ?>
                    <input type="hidden" name="id_rekening" value="<?php echo $id_rekening ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Bank</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $nama_bank ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor Rekening</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nomor Rekening" name="nomor_rekening" value="<?php echo $nomor_rekening?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Atas Nama" name="nama_pemilik" value="<?php echo $nama_pemilik?>">
                          </div>
                        </div>
                      </div>
                    </div>
         			<div class="row">                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gambar</label>
                          <div class="col-sm-9">
                          	<input type="file" name="userfile">
                          </div>                          
                        </div>
                      </div>
                    </div>
                    <div class="row">                   
                    	<div class="col-md-6">
                    		<span class="label label-important"><b>NOTE!</b></span>
							<span>File hanya boleh dalam format gif,jpg,png,jpeg dengan max size 3 MB</span>						
                    	</div>
                    </div>
                    <div class="py-3">
                    	<input type="submit" name="submit" class="btn btn-success mr-2" value="Save">
                    	<input type="button" class="btn btn-dark" value="Cancel">
                    </div>
                      
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>