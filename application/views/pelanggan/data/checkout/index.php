
<style type="text/css">
  html,body,.wrapper{
    background: #f7f7f7;
  }
  .steps {
    margin-top: -41px;
    display: inline-block;
    float: right;
    font-size: 16px
  }
  .step {
    float: left;
    background: white;
    padding: 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 100px;
    position: relative
  }
  .step_line {
    margin: 0;
    width: 0;
    height: 0;
    border-left: 16px solid #fff;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    z-index: 1008;
    position: absolute;
    left: 99px;
    top: 1px
  }
  .step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 1006;
    position: absolute;
    left: 99px;
    top: -3px
  }
  .step_complete {
    background: #357ebd
  }
  .step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #eee;
  }
  .step_line.step_complete {
    background: 0;
    border-left: 16px solid #357ebd
  }
  .step_thankyou {
    float: left;
    background: white;
    padding: 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 100px;
  }
  .step.check_step {
    margin-left: 5px;
  }
  .ch_pp {
    text-decoration: underline;
  }
  .ch_pp.sip {
    margin-left: 10px;
  }
  .check-bc,
  .check-bc:hover {
    color: #222;
  }
  .SuccessField {
    border-color: #458845 !important;
    -webkit-box-shadow: 0 0 7px #9acc9a !important;
    -moz-box-shadow: 0 0 7px #9acc9a !important;
    box-shadow: 0 0 7px #9acc9a !important;
    background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important
  }

  .btn-xs{
    line-height: 28px;
  }

  /*login form*/
  .login-container{
    margin-top:30px ;
  }
  .login-container input[type=submit] {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    position: relative;
  }

  .login-container input[type=text], input[type=password] {
    height: 44px;
    font-size: 16px;
    width: 100%;
    margin-bottom: 10px;
    -webkit-appearance: none;
    background: #fff;
    border: 1px solid #d9d9d9;
    border-top: 1px solid #c0c0c0;
    /* border-radius: 2px; */
    padding: 0 8px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .login-container input[type=text]:hover, input[type=password]:hover {
    border: 1px solid #b9b9b9;
    border-top: 1px solid #a0a0a0;
    -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  }

  .login-container-submit {
    /* border: 1px solid #3079ed; */
    border: 0px;
    color: #fff;
    text-shadow: 0 1px rgba(0,0,0,0.1); 
    background-color: #357ebd;/*#4d90fe;*/
    padding: 17px 0px;
    font-family: roboto;
    font-size: 14px;
    /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
  }

  .login-container-submit:hover {
    /* border: 1px solid #2f5bb7; */
    border: 0px;
    text-shadow: 0 1px rgba(0,0,0,0.3);
    background-color: #357ae8;
    /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
  }

  .login-help{
    font-size: 12px;
  }

  .asterix{
    background:#f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;
  }

  /* images*/
  ol, ul {
    list-style: none;
  }
  .hand {
    cursor: pointer;
    cursor: pointer;
  }
  .cards{
    padding-left:0;
  }
  .cards li {
    -webkit-transition: all .2s;
    -moz-transition: all .2s;
    -ms-transition: all .2s;
    -o-transition: all .2s;
    transition: all .2s;
    background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
    background-position: 0 0;
    float: left;
    height: 32px;
    margin-right: 8px;
    text-indent: -9999px;
    width: 51px;
  }
  .cards .mastercard {
    background-position: -51px 0;
  }
  .cards li {
    -webkit-transition: all .2s;
    -moz-transition: all .2s;
    -ms-transition: all .2s;
    -o-transition: all .2s;
    transition: all .2s;
    background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
    background-position: 0 0;
    float: left;
    height: 32px;
    margin-right: 8px;
    text-indent: -9999px;
    width: 51px;
  }
  .cards .amex {
    background-position: -102px 0;
  }
  .cards li {
    -webkit-transition: all .2s;
    -moz-transition: all .2s;
    -ms-transition: all .2s;
    -o-transition: all .2s;
    transition: all .2s;
    background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
    background-position: 0 0;
    float: left;
    height: 32px;
    margin-right: 8px;
    text-indent: -9999px;
    width: 51px;
  }
  .cards li:last-child {
    margin-right: 0;
  }
  /* images end */



/*
 * BOOTSTRAP
 */
 .container{
  border: none;
}
.panel-footer{
  background:#fff;
}
.btn{
  border-radius: 1px;
}
.btn-sm, .btn-group-sm > .btn{
  border-radius: 1px;
}
.input-sm, .form-horizontal .form-group-sm .form-control{
  border-radius: 1px;
}

.panel-info {
  border-color: #999;
}

.panel-heading {
  border-top-left-radius: 1px;
  border-top-right-radius: 1px;
}
.panel {
  border-radius: 1px;
}
.panel-info > .panel-heading {
  color: #eee;
  border-color: #999;
}
.panel-info > .panel-heading {
  background-image: linear-gradient(to bottom, #555 0px, #888 100%);
}

hr {
  border-color: #999 -moz-use-text-color -moz-use-text-color;
}

.panel-footer {
  border-bottom-left-radius: 1px;
  border-bottom-right-radius: 1px;
  border-top: 1px solid #999;
}

.btn-link {
  color: #888;
}

hr{
  margin-bottom: 10px;
  margin-top: 10px;
}

/** MEDIA QUERIES **/
@media only screen and (max-width: 989px){
  .span1{
    margin-bottom: 15px;
    clear:both;
  }
}

@media only screen and (max-width: 764px){
  .inverse-1{
    float:right;
  }
}

@media only screen and (max-width: 586px){
  .cart-titles{
    display:none;
  }
  .panel {
    margin-bottom: 1px;
  }
}

.form-control {
  border-radius: 1px;
}

@media only screen and (max-width: 486px){
  .col-xss-12{
    width:100%;
  }
  .cart-img-show{
    display: none;
  }
  .btn-submit-fix{
    width:100%;
  }

}
/*
@media only screen and (max-width: 777px){
    .container{
        overflow-x: hidden;
    }
    }*/
  </style>
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
      <p>Tanggal Perlu tidak bisa diinput hari sebelumnya!</p>
      </div>           
      </div>
      </div>
      </div>";
    } elseif ($this->session->flashdata('error')) {
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
    } elseif ($this->session->flashdata('min_order')) {
        echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
      <div class='modal-dialog'>
      <!-- Modal content-->
      <div class='modal-content' role='document'>
      <div class='modal-header'>                        
      <h4 class='modal-title txt24'>Peringatan!</h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
      <p>Minimal waktu pemesanan adalah 6 hari sebelum tanggal perlu!</p>
      </div>           
      </div>
      </div>
      </div>";
    } elseif ($this->session->flashdata('berhasil')) {
        echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog'>
      <div class='modal-dialog'>
      <!-- Modal content-->
      <div class='modal-content' role='document'>
      <div class='modal-header'>                        
      <h4 class='modal-title txt24'>Peringatan!</h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
      <p>Berhasil mendaftar!</p>
      </div>           
      </div>
      </div>
      </div>";
    } ?>
  <section class="section-dinner p-t-110 p-b-70 bg1-pattern">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-l-r-auto">
          <div class=" p-t-50 wrap-item-mainmenu">
           <h3 class="tit-mainmenu tit10 p-b-15 m-l-16">
            <img src="<?php echo base_url('images/icons/png/029-digital clock.png') ?>" style="width: 40px;"> 
            DATA PEMESANAN
          </h3>
        </div>
      </div>
    </div>
    <div class="row bg-white bo-rad-10 p-b-30" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <div class="col-lg-6 m-l-r-auto p-b-30">
        <?php echo form_open('nota', 'class="wrap-form-booking m-t-30"')?>
          <div class="row">
            <div class="col-md-12">
              <!-- Name -->
              <span class="txt9">
                Nama Penerima 
              </span>

              <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="nama_order" placeholder="Nama Lengkap" value="<?php echo $pelanggan['nama_pelanggan'] ?>">
                <?php echo form_error('nama_order', '<span class="text-danger">', '</span>')?>
              </div>

              <!-- Phone -->
              <span class="txt9">
                Telepon Penerima
              </span>

              <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="telp_order" placeholder="Telepon" value="<?php echo $pelanggan['telp_pelanggan'] ?>">
                <?php echo form_error('telp_order', '<span class="text-danger">', '</span>')?>
              </div>
              <span class="txt9">
                Alamat Lengkap Tujuan
              </span>

              <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="alamat_order" placeholder="Alamat lengkap">
                <?php echo form_error('alamat_pelanggan', '<span class="text-danger">', '</span>')?>
              </div>
            </div>
            <div class="col-md-6">
              <span class="txt9">
                Provinsi
              </span> 

              <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <select class="selection-1 bo-rad-10 sizefull txt10 p-l-20" name="provinsi" required=""></select>
              </div>
              <span class="txt9">
                Kota
              </span> 

              <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <select class="selection-1 bo-rad-10 sizefull txt10 p-l-20" name="kota" required=""></select>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Date -->
              <span class="txt9">
                Tanggal Keperluan
              </span>

              <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                  <input type="date" class="bo-rad-10 sizefull txt10 p-l-20" name="tgl_perlu">
                  <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
                  <?php echo form_error('tgl_perlu', '<span class="text-danger">', '</span>')?>
                </div>

              <!-- Time -->
              <span class="txt9">
                Jam Keperluan
              </span>

              <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                <!-- Select2 -->
                <input type="text" class="sizefull txt10 timepicker p-l-20 simpleExample" name="jam_perlu">
                <?php echo form_error('jam_perlu', '<span class="text-danger">', '</span>')?>
              </div>
            </div>
            
          </div>
          <div class="wrap-btn-booking flex-c-m m-t-6">
            <!-- Button3 -->
            <?php
          foreach ($cart as $c) {
              $qty = $c['qty'];
          }
          $ttl = $this->cart->total();
          $total_berat =$ttl / $qty;
          ?>

            <input type="hidden" name="total_berat" value="<?php echo $total_berat; ?>">
            <input type="hidden" name="nama_provinsi" placeholder="nama_provinsi">
            <input type="hidden" name="nama_kota" placeholder="nama_kota"> 
            <input type="hidden" name="tipe" placeholder="tipe">
            <input type="hidden" name="kode_pos" placeholder="kode_pos">
            <input type="hidden" name="nama_ekspedisi" placeholder="nama_ekspedisi">
            <input type="hidden" name="nama_paket" placeholder="nama_paket">
            <input type="hidden" name="biaya_paket" placeholder="biaya_paket">
            <input type="hidden" name="lama_paket" placeholder="lama_paket">
            <input type="hidden" name="total_order" value="<?php echo $this->cart->total() ; ?>">
            <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
              Checkout
            </button>
          </div>
          
        <?php echo form_close();?>
     </div>
     <div class="col-lg-6 p-b-30 p-t-18">
      <ul class="list-group t-center flex-c-m m-t-50 m-b-80" style="height: 30px">
        <li class="list-group-item" style="border-left: solid;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <span class="txt10 t-center"><b class="text-danger"><i class="fa  fa-exclamation-circle"></i> Perhtian:</b> Yakinkan dengan produk pesanan anda, jangan lupa untuk memperhatikan <a href="<?php echo base_url()?>syarat_dan_ketentuan" class="btn-link text-primary">Syarat & Ketentuan</a> yang berlaku pada saat memesan. Dengan melakukan pemesanan berarti Anda telah menyetujui <a href="<?php echo base_url()?>syarat_dan_ketentuan" class="btn-link text-primary">Syarat & Ketentuan</a>.
          </span>
        </li>
      </ul>
      <div class="m-t-10 p-b-10 text-center"><a href="<?php echo base_url()?>menu" class="btn btn-success" style="border-radius: 10px"><i class="fa fa-plus"></i> Tambah Pesanan</a></div>
      <div class="panel-body">
        <div class="table-responsive">
          <?php
          foreach ($cart as $cart) { ?> 
            <?php $id = $cart['id'];?>
            <?php $model=$this->pelanggan_model->MenuDetail($id);
            foreach ($model->result_array() as $tampil) {?>
              <div class="row">
                <div class="col-lg-12 flex-row m-l-r-auto"> 
                  <div class="m-l-10 m-t-10">
                  <img class="img-rounded" src="<?php echo base_url()?>images/menu/<?php echo $tampil['gambar_menu']?>" style="width: 60px" />
                </div>
                  <div class="col-md-3 txt9 m-l-10 m-t-10">
                    <span class="tit2"><?php echo $cart['name']?></span>
                    <small class="txt35">Jumlah: 
                      <span><?php echo $cart['qty']; ?> Pcs</span>
                    </small>  
                  </div>
                  <div class="col-md-3 m-t-10">
                    <small class="txt3">
                      <b><span>Harga:</span></b>
                    </small>
                    <small class="txt12">
                      <span> Rp.<?php echo $cart['price']; ?></span>
                    </small>
                  </div>

                  <div class="col-md-3 m-t-10">
                    <small class="txt3">
                      <b><span>Sub-total:</span></b>
                    </small>
                    <small class="txt12">
                      <span>Rp.<?php echo number_format($cart['subtotal']); ?></span>
                    </small>
                    
                  </div>
                </div>
              </div>
              <div class="form-group">
                <hr />
              </div>
            <?php } ?>
          <?php } ?>
          
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-6">
                <h5 class="txt22" style="border-bottom: 3px groove coral; width: 4.50cm"><b>Total Harga</b></h5>
              </div>
              <div class="col-md-6">
                <h5 class="txt22 pull-right">Rp.<?php echo number_format($this->cart->total()) ; ?></h5>
              </div>
            </div>
              
              
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
</section>
 
