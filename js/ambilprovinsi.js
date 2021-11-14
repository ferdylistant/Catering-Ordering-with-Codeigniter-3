$(document).ready(function(){
      $.ajax({
        type: 'POST',
        url: baseurl +'apiongkir/provinsi',
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
          url: baseurl + 'apiongkir/update_kota',
          type:'POST',
          data:'id_provinsi='+id_provinsi_terpilih,
          success:function(hasil)
          {
            $("select[name=kota]").html(hasil);
          }
        });
        $("select[name=ekspedisi]").val(null);
        $("select[name=ongkir]").val(null);
        $("input[name=nama_kota]").val(null);
        $("input[name=tipe]").val(null);
        $("input[name=kode_pos]").val(null);
        $("input[name=nama_ekspedisi]").val(null);
        $("input[name=nama_paket]").val(null);
        $("input[name=biaya_paket]").val(null);
        $("input[name=lama_paket]").val(null);
      });
      $("select[name=kota]").on("change", function(){
        // mendapatkan isi atribut nama
        var nama = $("option:selected",this).attr("nama");
        var kodepos = $("option:selected",this).attr("kodepos");
        var tipe = $("option:selected",this).attr("tipe");
        $("input[name=nama_kota]").val(nama);
        $("input[name=tipe]").val(tipe);
        $("input[name=kode_pos]").val(kodepos);
      });
      $.ajax({
        url: baseurl+'apiongkir/ekspedisi',
        success:function(hasil)
        {
          var ekspedisi=$("select[name=ekspedisi]").html(hasil);
        }
      });
      $("select[name=ekspedisi]").on("change", function(){
        var nama=$("option:selected",this).attr("nama");
        $("input[name=nama_ekspedisi]").val(nama);
      });
      $("select[name=ekspedisi]").on("change", function(){
        // mendapatkan id kota dari selectnya kota
        var id_kota=$("select[name=kota]").val();
        var ekspedisi=$("select[name=ekspedisi]").val();
        var total_berat=$("input[name=total_berat]").val();
        $.ajax({
          url: baseurl +'apiongkir/update_ongkir',
          type:'POST',
          data:'id_kota='+id_kota+'&ekspedisi='+ekspedisi+'&total_berat='+total_berat,
          success:function(hasil)
          {
            // alert(hasil);
            $("select[name=ongkir]").html(hasil);
          }
        })
      });
      $("select[name=ongkir]").on("change", function(){
        // mendapatkan isi dari atribut nama,biata,lama
        var nama = $("option:selected",this).attr("nama");
        var biaya = $("option:selected",this).attr("biaya");
        var lama = $("option:selected",this).attr("lama");
        $("input[name=nama_paket]").val(nama);
        $("input[name=biaya_paket]").val(biaya);
        $("input[name=lama_paket]").val(lama);
        $("#total_ongkir").html("Rp. "+biaya);
        var total_order = $("input[name=total_order]").val();
        var biaya_paket = $("input[name=biaya_paket]").val();
        var total_bayar= parseInt(total_order)+parseInt(biaya);
        $("#total_bayar").html("Rp. "+total_bayar);
      })
    })