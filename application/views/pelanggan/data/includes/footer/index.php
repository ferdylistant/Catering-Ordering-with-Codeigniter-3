<?php
$hasil= $this->db->query("SELECT * FROM tbl_tentang_resto");

foreach ($hasil->result_array() as $tampil) {
  $nama_resto       = $tampil['nama_resto'];
  $alamat_resto     = $tampil['alamat_resto'];
  $email_resto      = $tampil['email_resto'];
  $telp_resto       = $tampil['telp_resto'];
  $isi_tentang_resto= $tampil['isi_tentang_resto'];
  $logo             = $tampil['logo'];
}
?>

<footer class="bg1">
  <div class="container p-t-40 p-b-70">
    <div class="row">
      <div class="col-sm-6 col-md-4 p-t-50">
        <!-- - -->
        <h4 class="txt13 m-b-33">
          Contact Us
        </h4>

        <ul class="m-b-70">
          <li class="txt14 m-b-14">
            <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
            <?php echo $alamat_resto;?>
          </li>

          <li class="txt14 m-b-14">
            <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
            <?php echo $telp_resto;?>
          </li>

          <li class="txt14 m-b-14">
            <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
            <?php echo $email_resto;?>
          </li>
        </ul>

        <!-- - -->
        <h4 class="txt13 m-b-32">
          Opening Times
        </h4>

        <ul>
          <li class="txt14">
            09:30 Pagi – 23:00 Malam
          </li>

          <li class="txt14">
            Every Day
          </li>
          <li>
            <?php
            date_default_timezone_set('Asia/Jakarta');
            if (date('H:i') < "09:30" || date('H:i') > "23:00") {
              echo "<span class='badge badge-danger'>Tutup</span>";
            }
            else{
              echo "<span class='badge badge-success'>Buka</span>";
            }?>
          </li>
        </ul>
      </div>

      <div class="col-sm-6 col-md-4 p-t-50">
        <!-- - -->
        <h4 class="txt13 m-b-33">
          Latest blog
        </h4>
        <?php $blog = $this->pelanggan_model->Latest_Blog(); ?>
        <?php foreach ($blog as $blg) { ?>
        <?php $idB = base64_encode($blg['id_blog']); ?>
        <div class="m-b-25">
          <span class="fs-13 color2 m-r-5">
            <i class="fa fa-rss-square" aria-hidden="true"></i>
          </span>
          <a href="<?php echo base_url()?>blog/detail/<?php echo $idB;?>" class="txt15">
            <?= $blg['judul_blog'] ?>
          </a>

          <p class="txt14 m-b-18">
            <?php echo character_limiter($blg['isi_blog'],100) ?>
          </p>

          <span class="txt16">
            <?php echo date('d M Y',strtotime($blg['tgl_input'])) ?>
          </span>
        </div>
        <?php } ?>
      </div>

      <div class="col-sm-6 col-md-4 p-t-50">
        <!-- - -->
        <h4 class="txt13 m-b-38">
          Gallery
        </h4>

        <!-- Gallery footer -->
        <div class="wrap-gallery-footer flex-w">
          <?php
          $query= $this->db->query("SELECT * FROM tbl_galeri");
          foreach ($query->result_array() as $value) { ?>

          <a class="item-gallery-footer wrap-pic-w" href="<?php echo base_url()?>images/galeri/<?php echo $value['gambar'];?>" data-lightbox="gallery-footer">
            <img src="<?php echo base_url()?>images/galeri/<?php echo $value['gambar'];?>" alt="GALLERY" height="70">
          </a><?php } ?>
        </div>


      </div>
    </div>
  </div>

  <div class="end-footer bg2">
    <div class="container">
      <div class="flex-sb-m flex-w p-t-22 p-b-22">
        <div class="p-t-5 p-b-5">
          <a href="<?php echo $tampil['ig'] ?>" class="fs-15 c-white" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <div class="p-t-22 p-b-22">
          <div class="p-t-5 p-b-5">
            <a href="<?php echo base_url()?>syarat_dan_ketentuan" class="fs-15 btn-link"><img src="<?php echo base_url()?>images/icons/png/032-marketing.png" style="width: 20px">&nbsp;Syarat & Ketentuan</a>
          </div>
          <div class="txt17 p-r-20 p-t-5 p-b-5">
            Copyright &copy; 2018 All rights reserved  |  <?php echo $email_resto ?>
          </div>
        </div>
      </div>
    </div>
  </footer>