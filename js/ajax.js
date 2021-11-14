// function upload(url,loading,msg,view){
// 	var data = new FormData();
// 	data.append('userfile',$(field)[0].files[0]);

// 	$.ajax({
// 		url: url,
// 		type: 'POST',
// 		data: data,
// 		cache: false,
// 		processData: false,
// 		contentType: false,
// 		beforeSend: function(){
// 			msg.hide();
// 			loading.show();
// 		},
// 		success: function(response){
// 			var result = response.split("<|>");

// 			if(result[0] == "SUCCESS"){
// 				loading.hide();
// 				msg.css({"color":"green"}).html(result[1]).show();
// 				view.html(result[2]);
// 			}
// 			else{
// 				loading.hide();
// 				msg.css({"color":"red"}).html(result[1]).show();
// 			}
// 		},
// 		error: function (xhr,ajaxOptions,thrownError){
// 			alert(xhr.responseText)
// 		}
// 	});
// }
// 
// Mulai Search
$(document).ready(function(){
	$("#btn-search").click(function(){
	// Ketika tombol simpan di klik
	// Ubah text tombol search menjadi SEARCHING...
	// Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
	$.LoadingOverlay("show");
	$.ajax({
		url: baseurl + 'menu/search',
		// File tujuan
		type: 'POST',
		// Tentukan type nya POST atau GET
		data: {keyword: $("#keyword").val()
	},
	// Set data yang akan dikirim
	dataType: "json",
	beforeSend: function(e) {
		if(e && e.overrideMimeType) {
			e.overrideMimeType("application/json;charset=UTF-8");
		}
	},
	success: function(response){

	// Ketika proses pengiriman berhasil
	// Ubah kembali text button search menjadi SEARCH
	// Dan hapus atribut disabled untuk meng-enable kembali button search nya
	$.LoadingOverlay("hide");
	// Ganti isi dari div view dengan view yang diambil dari controller siswa function search
	$("#keyword").val("");
	$("#view").html(response.hasil);

},
error: function (xhr, ajaxOptions, thrownError) {
	// Ketika terjadi error
	alert(xhr.responseText);
	// munculkan alert
}
});
});
});


//Mulai Filter Galeri
$(document).ready(function(){
	$('.all').on('click',function(e){
		location.hash = '';
		$.LoadingOverlay("show");
		$.post( baseurl + "gallery/sem_Gal")
		.done(function( data ) {
			$.LoadingOverlay("hide");
			$("#tampil_ktg").html(data);
		}).fail(function( data ) {
			alert( "Data Loaded Fail");
		});
	})
});



$(document).ready(function() {
	$.each($('.btn-kategori'), function(index, value) {
		$(this).on("click", function(e){
			location.hash = $(value).text();
			$.LoadingOverlay("show");
			ambilData($(value).val());
            // $("#msg").val("");
        });
	});
});
function ambilData(kategori)
{
	$.LoadingOverlay("hide");
	$.post( baseurl + "gallery/fetch_data", { kategori: kategori })
	.done(function( data ) {
		$("#tampil_ktg").html(data);
	}).fail(function( data ) {
		alert( "Data Loaded Fail");
	});
}
// $.ajax({
// 	url: baseurl+"update_status",
// })
// .done(function( data ) {
// 	if ( console && console.log ) {
// 		console.log( data );
// 	}
// 	setInterval(function(){
// 			$.ajax();
// 		}, 5000);
// });
// var timeOutId = 0;
//we store out timerIdhere
// var timeOutId = 0;
// //we define our function and STORE it in a var
// var ajaxFn = function () {
//         $.ajax({
//             url: baseurl+'update_otomatis',
//             success: function (response) {
//                 if (response == 'True') {//YAYA
//                     clearTimeout(timeOutId);//stop the timeout
//                 } else {//Fail check?
//                     timeOutId = setTimeout(ajaxFn, 500);//set the timeout again
//                     console.log("call");//check if this is running
//                     //you should see this on jsfiddle
//                     // since the response there is just an empty string
//                 }
//             }
//         });
// }
// ajaxFn();//we CALL the function we stored 
// //or you wanna wait 10 secs before your first call? 
// //use THIS line instead
// timeOutId = setTimeout(ajaxFn, 500);


// $(document).ready(function(){
// 	function my_function(){
// 		$('#refresh').get(baseurl+'update_status');
// 	}setInterval(my_function(),5000);
// });
// $(function(){
// 	$.ajax({
// 		url: baseurl+'update_status',
//         type: "post",
//         success: function(data){
//            //document.write(data); just do not use document.write
//            console.log(data);
//        }
//    });
// 	setInterval(function(){$.ajax();
// }, 5000);
// });