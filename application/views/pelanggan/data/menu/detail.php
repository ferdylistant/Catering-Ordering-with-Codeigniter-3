<!--<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/hmm.jpg);">
	<h2 class="tit6 t-center">
			Traditional Menu
	</h2>
</section> -->

<!-- Dinner --><?php
foreach ($detail->result_array() as $value) { ?>
  <?php 
  echo form_open('cart/add','class="wrap-form-booking m-l-r-auto"');
  echo form_hidden('id',$value['id_menu']);
  echo form_hidden('price',$value['harga_menu']); 
  echo form_hidden('name',$value['nama_menu']);

  ?> 
  <section class="section-dinner p-t-110 p-b-70 bg1-pattern">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-l-r-auto">
          <div class=" p-t-50 wrap-item-mainmenu">
            <h3 class="tit-mainmenu tit10 p-b-15 m-l-16"><img src="<?php echo base_url('images/icons/online-menu.png') ?>" style="width: 40px;"> DETAIL MENU</h3>
          </div>
        </div>
      </div>
      <div class="row bg-white bo-rad-10 p-b-30" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="col-lg-6 m-l-r-auto">
          <div class=" wrap-item-mainmenu p-b-22">
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom" style="width: 80%">
              <img src="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu']?>" alt="IMG-MENU">
              <div class="overlay-item-gallery trans-0-4 flex-c-m">
                <a class="btn-show-gallery flex-c-m fa fa-search" href="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu']?>"  data-lightbox="menu"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-r-30">
          <ul class="list-group t-center flex-c-m p-t-20 m-t-43 p-b-80" style="height: 30px">
            <li class="list-group-item" style="border-left: solid;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
              <span class="txt10 t-center"><b class="text-danger"><i class="fa  fa-exclamation-circle"></i> Perhtian:</b> Pemesanan sebaiknya dilakukan H-7 hari
                agar mendapat ketersediaan jadwal
                pengiriman. Dan minimal total pemesanan 50/pcs. <a href="<?php echo base_url()?>syarat_dan_ketentuan" class="btn-link">Syarat & Ketentuan</a>
              </span>
            </li>
          </ul>
          <div class="blo3 flex-w flex-col-l-sm m-b-30">            
            <div class="text-blo3 size21 flex-col-l-m">
              <h3 class="txt5 m-b-3"><?php echo $value['nama_menu'] ?></h3>
              <div class="txt32 flex-w m-b-10">
                <span><?php echo $value['jenis_menu'] ?>
                <span class="m-r-6 m-l-4"></span>
              </span>
            </div>
            <span class="txt23"><?php echo $value['detail_menu'] ?></span>
            <span class="txt22 m-t-10"><?php echo rupiah($value['harga_menu']) ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-20">
              <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="qty" placeholder="Jumlah yang ingin Anda pesan!" required="">
            </div>
          </div>
        </div>
        <div class="wrap-btn-booking flex-c-m m-t-6">
          <button class="btn3 flex-c-m size13 txt11 trans-0-4" type="submit" name="submit">
            Order
          </button>
        </div>
      </div>
    </div>

  </div>

</section>
<?php echo form_close(); ?>
<?php } ?>



