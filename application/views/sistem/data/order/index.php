
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center " style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
        <li>

          <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
          <i class="mdi mdi-arrow-right"></i>
        </li>
        <li>
          <a href="<?php echo base_url();?>sistem/pesanan" class="mt-2 text-dark">Semua Pemesanan</a>
        </li>
      </ul></span> 
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <h4 class="card-title"><i class="menu-icon fa fa-shopping-cart"></i> SEMUA PEMESANAN</h4>
          <p class="card-description">

            <hr>
          </p>
          <table class="table table-striped table-bordered table-hover" id="table" >
            <thead>
              <tr>
                <th class="text-center">No</th>               
                <th class="text-center">Kode Pemesanan</th>               
                <th class="text-center">Nama Pemesan</th>
                <th class="text-center">Tanggal Pemesanan</th>
                <th class="text-center">Tanggal Perlu</th>
                <th class="text-center">Status</th>
                <th class="text-center">Rincian</th>       
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              
              foreach ($order->result_array() as $tampil) { ?>
                <tr>
                  <td class="text-center"><?php echo $no;?></td>
                  <td class="text-center"><?php echo $tampil['id_order'];?></td>
                  <td class="text-center"><?php echo $tampil['nama_order'];?></td>
                  <td class="text-center"><?php echo format_hari_tanggal_jam($tampil['tgl_order_masuk']);?></td>
                  <td class="text-center"><?php echo format_hari_tanggal($tampil['tgl_perlu']);?>, Pukul <?php echo $tampil['jam_perlu'] ?></td>
                  <td class="text-center"><?php
                  if ($tampil['status_order']==0) { ?>
                    <span  class="badge badge-danger">Belum Transaksi</span>
                  <?php }
                  else if ($tampil['status_order']=="201") { ?>
                    <span class="badge badge-warning">Pending</span>
                  <?php }
                  elseif ($tampil['status_order']=="200") { ?>
                    <span class="badge badge-success">Lunas</span>
                  <?php }
                  elseif($tampil['status_order']=="1"){?>
                    <span class="badge badge-primary">Dikemas</span>
                  <?php }
                  elseif($tampil['status_order']=="2"){ ?>
                  <span class="badge badge-secondary text-dark">Selesai</span>
                  <?php }
                  elseif($tampil['status_order']=="407") { ?>
                    <span class="badge badge-dark">Kadaluarsa</span>
                  <?php } ?>
                </td>
                <td>
                  <a  class="badge badge-primary" href="<?php echo base_url();?>sistem/nota/<?php echo $tampil['id_order'];?>">Nota</a>
                  <?php if ($tampil['status_order']=='200' || $tampil['status_order']=='1' || $tampil['status_order']=='2'){ ?>
                    <a  class="badge badge-success" href="<?php echo base_url();?>sistem/pembayaran/<?php echo $tampil['id_order'];?>">Pembayaran</a>
                  <?php }
                  elseif($tampil['status_order']=='407'){ ?>
                    <a class="btn btn-outline-danger hapus-pesanan" href="<?php echo base_url();?>sistem/pesanan_delete/<?php echo $tampil['id_order'];?>"> <i class="fa fa-times"></i></a>
                  <?php } ?>
                </td>
              </tr>
              <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>