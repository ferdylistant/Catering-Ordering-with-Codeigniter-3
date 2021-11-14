<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <?php
            $id = $this->session->userdata('id_admin');
            $grup = $this->session->userdata('username_admin');
            $auth = $this->db->get_where('tbl_admin',['id_admin' => $id, 'username_admin' => $grup] )->row_array();
            if ($auth['foto']==''): ?>
            <img class="rounded-circle" src="<?php echo base_url();?>images/user.jpg" alt="profile image">
          <?php else: ?>
            <img class="img-xs rounded-circle" src="<?php echo base_url();?>images/admin/<?php echo $auth['foto']?>" alt="profile image">
          <?php endif ?>
        </div>
        <div class="text-wrapper">

          <p class="profile-name"><?php echo $this->session->userdata('nama_admin');?></p>
          <div>
            <small class="designation text-muted"><?php echo $this->session->userdata('nama_admin_group');?></small>
            <span class="status-indicator online"></span>
          </div>
        </div>
      </div>

    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url();?>sistem/home">
      <i class="menu-icon fa fa-dashboard"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="galeri">
      <i class="menu-icon mdi mdi-television"></i>
      <span class="menu-title">Master Data</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="master">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>sistem/daftar_plg">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-title">Daftar Pelanggan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>sistem/menu">
            <i class="menu-icon fa fa-list-alt"></i>
            <span class="menu-title">Menu</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>sistem/galeri">
            <i class="menu-icon fa fa-image"></i>
            <span class="menu-title">Semua Galeri</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>sistem/chatbot">
            <i class="menu-icon fa fa-weixin"></i>
            <span class="menu-title">Settings Chatbot</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url();?>sistem/saran" class="nav-link">
            <i class="menu-icon fa fa-comments-o"></i>
            <span class="menu-title">Kritik & Saran</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="galeri">
      <i class="menu-icon fa fa-barcode"></i>
      <span class="menu-title">Transaksi</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="transaksi">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>sistem/pesanan">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-title">Pemesanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>sistem/pembayaran"><i class="menu-icon fa fa-money"></i><span class="menu-title">Pembayaran</span></a>
        </li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url();?>sistem/backup_db">
      <i class="menu-icon fa fa-database"></i>
      <span class="menu-title">Backup Database</span>
    </a>
    <i class="menu-arrow"></i>
  </a>
</li>
</ul>
</nav>