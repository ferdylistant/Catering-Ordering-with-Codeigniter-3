<?php foreach ($tentang_resto->result_array() as $value) {
  $nama_resto       = $value['nama_resto'];
  $alamat_resto     = $value['alamat_resto'];
  $email_resto      = $value['email_resto'];
  $telp_resto       = $value['telp_resto'];
  $isi_tentang_resto= $value['isi_tentang_resto'];
  $logo             = $value['logo'];
} ?>     

<!-- Slide1 -->
<section class="section-slide">
  <div class="wrap-slick1">
   <div class="slick1">
    <div class="item-slick1 item1-slick1" style="background-image: url(./images/tentang_kami/IMG_3363.jpg);">
     <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
      <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
       Welcome to 
     </span>

     <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp"><?php echo $nama_resto; ?></h2>

     <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
       <!-- Button1 -->
       <a href="<?php echo base_url()?>menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
        Look Menu
      </a> 
    </div>
  </div>
</div>

<div class="item-slick1 item2-slick1" style="background-image: url(./images/tentang_kami/hmm.jpg);">
 <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
  <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
   Welcome to
 </span>

 <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
   <?php echo $nama_resto; ?>
 </h2>

 <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
   <!-- Button1 -->
   <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
    Look Menu
  </a>
</div>
</div>
</div>

<div class="item-slick1 item3-slick1" style="background-image: url(./images/tentang_kami/outdoor.jpg);">
 <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
  <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
   Welcome to
 </span>

 <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
   <?php echo $nama_resto; ?>
 </h2>

 <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
   <!-- Button1 -->
   <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
    Look Menu
  </a>
</div>
</div>
</div>

</div>

<div class="wrap-slick1-dots"></div>
</div>
</section>

<!-- Welcome -->
<section class="section-welcome p-t-120 p-b-105">
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-t-45 p-b-30">
        <div class="wrap-text-welcome t-center">
          <span class="tit2 t-center">
            Traditional Restaurant
          </span>

          <h3 class="tit3 t-center m-b-35 m-t-5">
            Welcome 
          </h3>

          <p class="t-center m-b-22 size3 m-l-r-auto">
            <?php echo $isi_tentang_resto; ?>
          </p>

          <a href="about.html" class="txt4">
            Our Story
            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <div class="col-md-6 p-b-30">
        <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
          <img src="<?php echo base_url()?>asset/global/images/logokj1.png" alt="IMG-OUR">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Intro -->
<section class="section-intro">
  <div class="header-intro parallax100 t-center p-t-135 p-b-158 pict-parallax-1">
    <span class="tit2 p-l-15 p-r-15">
      Discover
    </span>

    <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
      <?php echo $nama_resto; ?>
    </h3>
  </div>

</section>


<!-- Our menu -->
<section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
  <div class="container">
    <div class="title-section-ourmenu t-center m-b-22">
      <span class="tit2 t-center">
        Discover
      </span>

      <h3 class="tit5 t-center m-t-2">
        Our Menu
      </h3>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php foreach ($tampil_menu->result_array() as $menu) {
          $idM = base64_encode($menu['id_menu']); ?>
  
          <div class="col-sm-3">
            <!-- Item our menu -->
            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
              <img src="<?php echo base_url()?>images/menu/<?php echo $menu['gambar_menu'] ?>" alt="IMG-MENU">

              <!-- Button2 -->
              <a href="<?php echo base_url()?>menu/detail/<?php echo $idM;?>" class="btn2 flex-c-m txt5 ab-c-m size3 text-center">
                <?php echo $menu['nama_menu']?>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div  class="t-center"><a href="<?php echo base_url()?>menu" class="txt4 size3"><span>Our menu</span><i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i></a></div>
  </div>
</section>

<!-- Location -->
<section class="section-booking p-t-100 p-b-110">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 p-b-30">
        <div class="title-review t-center m-b-22">
          <span class="tit2 p-l-15 p-r-15">
            Route
          </span>

          <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
            Location Us
          </h3>
        </div>
        <div class="map bo8 bo-rad-10 of-hidden">
          <div class="contact-map size37" id="map">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Chef -->
  <section class="section-chef bg2-pattern p-t-115 p-b-95">
    <div class="container t-center">
      <span class="tit2 t-center">
        Kampung
      </span>

      <h3 class="tit5 t-center m-b-50 m-t-5">
        Jawa
      </h3>

      <div class="row">
        <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
          <!-- -Block5 -->
          <div class="blo5 pos-relative p-t-60">
            <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
              <a href="#"><img src="<?php echo base_url()?>images/tentang_kami/kukuh.png" alt="IGM-AVATAR"></a>
            </div>

            <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
              <h6 class="txt34 dis-block p-b-6">
                Kukuh Sambodo
              </h6>

              <span class="dis-block t-center txt35 p-b-25">
                Head Manager
              </span>

              <p class="t-center">
                "Semua tentang ruang lingkup dan kualitas pertemanan, adapun itu bisnis menambahkan tali yang cukup erat, tepatnya di Kampung Jawa Resto"
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
          <!-- -Block5 -->
          <div class="blo5 pos-relative p-t-60">
            <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
              <a href="#"><img src="<?php echo base_url()?>images/tentang_kami/hedar.png" alt="IGM-AVATAR"></a>
            </div>

            <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
              <h6 class="txt34 dis-block p-b-6">
                Hedar Alaydrus
              </h6>

              <span class="dis-block t-center txt35 p-b-25">
                Owner
              </span>

              <p class="t-center">
                "Dari banyaknya bisnis yang mode fancy, Kampung Jawa merupakan tempat yang saya impikan untuk membuat suatu impian-impian lainnya."
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
          <!-- -Block5 -->
          <div class="blo5 pos-relative p-t-60">
            <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
              <a href="#"><img src="<?php echo base_url()?>images/tentang_kami/nabil.png" alt="IGM-AVATAR"></a>
            </div>

            <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
              <h6 class="txt34 dis-block p-b-6">
                Nabil Muhammad
              </h6>

              <span class="dis-block t-center txt35 p-b-25">
                Head Creative
              </span>

              <p class="t-center">
                "Seni itu ringan, yang berat adalah pokok ide dan makna dari sebuah seni itu sendiri. Kenapa? kalau tidak ada arti, maka air pun sudah seni."
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <section class="section-blog bg-white p-t-115 p-b-123">
    <div class="container">
      <div class="title-section-ourmenu t-center m-b-22">
        <span class="tit2 t-center">
          Latest News
        </span>

        <h3 class="tit5 t-center m-t-2">
          The Blog
        </h3>
      </div>

      <div class="row">
        <?php foreach ($blog as $blg) { ?>
        <?php $idB = base64_encode($blg['id_blog']); ?>
        <div class="col-md-4 p-t-30">
          <!-- Block1 -->
          <div class="blo1">
            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
              <a href="<?php echo base_url()?>blog/detail/<?php echo $idB;?>"><img src="<?php echo base_url()?>images/blog/<?php echo $blg['gambar_blog'] ?>" alt="IMG-INTRO" style="height: 219.95px"></a>

              <div class="time-blog">
                <?php echo date('D, d M Y', strtotime($blg['tgl_input'])) ?>
              </div>
            </div>

            <div class="wrap-text-blo1 p-t-35">
              <a href="<?php echo base_url()?>blog/detail/<?php echo $idB;?>"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                <?php echo $blg['judul_blog'] ?>
              </h4></a>

              <p class="m-b-20">
                <?= character_limiter($blg['isi_blog'],70) ?>
              </p>

              <a href="<?php echo base_url()?>blog/detail/<?php echo $idB;?>" class="txt4">
                Continue Reading
                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- Kritik -->
  <section class="section-booking bg1-pattern p-t-115 p-b-95">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-b-30">
          <div class="title-review t-center m-b-22">
            <span class="tit2 p-l-15 p-r-15">
              Send Us
            </span>

            <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
              A Message
            </h3>
          </div>
          <?php echo form_open(base_url('saran'),'wrap-form-reservation size22 m-l-r-auto')?>
          <div class="row">
            <div class="col-md-4">
              <!-- Name -->
              <span class="txt9">
                Name
              </span>

              <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="nama_saran" placeholder="Name">
              </div>
            </div>

            <div class="col-md-4">
              <!-- Email -->
              <span class="txt9">
                Email
              </span>

              <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email_saran" placeholder="Email">
              </div>
            </div>

            <div class="col-md-4">
              <!-- Phone -->
              <span class="txt9">
                Phone
              </span>

              <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="telp_saran" placeholder="Phone">
              </div>
            </div>

            <div class="col-12">
              <!-- Message -->
              <span class="txt9">
                Message
              </span>
              <textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="isi_saran" placeholder="Message"></textarea>
            </div>
          </div>

          <div class="wrap-btn-booking flex-c-m m-t-13">
            <!-- Button3 -->
            <button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
              Submit
            </button>
          </div>
          <?php echo form_close();?>

        </div>
      </div>
    </div>
  </section>
