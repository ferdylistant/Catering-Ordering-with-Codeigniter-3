<div class="row purchace-popup">
  <div class="col-12">
   <span class="d-block d-md-flex align-items-center text-center " style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
     <ul class="breadcrumb py-0">
      <li>
       <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
       <i class="mdi mdi-arrow-right"></i>
     </li>
     <li>
       <a href="<?php echo base_url();?>sistem/menu" class="mt-2 text-dark">Menu</a>
     </li>
   </ul>
 </span>
</div>
<div class="col-12 grid-margin">
 <div class="card">
   <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
     <h4 class="card-title"><i class="fa fa-list-alt"></i> ADD MENU</h4>
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
  <?php echo form_open_multipart('sistem/menu_simpan/','class="form-horizontal"'); ?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Jenis</label>
        <div class="col-sm-9">
          <select data-placeholder="Select..." name="jenis_menu_id" class="form-control select2me" value="<?php echo set_value('jenis_menu_id') ?>">
            <option value=""></option>
            <?php foreach ($jenis_menu->result_array() as $tampil) { ?>
            <option value="<?php echo $tampil['id_jenis_menu'];?>"><?php echo $tampil['jenis_menu'];?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Menu</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="" name="nama_menu" value="<?php echo set_value('nama_menu') ?>">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Harga Menu</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="" name="harga_menu" value="<?php echo set_value('harga_menu') ?>">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Detail Menu</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="" name="detail_menu" value="<?php echo set_value('detail_menu') ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="row">                      
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gambar</label>
        <div class="col-sm-9">
          <input type="file" onchange="readURL(this);" name="userfile">
          <img id="blah" src="" class="rounded" style="width: 220px">
        </div>                          
      </div>
    </div>
  </div>
  <div class="row">                   
    <div class="col-md-6">
      <span class="label label-important"><b>NOTE!</b></span>
      <span>File hanya boleh dalam format jpg,png,jpeg dengan max size 10 MB</span>           
    </div>
  </div>

  <div class="py-3">
   <input type="submit" name="submit" class="btn btn-success mr-2 simpan-menu" value="Save">
   <button class="btn btn-dark" onclick="goBack()">Cancel</button>
 </div>

 <?php echo form_close();?>
</div>
</div>
</div>
</div>

