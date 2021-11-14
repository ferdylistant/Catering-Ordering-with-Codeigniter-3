
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center " style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
        <li>

          <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
          <i class="mdi mdi-arrow-right"></i>
        </li>
        <li>
          <a href="<?php echo base_url();?>sistem/pembayaran" class="mt-2 text-dark">Data Pembayaran</a>
        </li>
      </ul></span> 
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <h4 class="card-title"><i class="menu-icon fa fa-money"></i> DATA PEMBAYARAN</h4>
          <p class="card-description">

            <hr>
          </p>
          <table class="table table-striped table-bordered table-hover" id="table" >
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Pemesanan</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tipe Pembayaran</th>
                <th class="text-center">Waktu Pembayaran</th>
                <th class="text-center">Total Transaksi</th>
                <th class="text-center">Currency</th>
                <th class="text-center">Bank</th>
                <th class="text-center">VA Number</th>
                <th class="text-center">Kode Pembayaran</th>
                <th class="text-center">Fraud Status</th>
                <th class="text-center">Download PDF</th>
                <th class="text-center">Status Order</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              foreach ($pembayaran->result_array() as $tampil) { ?>
                <tr>
                  <td class="text-center"><?php echo $no;?></td>
                  <td class="text-center"><?php echo $tampil['id_order'];?></td>
                  <td class="text-center"><?php echo $tampil['nama_order'];?></td>
                  <td class="text-center"><?php echo $tampil['tipe_pembayaran'];?></td>
                  <td class="text-center"><?php echo format_hari_tanggal_jam($tampil['waktu_transaksi']);?></td>
                  <td class="text-center"><?php echo rupiah($tampil['total_transaksi']);?></td>
                  <td class="text-center"><?php echo $tampil['currency'];?></td>
                  <td class="text-center"><?php echo $tampil['bank'];?></td>
                  <td class="text-center"><?php echo $tampil['va_number'];?></td>
                  <td class="text-center" style="width: 100%; word-wrap:break-word;white-space: normal;"><?php echo $tampil['id_transaksi'];?></td>
                  <td class="text-center"><?php echo $tampil['fraud_status'];?></td>
                  <td class="text-center"><a href="<?php echo $tampil['pdf_url']?>" target="_blank"><i class="menu-icon fa fa-download"></i></a></td>
                  <?php if ($tampil['status_order'] == '200') { ?>
                  <td class="text-center"><span class="badge badge-success">Lunas</span></td>
                <?php }
                elseif($tampil['status_order'] == '1'){ ?>
                  <td class="text-center"><span class="badge badge-primary">Dikemas</span></td>
                <?php }
                elseif ($tampil['status_order'] == '2') { ?>
                  <td class="text-center"><span class="badge badge-secondary text-dark">Selesai</span></td>
              <?php } ?>
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