
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="clearfix">
          <?php $p = $this->sistem_model->Admin();
          foreach ($p->result_array() as $profil) {
             # code...
          } ?>
          <h3>Selamat datang, <?php echo $profil['nama_admin']; ?>!</h3>
          <p>Anda login sebagai administrator. Anda memiliki akses penuh terhadap sistem.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Menu</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo $menu; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url()?>sistem/menu" class="btn btn-inverse-dark btn-fw"><i class="fa fa-eye menu-icon"> </i>Selengkapnya</a>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" >
    <div class="card card-statistics">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Pemesanan</p> 
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo $pemesanan; ?></h3>
            </div>
          </div> 
        </div>
      </div>
      <a href="<?php echo base_url()?>sistem/pesanan" class="btn btn-inverse-dark btn-fw"><i class="fa fa-eye menu-icon"> </i>Selengkapnya</a>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-poll-box text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Terjual</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo $terjual?></h3>
            </div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url()?>sistem/pembayaran" class="btn btn-inverse-dark btn-fw"><i class="fa fa-eye menu-icon"> </i>Selengkapnya</a>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-account-location text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Pelanggan</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo $pelanggan?></h3>
            </div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url()?>sistem/daftar_plg" class="btn btn-inverse-dark btn-fw"><i class="fa fa-eye menu-icon"> </i>Selengkapnya</a>
    </div>
  </div>
</div>

