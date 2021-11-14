<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="<?php echo base_url();?>sistem/home">
      <img style="height: 30px" src="<?php echo base_url();?>images/logokj/logokj1.png" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="<?php echo base_url();?>images/logokj/logokj11.png" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
      <li class="nav-item">
       <a class="nav-link" href="#" onclick="openFullscreen();"><i class="menu-icon fa fa-arrows-alt"></i>Full Screen</a>
      </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <?php $hasil = $this->sistem_model->NotifNewOrder();
              $total = $hasil->num_rows()?>
              <?php if (empty($total)) { ?>

              <?php } 
              else{ ?>
                <span class="count"><?php echo $total?></span>
              <?php } ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <?php 
              $ambil = $this->sistem_model->NotifNewOrderAll();
              $jumlah_semua = $ambil->num_rows();?>

              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have <?php echo $jumlah_semua;?> total orders
                </p>
                <a href="<?php echo base_url()?>sistem/pesanan" class="badge badge-info badge-pill float-right">View all</a>
              </div>
              <?php foreach ($hasil->result_array() as $value) {?>
                <div class="dropdown-divider" ></div>
                <a class="dropdown-item preview-item" href="<?php echo base_url()?>sistem/nota/<?php echo $value['id_order']?>">

                  <div class="preview-thumbnail">
                    <?php if (empty($value['poto_profil'])) { ?>
                      <img src="<?php echo base_url();?>images/user.jpg" alt="<?php echo $value['nama_order']?>" class="profile-pic">
                    <?php }
                    else{?>
                      <img src="<?php echo base_url();?>images/pelanggan/<?php echo $value['poto_profil']?>" alt="image" class="profile-pic">
                    <?php }?>

                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $value['nama_order'] ?>
                  </h6>

                  <?php
                  if ($value['status_order']==0) { ?>
                    <span  class="badge badge-danger font-weight-light small-text" style="margin-left: -1px">Belum melakukan aksi pembayaran</span>
                  <?php }
                  else if ($value['status_order']=="1") { ?>
                    <span class="badge badge-primary font-weight-light small-text" style="margin-left: -1px">Barang Dikemas</span>
                  <?php }
                  else if ($value['status_order']=="2") { ?>
                    <span class="badge badge-secondary font-weight-light small-text" style="margin-left: -1px">Pemesanan Selesai</span>
                  <?php }
                  elseif ($value['status_order']=="200") { ?>
                    <span class="badge badge-success font-weight-light small-text" style="margin-left: -1px">Pemabayaran Lunas</span>
                  <?php }
                  elseif ($value['status_order']=="201") { ?>
                    <span class="badge badge-warning font-weight-light small-text" style="margin-left: -1px">Belum Transfer Pembayaran</span>
                  <?php }
                  elseif ($value['status_order']=="407") { ?>
                    <span class="badge badge-dark font-weight-light small-text" style="margin-left: -1px">Kadaluarsa, melewati<br>batas pembayaran</span>
                  <?php }
                  ?>
                </div>
                </a><?php } ?>
              </div>

            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">           
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text">Hello, <?php echo $this->session->userdata('nama_admin');; ?></span>
                <?php
                $id = $this->session->userdata('id_admin');
                $grup = $this->session->userdata('username_admin');
                $auth = $this->db->get_where('tbl_admin',['id_admin' => $id, 'username_admin' => $grup] )->row_array();
                if ($auth['foto']==''): ?>
                <img class="img-xs rounded-circle" src="<?php echo base_url();?>images/user.jpg" alt="Profile image">
                <?php else: ?>
                  <img class="img-xs rounded-circle" src="<?php echo base_url();?>images/admin/<?php echo $auth['foto']?>" alt="Profile image">
                  <?php endif ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a href="<?php echo base_url();?>sistem/profil" class="dropdown-item">
                  Profil
                </a>
                <a href="<?php echo base_url();?>sistem/ganti_password" class="dropdown-item">
                  Change Password
                </a>
                <a href="<?php echo base_url();?>sistem/logout" class="dropdown-item" id="keluar">
                  Sign Out
                </a>     
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

