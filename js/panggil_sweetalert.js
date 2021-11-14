$(document).on('click', '.hapus-menu', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Menu tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-pesanan', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Data pemesanan dengan status "Kadaluarsa" yang anda pilih tersebut, tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-blog', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Blog tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-jenis-menu', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Jenis menu tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-kategori-blog', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Kategori blog tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-chatbot', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Data Chatbot tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-galeri', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Galeri tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.konfirmasi-status', function(){
  var getLink = baseurl+'sistem/status';
  swal({
    title: 'Apakah anda yakin ingin mengubah status?',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-kategori-galeri', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Kategori galeri tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '.hapus-user', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'User tidak bisa dikembalikan lagi setelah dihapus!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});

$(document).on('click', '#keluar', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin ingin keluar?',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){
    window.location.href = getLink
  });
  return false;
});
$(document).on('click', '.kosongkan-keranjang', function(){
  var getLink = $(this).attr('href');
  swal({
    title: 'Apakah anda yakin?',
    text:  'Keranjang akan terhapus semua!',
    type: 'warning',
    html: true,
    confirmButtonColor: '#d9534f',
    showCancelButton: true,
  },function(){

    window.location.href = getLink;
  });
  return false;
});
$(document).on('click', '.checkout', function(){
  var getLink = $(this).attr('href');
  var min = $('#minimal').val();
  if (min < 50) {
    swal({
      title: 'Oops!',
      text:  'Minimal total pemesanan 50pcs!',
      type: 'error',
      html: false,
      showCancelButton: false,
    });
  }
  else {
    window.location.href = getLink;
  }
  
  return false;
});
$(document).on('click','#reset', function(e){
  e.preventDefault();
  var email=$('#email').val();

  $.ajax({
    url: baseurl + "lupa_password",
    type: 'POST',
    data: {
      email: email
    },
    dataType: 'json',
    success: function(data) {
      if (email === "") {
          // $('#somediv').text($data['error']);
          $('#valdas').html(data.required);
        }
        else if (data.success === true) {
          swal({
            title: 'Berhasil!',
            text:  'Silahkan cek email Anda untuk melanjutkan verifikasi password.',
            type: 'success',
            html: false,
            showCancelButton: false,
          });
        }else if (data.debug) {
          $('#valdas').html(data.debug);
        }
        else if(data.error === true){
          swal({
            title: 'Gagal!',
            text:  'Email "'+email+'" tidak terdaftar!',
            type: 'error',
            html: false,
            showCancelButton: false,
          });
        }
      }
    });
});
