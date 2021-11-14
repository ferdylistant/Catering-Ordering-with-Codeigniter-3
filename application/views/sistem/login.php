<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->sistem_model->cekSes();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Administrator</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>images/logokj/Administrator.png" />
</head>

<body>

  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">

      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">

        <div class="row w-100">

          <div class="col-lg-4 mx-auto">

            <div class="auto-form-wrapper">
              <div class="form-group" style="text-align: center">
                <img style="width: 100px;" src="<?php echo base_url()?>images/logokj/logokj11.png" alt="">
              </div>

              <?php if (validation_errors()) { ?>
              <div class="alert alert-danger">
                <span>Username atau Password kosong!</span>
                <button type="button" class="close" data-dismiss="alert">×</button>
              </div>
              <?php } ?>
              <?php echo form_open('sistem/login','class="login-form"') ?>
              <?php 
              if ($this->session->flashdata('error')) {
                echo "<div class='alert alert-danger'>
                <button class='close' data-close='alert'></button>
                <span>Username atau Password Salah..!</span>
                </div>";
              }
              elseif($this->session->flashdata('gagal')){
                echo "<div class='alert alert-danger'>
                <button class='close' data-close='alert'></button>
                <span>Silahkan login terlebih dahulu..!</span>
                </div>";
                echo "<meta http-equiv='refresh' content='1;url=sistem'>";
              }
              ?>
              <div class="form-group has-feedback">
                <label class="label" for="username_admin">Username</label>
                <div class="input-group">
                  <input type="text" id="usId" oninput="usernameFunction()" class="form-control" name="username_admin" placeholder="Username">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <span class="mdi mdi-check-circle-outline" id="unIcon"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="label" for="password_admin">Password</label>
                <div class="input-group">
                  <input type="password" id="psId" oninput="passwordFunction()" class="form-control" autocomplete="off" name="password_admin" placeholder="*********">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <span class="mdi mdi-check-circle-outline input-group-addon" id="psIcon"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group d-flex justify-content-center">
                <div class="form-check form-check-flat mt-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember_me"> Remember me
                  </label>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
              </div>
              <?php echo form_close(); ?>
              
            </div>
            <p class="footer-text text-center">copyright © 2018 Kampung Jawa. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  

  <!-- plugins:js -->
  <script src="<?php echo base_url();?>asset/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>asset/admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  
  <!-- inject:js -->
  <script src="<?php echo base_url();?>asset/admin/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>asset/admin/js/misc.js"></script>
  <!-- endinject -->
  <script>
    function usernameFunction() {
      var x = document.getElementById("usId").value;
      if (x.length < '5') {
        document.getElementById("unIcon").style.color = "red";      
      }
      else{
        document.getElementById("unIcon").style.color = "#63bc46";
      }
    }
    function passwordFunction() {
      var x = document.getElementById("psId").value;
      if (x.length < '5') {
        document.getElementById("psIcon").style.color = "red";      
      }
      else{
        document.getElementById("psIcon").style.color = "#63bc46";
      }
    }
  </script>

</body>

</html>