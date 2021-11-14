$(document).ready(function(){
  $('.add_cart').click(function(){
    var id_menu    = $(this).data("produkid");
    var nama_menu  = $(this).data("produknama");
    var harga_menu = $(this).data("produkharga");
    var quantity     = $('#' + id_menu).val();
    $.ajax({
      url : baseurl + "cart/add",
      method : "POST",
      data : {id_menu: id_menu, nama_menu: nama_menu, harga_menu: harga_menu, quantity: quantity},
      success: function(data){
        $('#detail_cart').html(data);
        $('#keranjang_cart').html(data);
        $('#badge_cart').html(data);
      }
    });
  });
  $('#detail_cart').load(baseurl+"cart/load_cart");
  $('#keranjang_cart').load(baseurl+"cart/load_keranjang");
  $('#badge_cart').load(baseurl+"cart/load_badge");
  //Hapus Item Cart
  $(document).on('click','.hapus_cart',function(){
    var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
    $.ajax({
      url : baseurl+"cart/delete",
      method : "POST",
      data : {row_id : row_id},
      success :function(data){
        $('#detail_cart').html(data);
        $('#awal_badge').html(data);
        $('#badge_cart').html(data);
        setTimeout(function(){window.location = window.location}, 100);
      }
    });
  });
});
//Hapus Item Cart
$(document).on('click','.hapus_badge_cart',function(){
  var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
  $.ajax({
    url : baseurl+"cart/delete_badge",
    method : "POST",
    data : {row_id : row_id},
    success :function(data){
      $('#detail_cart').html(data);
      $('#awal_badge').html(data);
      $('#keranjang_cart').html(data);
      $('#badge_cart').html(data);
      setTimeout(function(){window.location = window.location}, 100);
    }
  });
});