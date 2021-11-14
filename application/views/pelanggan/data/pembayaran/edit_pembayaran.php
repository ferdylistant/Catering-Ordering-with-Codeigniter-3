<?php foreach ($pemesanan->result_array() as $pemesanan) { } ?>
<?php foreach ($pembayaran->result_array() as $pembayaran) {}?>
<section class="section-dinner p-t-25 p-b-170 bg1-pattern">
  <div class="bo5-b p-t-73 p-b-17"></div>
  <div class="container">
   <div class="row">
    <div class=" p-t-50 wrap-item-mainmenu p-b-300">
     <h3 class="tit-mainmenu tit10 p-b-35 m-l-16"><img src="<?php echo base_url('images/icons/png/010-paymentmethod.png') ?>" style="width: 40px;">PELUNASAN PEMBAYARAN</h3>
   </div>
 </div>
 <?php
 if ($pembayaran['nominal_pembayaran'] < $pemesanan['total_order']) {?>
   <div class="row bg-white" style="border-radius: 10px">
    <div class="col-lg-6 p-b-30 p-t-18">
     <p class="p-b-10">Berikut adalah riwayat pemesanan dan pembayaran Anda</p>
     <table class="table table-bordered">
       <tr>
        <td>
         KODE PEMESANAN
       </td>
       <td>
         KJ<?php echo $pemesanan['id_order']?>
       </td>
     </tr>
     <tr>
      <td>
       Nama Pemesan
     </td>
     <td>
       <?php echo $pemesanan['nama_order']?>
     </td>
   </tr>
   <tr>
    <td>
     Nomor Telepon Pemesan
   </td>
   <td>
     <?php echo $pemesanan['telp_order']?>
   </td>
 </tr>
 <tr>
  <td>
   Alamat Pemesan
 </td>
 <td>
   <?php echo $pemesanan['alamat_order']?>
 </td>
</tr>
<tr>
  <td>
   Tanggal Pemesanan
 </td>
 <td>
   <?php echo tgl_indo($pemesanan['tgl_order_masuk'])?>
 </td>
</tr>
<tr>
  <td>
   Tanggal Keperluan
 </td>
 <td>
   <?php echo tgl_indo($pemesanan['tgl_perlu'])?> <?php echo $pemesanan['jam_perlu']?>
 </td>
</tr>
<tr>
  <td>
   Total Pemesanan
 </td>
 <td>
   <?php echo rupiah($pemesanan['total_order'])?>
 </td>
</tr>
<tr>
  <td>
    Nominal Pembayaran DP
  </td>
  <td>
    <?php echo rupiah($pembayaran['nominal_pembayaran'])?>
  </td>
</tr>
<tr>
  <td>
    Nominal Pelunasan
  </td>
  <td>
    <?php $pelunasan=$pemesanan['total_order']-$pembayaran['nominal_pembayaran'];?>
    <?php echo rupiah($pelunasan)?>
  </td>
</tr>
<tr>
  <td>
   Status
 </td>
 <td>
   <?php
   if ($pemesanan['status_order']==0) { ?>
    <span  class="badge badge-danger">Belum Membayar</span>
  <?php }
  else if ($pemesanan['status_order']=="1") { ?>
    <span class="badge badge-warning">Menunggu Konfirmasi Admin</span>
  <?php }
  else if ($pemesanan['status_order']=="2") { ?>
    <span class="badge badge-info">Dalam Proses</span>
  <?php }
  elseif ($pemesanan['status_order']=="3") { ?>
    <span class="badge badge-success">Lunas</span>
  <?php }
  elseif($pemesanan['status_order']=="4"){?>
    <span class="badge badge-secondary">Selesai</span>
  <?php }
  elseif($pemesanan['status_order']=="5") { ?>
    <span class="badge badge-dark">Pelunasan</span>
  <?php }
  ?>
</td>
</tr>
<tr>
  <td>
   Batas Pelunasan
 </td>
 <td>
   <?php echo tgl_indo($pemesanan['deadline_pembayaran'])?>
 </td>
</tr>
</table>
</div>
<div class="col-lg-6 p-b-30 p-t-48">
  <form method="post" enctype="multipart/form-data" class="wrap-form-booking">
    <div class="row">
     <span class="m-l-130 m-b-10 tit7"><img src="<?php echo base_url('images/icons/png/016-EDC.png') ?>" style="width: 40px;">Metode Pembayaran:</span>
      <table class="table m-l-30" style="width: 510px">
        <tr>
          <td>
           <?php foreach ($rek->result_array() as $rek) { ?>
            <img style="width: 100px;" src="<?php echo base_url()?>images/rekening/<?php echo $rek['gambar']?>">
          <?php } ?>
        </td>
      </tr>
    </table>
    <div class="col-md-12">

      <!-- People -->
      <span class="txt9">
        Pembayaran ke rekening
      </span>
      <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
        <!-- Select2 -->
        <select class="selection-1" name="id_rekening">
          <option selected="selected">Pilih Rekening Tujuan</option>
          <?php foreach ($rekening->result_array() as $rekening) {
           if ($id_rekening==$rekening['id_rekening']) { ?>
            <option value="<?php echo $rekening['id_rekening'];?>" >BANK <?php echo $rekening['nama_bank'];?> (No Rekening <?php echo $rekening['nomor_rekening']?> A.N <?php echo $rekening['nama_pemilik']?>)
            </option>
          <?php }
          else { ?>
            <option value="<?php echo $rekening['id_rekening'];?>">BANK <?php echo $rekening['nama_bank'];?> (No Rekening <?php echo $rekening['nomor_rekening']?> A.N <?php echo $rekening['nama_pemilik']?>)</option>
          <?php }
        } ?>
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <!-- Date -->
    <span class="txt9">
      Tanggal Pembayaran
    </span>

    <div class="pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
      <input class="bo-rad-10 sizefull txt10 p-l-20" type="date" name="tgl_pembayaran">
      <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
    </div>

    <!-- Bank Pelanggan -->
    <span class="txt9">
      Dari Bank
    </span>

    <div class="wrap-inputtime pos-relative size12 bo2 bo-rad-10 m-t-3 m-b-23">
      <!-- Select2 -->
      <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="bank" placeholder="Nama bank anda">
    </div>
    <!-- Nominal Pembayaran Pelanggan -->
    <span class="txt9">
      Nominal Pembayaran
    </span>

    <div class="wrap-inputtime pos-relative size12 bo2 bo-rad-10 m-t-3 m-b-23">
      <!-- Select2 -->
      <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="nominal_pembayaran" placeholder="Nominal Pembayaran">
    </div>
  </div>

  <div class="col-md-6">
    <!-- No Rekening Pelanggan -->
    <span class="txt9">
      Nomor Rekening
    </span>

    <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
      <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="no_rek" placeholder="Nomor rekening anda">
    </div>

    <!-- Atas Nama -->
    <span class="txt9">
      Atas Nama
    </span>

    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
      <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="atas_nama" placeholder="Atas nama rekening anda">
    </div>
    <!-- Bukti Pembayaran Pelanggan -->
    <span class="txt9">
      Bukti Pembayaran
    </span>

    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
      <input class="sizefull txt10" style="width: 100%;padding-top: 10px" type="file" name="bukti">
    </div>
  </div>
</div>

<div class="wrap-btn-booking flex-c-m m-t-6">
  <!-- Button3 -->
  <button name="kirim" class="btn3 flex-c-m size13 txt11 trans-0-4">
    Bayar&nbsp;&nbsp;<i class="fa  fa-paper-plane-o"></i>
  </button>
</div>
</form>
</div>
<?php 
if (isset($_POST['kirim'])) 
{
  $id_order = $pemesanan['id_order'];
  $this->pelanggan_model->KirimPelunasan($id_order);

}
?>
<div class="col-lg-6 p-b-30" style="margin-top: -100px">
 <ul class="list-group">
  <li class="list-group-item"><img src="<?php echo base_url('images/icons/png/043-email.png') ?>" class="m-l-160" style="width: 27%;opacity: 0.2;position: absolute;"><p style="color: red"><i class="fa  fa-exclamation-circle"></i> CATATAN:</p>Silakan melakukan pelunasan pembayaran sesuai total harga pemesanan, agar segera kami proses. DP minimal 70% dari total pemesanan. Jika kurang dari yang sudah ditetapkan, maka akan kami batalkan. Total pelunasan pembayaran pemesanan Anda senilai: <b><?php echo rupiah($pelunasan)?></b>. Mohon diperhatikan dengan jelas, terimakasih. Ttd KAMPUNG JAWA,Resto.<p><a href="<?php echo base_url()?>syarat_dan_ketentuan" class="btn-link">Syarat & Ketentuan</a></p></li>
</ul>
</div>
</div>

<?php }
else {?>
  <?php redirect(base_url('akun/riwayat_transaksi'));?>
<?php }?>
<?php 
if ($this->session->flashdata('salah')) {
  echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog'>
  <!-- Modal content-->
  <div class='modal-content' role='document'>
  <div class='modal-header'>                        
  <h4 class='modal-title txt24'>Peringatan!</h4>
  <button type='button' class='close' data-dismiss='modal'>&times;</button>
  </div>
  <div class='modal-body'>
  <p>Pembayaran salah, cek kembali total pelunasan Anda!</p>
  </div>           
  </div>
  </div>
  </div>";
}elseif($this->session->flashdata('error')){
  echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog'>
  <!-- Modal content-->
  <div class='modal-content' role='document'>
  <div class='modal-header'>                        
  <h4 class='modal-title txt24'>Peringatan!</h4>
  <button type='button' class='close' data-dismiss='modal'>&times;</button>
  </div>
  <div class='modal-body'>
  <p>Silahkan isi dan lengkapi inputan yang ada!</p>
  </div>           
  </div>
  </div>
  </div>";
}elseif($this->session->flashdata('sukses')){
  echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog'>
  <!-- Modal content-->
  <div class='modal-content' role='document'>
  <div class='modal-header'>                        
  <h4 class='modal-title txt24'>Peringatan!</h4>
  <button type='button' class='close' data-dismiss='modal'>&times;</button>
  </div>
  <div class='modal-body'>
  <p>Terima kasih telah melakukan pelunasan. Silahkan menunggu kami memproses pesanan Anda.</p>
  </div>           
  </div>
  </div>
  </div>";
}elseif($this->session->flashdata('kurang')){
  echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog'>
  <!-- Modal content-->
  <div class='modal-content' role='document'>
  <div class='modal-header'>                        
  <h4 class='modal-title txt24'>Peringatan!</h4>
  <button type='button' class='close' data-dismiss='modal'>&times;</button>
  </div>
  <div class='modal-body'>
  <p>Silakan lakukan Pelunasan!</p>
  </div>           
  </div>
  </div>
  </div>";

}elseif($this->session->flashdata('deadline')){
  echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog'>
  <!-- Modal content-->
  <div class='modal-content' role='document'>
  <div class='modal-header'>                        
  <h4 class='modal-title txt24'>Peringatan!</h4>
  <button type='button' class='close' data-dismiss='modal'>&times;</button>
  </div>
  <div class='modal-body'>
  <p>Lakukan pelunasan pembayaran sesuai batas tanggal yang ditentukan!</p>
  </div>           
  </div>
  </div>
  </div>";

} ?>

</div>
</section>




