<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?> | Kampung Jawa</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
  <!--===============================================================================================-->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet'/>
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?php echo base_url();?>images/logo/logokj1.png"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->

  <link rel='stylesheet' href='<?php echo base_url()?>css/wafloatbox-0.2.css'>
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/fonts/themify/themify-icons.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/slick/slick.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/lightbox2/css/lightbox.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="<?php echo base_url()?>css/timepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/css/tambahan.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/css/gambar.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="<?= base_url() ?>asset/alert/css/sweetalert.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/css/util.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/css/main.css">
  <!--===============================================================================================-->
  <script>
    var baseurl = "<?php echo base_url();?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
  </script>
  
</head>

<style>
/* Button used to open the chat form - fixed at the bottom of the page */
.btnAsk {
  display: inline-block;
  background: transparent;
  font-weight: 10;
  font-style: normal;
  font-size: 0.500rem;
  color: #fff;
  border-radius: 0;
  padding: 5px 10px 5px;
  transition: all 0.7s ease-out;
  background-image: linear-gradient(to right, #2b5876 0%, #4e4376 51%, #2b5876 100%);

  background-position: 1% 50%;
  background-size: 300% 300%;
  text-decoration: none;
  margin: 0.625rem;
  border: none;
  border: 1px solid rgba(223,190,106,0.3);
}

.btnAsk:hover {
  color: rgba(223,190,106,0.7);
  border: 1px solid rgba(223,190,106,0);
  color: #fff;
  background-position: right center;
}
.msg_cotainer{
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 0;
  border-radius: 25px;
  background-color: #82ccdd;
  padding: 10px;
  position: relative;
  font-size: 12px;
}
.msg_cotainer_send{
  margin-top: auto;
  margin-bottom: auto;
  margin-right: 0;
  border-radius: 25px;
  background-color: #78e08f;
  padding: 10px;
  position: relative;
  font-size: 12px;
}
.msg_time{
  position: absolute;
  left: 0;
  bottom: -15px;
  color: #222222;
  font-size: 10px;
}
.msg_time_send{
  position: absolute;
  right:0;
  bottom: -15px;
  color: #222222;
  font-size: 10px;
}
/*.user_img_msg{
  width: 50px;
  border:1.5px solid #f5f6fa;

}
.img_cont_msg{
  width: 50px;
  }*/
  .open-button {
    color: #fff;
    background-image: linear-gradient(to right, #2b5876 0%, #4e4376 51%, #2b5876 100%);

    background-position: 1% 50%;
    background-size: 300% 300%;
    border-color: #424964;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    padding: 8px 10px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 0px;
    right: 30px;
    width: 200px;
  }
  .open-button:hover{
    color: #fff;
    border: 1px solid rgba(223,190,106,0);
    color: #fff;
    background-position: right center;
  }
  /* The popup chat - hidden by default */
  .chat-popup {
    position: fixed;
    right: 30px;
    background: #7F7FD5;
    width: 350px;
    box-shadow: 0px 0px 10px #075E54;
    border-radius: 10px;
    transition: all 0.5s ease-out;
    display: none;
    background-color: #424964;
    justify-content: center;
    bottom: 0;
    border: none;
    margin: 0;
    z-index: 9999999 !important;
  }
  .box-chat{
    width: 100%;
    border: none;
    margin: 4px;
    padding: auto;
  }
  .gelap{
    border-color: #ccc;
    background-color: #ddd;
  }
  .box-chat::after{
    clear: both;
    background: #7F7FD5;
    display: table;
  }
  .box-chat .kiri{
    position: relative;
    float: left;
    max-width: 30px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
    }.box-chat .kanan{
      position: relative;
      float: right;
      max-width: 30px;
      width: 100%;
      right: 0;
      margin-left: 20px;
      border-radius: 50%;
    }
    .box-chat p{
      font-family: wa;
      font-weight: 400;
      font-size: 15px;
      line-height: 1.7;
      color: #666666;
      margin: 0px;
      display: grid;
    }
    .time-right{
      float: right;
      color: #aaa;
    }
    .time-left{
      float: left;
      color: #999;
    }
    /* Add styles to the form container */
    .form-container {
      padding: 10px;
      background-color: white;

    }

    /* Full-width textarea */
    .form-container textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 100px;
    }
    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
      background-color: #ddd;
      outline: none;
    }
    /* Set a style for the submit/send button */
    .form-container .tombol {
      background-color: #feba00;
      color: white;
      border-radius: 5px;
      padding: 5px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      margin-top:10px;
      opacity: 0.9;
    }
    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background: #fc4a1a;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #f7b733, #fc4a1a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      color: #fff;
      border: 3px solid #eee;
    }
    /* Add some hover effects to buttons */
    .form-container .tombol:hover {opacity: 1;}
    .chatmsg{
      width: 100%;
      overflow-y: scroll;
      padding: 15px;
      margin: 5px 0 10px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 100px;
    }
    .chatlabel{
      width: 100%;
      padding: 15px;
      margin: 0;
      border: none;
      background: transparent;
      background-image: linear-gradient(to right, #2b5876 0%, #4e4376 51%, #2b5876 100%);

      background-position: 1% 50%;
      background-size: 300% 300%;
      color: #fff;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      resize: none;
      z-index: auto;
    }
  </style>
  <!-- Body -->
  <body class="animsition">
    <?php echo $header; ?>
    <?php echo $header_side; ?>
    <?php echo $contents; ?>
    <?php echo $footer; ?>
    <?php echo $back_to_top;?>
    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

      <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
          <div class="w-full wrap-pic-w op-0-0"><img src="<?php echo base_url();?>asset/global/images/icons/video-16-9.jpg" alt="IMG"></div>
          <div class="video-mo-01">
            <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/bootstrap/js/popper.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type='text/javascript' src="<?php echo base_url();?>js/jquery.mycart.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url()?>dist/loadingoverlay.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/daterangepicker/moment.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/parallax100/parallax100.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript">
      $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url();?>js/ajax.js"></script>
    <!--====================================DATATABLES===============================================-->
    <script type="text/javascript" src="<?php echo base_url()?>js/datatable.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url()?>js/timepicker.js"></script>
    <!--===============================================================================================-->
    <script src='<?php echo base_url()?>js/wafloatbox-0.2.js'></script>
    <!--========================================MAP====================================================-->
    <script src="<?php echo base_url()?>js/map.js"></script>
    <!--=======================================BUTTON WA===============================================-->
    <script src="<?php echo base_url()?>js/buttonwa.js ?>"></script>
    <!--================================AMBIL PROVINSI DAN KOTA========================================-->
    <script src="<?php echo base_url()?>js/ambilprovinsi.js"></script>
    <!--=====================================CHATBOT===================================================-->
    <script src="<?php echo base_url()?>js/chatbot.js"></script>
    <!--=================================INPUT DATA KE CART==========================================-->
    <script type="text/javascript" src="<?php echo base_url()?>js/cart.js"></script>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/lightbox2/js/lightbox.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url();?>asset/global/js/main.js"></script>
    <!--===============================================================================================-->
    <!--====================================NOTIFIKASI PELANGGAN=====================================-->
    <script>
      $(document).ready(function(){
        function load_unseen_notification(view ='')
        {
          $.ajax({
            url:"<?php echo base_url()?>notifikasi",
            method:"POST",
            data:{ view:view },
            dataType:"json",
            cache: false,
            success:function(data)
            {
              console.log(data.notification);
              if(typeof data.notification !== 'undefined')
              {
                $('.labelBadge').html(data.unseen_notification);
                $(document).ready(function(){
                  $(".klik_notif").click(function(){
                    location.hash = "notifikasi";
                    $.LoadingOverlay("show");
                    $('.labelBadge').html('');
                    $('#tampilkan').html(data.notification);
                    $.LoadingOverlay("hide");
                  });
                });
                return true;
              }
              else{
                $('.labelBadge').html('');
                $(document).ready(function(){
                $(".klik_notif").click(function(){
                  location.hash = "notifikasi";
                  $.LoadingOverlay("show");
                  $('.labelBadge').html('');
                  $('#tampilkan').html(data.notification);
                  $.LoadingOverlay("hide");
                });
              });
                return false;
              }
            }
          });
        }
        if (typeof load_unseen_notification() === false) {
          setInterval(function(){
          load_unseen_notification();
        }, 5000);
        }
        else{
          $('.labelBadge').html('');
        }
      });
    </script>
    <!--============================DEADLINE PEMBAYARAN COUNTDOWN====================================-->
    <script>
      var deadline_pembayaran = $('#deadline_pembayaran').val();
      var id_order = $('#id_order').val();
      var status_order = $('#status_order').val();
      var countDownDate = new Date(deadline_pembayaran).getTime();

      var x = setInterval(function() {
        var now = new Date().getTime();

        var distance  = countDownDate - now;
        var hours = Math.floor((distance %(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("j").innerHTML = hours;
        document.getElementById("m").innerHTML = minutes;
        document.getElementById("d").innerHTML = seconds;

        if (distance < 0)
          {if (status_order=== 0 || status_order==='201') {$.get("<?php echo base_url()?>checkout/cancel", {id_order:id_order});
      }
    }
  },1000);
</script>
<!--====================================ON CHANGE SELECT=========================================-->
<script type="text/javascript">
  $(function()
    {$("#jenis").change(function()
      {if ($(this).val() =="1") {$("#ekspedisi").show();}
      else
        {$("#ekspedisi").hide();}
    });
  });
</script>
<!--=================================PAYMENT GATEWAY SNAP========================================-->
<script type="text/javascript">
  $('#pay-button').click(function (event) {event.preventDefault();
    $(this).attr("disabled", "disabled");
    var id_order = $('#id_order').val();
    var id_menu = $('#id_menu').val();
    var nama_produk = $('#nama_produk').val();
    var jumlah_order = $('#jumlah_order').val();
    var harga_produk = $('#harga_produk').val();
    var total_order = $('#total_order').val();
    var nama_order = $('#nama_order').val();
    var telp_order = $('#telp_order').val();
    var alamat_order = $('#alamat_order').val();
    var provinsi = $('#provinsi').val();
    var distrik = $('#distrik').val();
    var tipe = $('#tipe').val();
    var kodepos_pengiriman = $('#kodepos_pengiriman').val();
    var nama_pelanggan = $('#nama_pelanggan').val();
    var email_pelanggan = $('#email_pelanggan').val();
    var telp_pelanggan = $('#telp_pelanggan').val();

    $.ajax({type:'POST',
      url: '<?=site_url()?>nota/token',
      data: {
        id_order: id_order,
        id_menu: id_menu,
        nama_produk: nama_produk,
        jumlah_order: jumlah_order,
        harga_produk: harga_produk,
        total_order: total_order,
        nama_order: nama_order,
        telp_order: telp_order,
        alamat_order: alamat_order,
        provinsi: provinsi,
        distrik: distrik,
        tipe: tipe,
        kodepos_pengiriman: kodepos_pengiriman,
        nama_pelanggan: nama_pelanggan,
        email_pelanggan: email_pelanggan,
        telp_pelanggan: telp_pelanggan
      },
      cache: false,

      success: function(data) {
          //location = data;
          console.log('token ='+data);
          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type,data){$("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }
          snap.pay(data, {onSuccess: function(result){changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();},
            onPending: function(result){changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();},
            onError: function(result){changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();}
          });
        }
      });
  });
</script>
<!--====================================MENU DI PROFILE==========================================-->
<script type="text/javascript">
  $(document).ready(function(){$('.klik_menu').click(function(){var menu = $(this).attr('id');
    if(menu =="r_t"){
      location.hash = 'riwayat-transaksi'
      $.LoadingOverlay("show");
    $('#tampilkan').load('<?php echo base_url();?>riwayat_transaksi');
    $.LoadingOverlay("hide");
  }else if(menu =="r_p"){$.LoadingOverlay("show");
  $('#tampilkan').load('<?php echo base_url('riwayat_pemesanan') ?>');
  $.LoadingOverlay("hide");
}
else if(menu =="sosmed"){$('.badan').load('sosmed.php');}
});
        // halaman yang di load default pertama kali
        $('.badan').load('home.php');
      });
    </script>
    <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#blah')
            .attr('src', e.target.result)
            .width(150)
            .height(200);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
    <!--===============================UPDATE STATUS ORDER OTOMATIS==================================-->
    <!-- <script>
      var timeOutId = 0;
      var ajaxFn = function () {$.ajax({url:"<?php echo base_url()?>update_status",
          success: function (response) {if (response =='True') {
              clearTimeout(timeOutId);
            }
            else {
              timeOutId = setTimeout(ajaxFn, 500);
              console.log("call");
            }
          }
        });
    }
      ajaxFn();
      timeOutId = setTimeout(ajaxFn, 500);
    </script> -->
    <!--===================================PEMBATALAN ORDER OTOMATIS=================================-->
    <!-- <script>
      var timeOutId = 0;
      var ajaxFn = function () {$.ajax({url:"<?php echo base_url()?>auto_batal",
          success: function (response) {if (response =='True') {clearTimeout(timeOutId);
            }
            else {timeOutId = setTimeout(ajaxFn, 500);
              console.log("call");
          }
        });
      }
      ajaxFn();
      timeOutId = setTimeout(ajaxFn, 500);
    </script> -->
    
    <!--=================================RECENT ORDER DI MENU========================================-->
    <script>
      var RecentOrder = function (view ='')
      {$.ajax({url:"<?php echo base_url()?>menu/recent_order",
        method:"POST",
        data:{view:view},
        dataType:"json",
        cache: false,
        success:function(data)
        {$("#tampil_recent_order").html(data.hasil);
      }
    });
    }
    setInterval(RecentOrder, 1000);
    console.log("call");
    RecentOrder();
  </script>
  <!--==============================TIME PICKER PESANAN============================================-->
  <script type="text/javascript">
    $(document).ready(function(){$(".simpleExample").timepicker();})
  </script>
  <!--===============================================================================================-->
  <script src="<?= base_url() ?>asset/alert/js/sweetalert.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url();?>js/panggil_sweetalert.js"></script>
  <!--===============================================================================================-->
</body>
</html>
