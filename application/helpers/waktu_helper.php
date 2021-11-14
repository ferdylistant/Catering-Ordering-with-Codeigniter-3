<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



function waktu_lalu($timestamp)

{

	$selisih = time()-strtotime($timestamp);
	$detik	= $selisih;
	$menit 	= round($selisih/60);
	$jam	= round($selisih/3600);
	$hari	= round($selisih/86400);
	$minggu	= round($selisih/604800);
	$bulan	= round($selisih/2419200);
	$tahun	= round($selisih/31536000);
	if ($detik <=60) {
		if ($detik <=0) {
			$waktu = 'Baru saja';
		}
		else{
			$waktu = $detik.' detik yang lalu';
		}
		
	}
	elseif ($menit <=60) {
		$waku = $menit.' menit yang lalu';
	}
	elseif ($jam <=24) {
		$waktu = $jam.' jam yang lalu';
	}
	elseif ($hari <=7) {
		$waktu = $hari.' hari yang lalu';
	}
	elseif ($minggu <=4) {
		$waktu = $minggu.' minggu yang lalu';
	}
	elseif ($bulan <=12) {
		$waktu = $bulan.' bulan yang lalu';
	}
	else{
		$waktu = $tahun.' tahun yang lalu';
	}
	return $waktu;

}
// function waktu_lalu($timestamp){
// 	$date = $timestamp;
// 	$pemesanan = strtotime($date);
// 	$interval_waktu =  time() - $pemesanan;
// 	$periode = array('detik','menit','jam','hari','minggu','bulan','tahun','dekade');
// 	$satuan = array('60','60','24','7','4.35','12','10');
// 	if ($interval_waktu > 0) {
// 		$akhir = 'yang lalu';
// 	} 
// 	else {
// 		$interval_waktu =-$interval_waktu;
// 		$akhir = 'baru saja';
// 	}
// 	for ($j=0; $interval_waktu >= $satuan[$j]; $j++){  
// 		$interval_waktu /= $satuan[$j];

// 		$interval_waktu = round($interval_waktu);

// 		if ($interval_waktu == 0) {
// 			$teks = "$akhir";
// 		}
// 		else{
// 			$teks = "$interval_waktu $periode[$j] $akhir";
// 		}
// 	}
// 	return $teks;
// }