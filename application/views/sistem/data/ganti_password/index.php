         
<div class="col-12 stretch-card">
  <div class="card">
    <div class="card-body"style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <h4 class="card-title"><i class="fa fa-edit"></i> Ubah Password</h4>
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

      <?php 

      if ($this->session->flashdata('salah')){
        echo "<div class='alert alert-danger'>
        <span>Current Password is Wrong!</span>  
        </div>";
      }
      else if($this->session->flashdata('tidaksama')){

        echo "<div class='alert alert-danger'>
        <span>New Password and Your Confirm Password is Wrong!</span>  
        </div>";

      }

      else if($this->session->flashdata('sukses')){

        echo "<div class='alert alert-success'>
        <span>New Password Saved!</span>  
        </div>";
        echo "<meta http-equiv='refresh' content='1;url=ganti_password'>";

      }

      ?>
      <?php echo form_open('sistem/ganti_password_update/','class="forms-sample"'); ?>
      <div class="form-group row">
        <label for="inputPassLama" class="col-sm-3 col-form-label">Current Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="password_lama" id="inputPassLama" placeholder="Current Password">
          <span id="password_lama"  class="required"></span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputNpass" class="col-sm-3 col-form-label">New Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="password_baru" id="inputNpass" placeholder="New Password">
          <span id="password_baru"  class="required"></span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputCpass" class="col-sm-3 col-form-label">Confirm Password</label>
        <div class="col-sm-9">
         <input type="password" class="form-control" name="password_konfirmasi" id="inputCpass" placeholder="Confirm New Password">
         <span id="konfirmasi_password"  class="required"></span>
       </div>

     </div>

     <input type="submit" name="submit" class="btn btn-success mr-2" value="Change">
     <butoon type="button" class="btn btn-dark" onclick="goBack()">Cancel</butoon>


     <?php echo form_close();?>

   </div>
 </div>
</div>