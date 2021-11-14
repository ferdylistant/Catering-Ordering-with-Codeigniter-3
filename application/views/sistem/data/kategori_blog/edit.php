<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
       <li>
        
        <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
        <i class="mdi mdi-arrow-right"></i>
      </li>
      <li>
        <a href="<?php echo base_url();?>sistem/kategori_blog" class="mt-2 text-dark">Kategori Blog</a>
        <i class="mdi mdi-arrow-right"></i>
      </li>
      <li>
        <a href="<?php echo base_url();?>sistem/kategori_blog_edit" class="mt-2 text-dark">Kategori Blog</a>
      </li>
    </ul></span> 
  </div>


  <div class="col-12 stretch-card">
    <div class="card">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <h4 class="card-title"><i class="fa fa-table"></i> KATEGORI BLOG</h4>
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

        <?php echo form_open('sistem/kategori_blog_update/','class="form-horizontal"'); ?>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kategori Blog</label>
          <div class="col-sm-9">
            <input type="hidden" class="form-control" name="id_kategoriblog" value="<?php echo $id_kategoriblog;?>">
            <input type="text" class="form-control" name="nama_kategoriblog" value="<?php echo $nama_kategoriblog;?>">
          </div>
        </div>                      
        <div class="py-3">
          <button type="submit" class="btn btn-success mr-2">Update</button>
          <button type="button" class="btn btn-dark" onclick="goBack()">Cancel</button>
        </div>
        
        
        <?php echo form_close();?>
        
      </div>
    </div>
  </div>
</div>