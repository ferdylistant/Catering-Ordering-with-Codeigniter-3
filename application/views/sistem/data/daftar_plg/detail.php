<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center "style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
        <li>
         <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" >
          <i class="mdi mdi-home"></i> Home
        </a>
        <i class="mdi mdi-arrow-right"></i>
      </li>
      <li>
       <a href="<?php echo base_url();?>sistem/daftar_plg" class="mt-2 text-dark">Daftar Pelanggan</a>
     </li>
   </ul>
 </span>           					
</div>				
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">	
      <h4 class="card-title"><i class="fa fa-users"></i> DETAIL PELANGGAN</h4>                  
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="thumbnail" >            
              <div class="isotope-item" style="box-shadow:111.35s;" >
                <?php foreach ($plg_detail->result_array() as $value) {}?>
                <?php if ($value['poto_profil']==''){ ?>
                <a class="btn-show-gallery" href="<?php echo base_url()?>upload/profil/user.jpg ?>" data-lightbox="menu">
                  <img src="<?php echo base_url()?>upload/profil/user.jpg" alt="<?php echo $value['nama_pelanggan'];?>" class="img-responsive img-thumbnail" style="height: 215px;margin-top: 5px"></a>
                  <?php }
                  else{ ?>
                  <a class="btn-show-gallery" href="<?php echo base_url()?>images/pelanggan/<?php echo $value['poto_profil'] ?>" data-lightbox="menu">
                    <img src="<?php echo base_url()?>upload/pelanggan/<?php echo $value['poto_profil']?>" alt="<?php echo $value['nama_pelanggan'];?>" class="img-responsive img-thumbnail" style="height: 215px;margin-top: 5px"></a>
                    <?php } ?>
                  </div>
                </div> 
              </div>
              <div class="col-lg-9">
                <table class="table table-striped table-bordered table-hover" id="table" style="width: 100%;height: 210px">
                  <tr>
                    <td><strong>Nama</strong></td>
                    <td><?php echo $value['nama_pelanggan'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td><?php echo $value['email_pelanggan'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Alamat</strong></td>
                    <td><?php echo $value['alamat_pelanggan'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Telepon</strong></td>
                    <td><?php echo $value['telp_pelanggan'];?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div> <br><hr style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="row">
            <div class="col-lg-12">
              <label for="Riwayat Pemesanan">Riwayat Pemesanan</label>
              <table class="table table-striped table-hover table-responsive" id="table" style="width:100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal Pemesanan</th>
                    <th class="text-center">Tanggal Dibutuhkan</th>
                    <th class="text-center">Jam Dibutuhkan</th>
                    <th class="text-center">Total Pemesanan</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $key=0;
                  foreach ($order_detail->result_array() as $nothing) {}?>
                  <?php if (empty($nothing['id_order'])){ ?>
                  <tr>
                    <td colspan="7" class="alert alert-info bg-white text-danger"><h5 align="center">Pelanggan belum melalukan pemesanan</h5></td>
                  </tr>
                  <?php }
                  else { ?>
                  <?php foreach ($order_detail->result_array() as $tampil) {?>
                  <tr>
                    <td class="text-center"><?php echo $key+=1; ?></td>
                    <td class="text-center"><p style="width: 90%;white-space: normal;"><?php echo format_hari_tanggal_jam($tampil['tgl_order_masuk']); ?></p></td>
                    <td class="text-center"><?php echo format_hari_tanggal($tampil['tgl_perlu']); ?></td>
                    <td class="text-center"><?php echo $tampil['jam_perlu']; ?></td>
                    <td class="text-center">Rp. <?php echo number_format($tampil['total_order']) ?></td>
                    <td class="text-center"><?php
                    if ($tampil['status_order']==0) { ?>
                    <span  class="badge badge-danger">Belum Transaksi</span>
                    <?php }
                    else if ($tampil['status_order']=="201") { ?>
                    <span class="badge badge-warning">Pending</span>
                    <?php }
                    else if ($tampil['status_order']=="200") { ?>
                    <span class="badge badge-success">Lunas</span>
                    <?php }
                    elseif ($tampil['status_order']=="1") { ?>
                    <span class="badge badge-primary">dikemas</span>
                    <?php }
                    elseif ($tampil['status_order']=="2") { ?>
                    <span class="badge badge-secondary">Selesai</span>
                    <?php } 
                    elseif($tampil['status_order']=="407") { ?>
                    <span class="badge badge-dark">Kadaluarsa</span>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>