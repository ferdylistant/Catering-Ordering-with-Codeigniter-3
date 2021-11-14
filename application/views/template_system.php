<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->sistem_model->cek();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?> | Administrator</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/jqueryui/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>package/dist/sweetalert2.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/alert/css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/global/vendor/lightbox2/css/lightbox.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>images/logokj/logokj11.png" />
</head>

<body>
  <div class="container-scroller" id="fullScreen">

   <?php
   $query = $this->db->query("select count(id_order) as jml from tbl_order where status_order='0' ");

   foreach ($query->result_array() as $tampil) {
    $jumlah = $tampil['jml'];
  }
  ?>

  <!-- Awal Pemecahan Admin Grup -->
  <?php
  if($this->session->userdata("admin_group_id")==2) { ?>

  <!-- partial:partials/_navbar -->
  <?php echo $navbar_operator; ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar -->
    <?php echo $sidebar_operator; ?>


    <?php }
    elseif($this->session->userdata("admin_group_id")==1){ ?>

    <!-- partial:partials/_navbar -->
    <?php echo $navbar_admin; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar -->
      <?php echo $sidebar_admin; ?>
      <?php } ?>
      <!-- partial -->
      <div class="main-panel">


        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <?php echo $contents; ?>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php echo $footer; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->

  <script src="<?php echo base_url();?>asset/admin/jqueryui/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>asset/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>asset/admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    var ckeditor = CKEDITOR.replace('ckeditor',{
      height:'600px'
    });

    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editable');
  </script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>asset/admin/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>asset/admin/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>asset/admin/js/chart.js"></script>
  <script src="<?php echo base_url();?>asset/admin/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="<?php echo base_url();?>asset/admin/pages/scripts/form-validation.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url();?>asset/admin/pages/scripts/table-advanced.js"></script>
  <script src="<?php echo base_url();?>asset/admin/pages/scripts/table-editable.js"></script>
  <script src="<?= base_url() ?>asset/alert/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url();?>js/panggil_sweetalert.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>asset/global/vendor/lightbox2/js/lightbox.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var table = $('#table').DataTable({
        rowReorder:{
          selector: 'td:nth-child(2)'
        },
        responsive: true
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){ // Ketika halaman selesai di load

      $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
      $('#filter').change(function(){ // Ketika user memilih filter
      if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
        $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
        $('#form-tanggal').show(); // Tampilkan form tanggal
      }
      else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
        $('#form-tanggal').hide(); // Sembunyikan form tanggal
      $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
    }
      else{ // Jika filternya 3 (per tahun)
        $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
        $('#form-tahun').show(); // Tampilkan form tahun
      }
    $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
  })
    })
  </script>
  <script type="text/javascript">
    function getMessageCount1(){
      $.ajax({
        type: 'POST',
        url: '<?php $hasil = $this->sistem_model->NotifNewOrder();
        $total = $hasil->num_rows()?>',
        data: { NumberOfAlerts: "<?php echo $total?>" },
        success: function(response){
          $('#alertsfrommydb').html(response);
        }
      });
    }
  </script>
  <script type="text/javascript">
    $(function()
    {
      $("#stts").change(function()
      {
        if ($(this).val() == "6") {
          $("#tolak").show();

        }
        else
        {
          $("#tolak").hide();
        }
      });
    });
  </script>
  <script>
    var elem = document.getElementById("fullScreen");
    function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
    }
    function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }
    }
    if (openFullscreen()){
      elem.
    }
  </script>
</script>
<script>
  $(document).ready(function(){
    $.ajax({
      type: 'POST',
      url:'<?php echo base_url()?>apiongkir/provinsi',
      success:function(hasil)
      {
        $("select[name=provinsi]").html(hasil);
      }
    });
    $("select[name=provinsi]").on("change", function(){
        // mendapatkan id_provinsi yg dipillih
        var id_provinsi_terpilih = $(this).val();
        // mendapatkan isi atribut nama, dari option yang dipilih
        var nama_provinsi = $("option:selected").attr("nama");
        // menaruh di input yg bernama nama_provinsi
        $("input[name=nama_provinsi]").val(nama_provinsi);
        $.ajax({
          url:'<?php echo base_url()?>apiongkir/update_kota',
          type:'POST',
          data:'id_provinsi='+id_provinsi_terpilih,
          success:function(hasil)
          {
            $("select[name=kota]").html(hasil);
          }
        });
      })
  })
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
<script>
  function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more"; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less"; 
      moreText.style.display = "inline";
    }
  }
</script>

<script>
  function goBack() {
    window.history.back()
  }
</script>
<script>
  jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features // initlayout and core plugins
Index.init();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initDashboardDaterange();
   Tasks.initDashboardWidget();
   TableEditable.init();
   ComponentsPickers.init();
   FormValidation.init();
   DataTables.init();
 });
</script>

<!-- END JAVASCRIPTS -->
</body>

</html>