<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[0];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[2];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}

if ( ! function_exists('tgl_luar'))
{
	function tgl_luar($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("/",$ubah);
		$tahun = $pecah[0];
		$tanggal = $pecah[0];
		$bulan = bulan($pecah[0]);
		return $tahun.'-'.$bulan.'-'.$tanggal;
	}
}

if ( ! function_exists('tgl_balik'))
{
	function tgl_balik($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = $pecah[1];
		$tahun = $pecah[0];
		return $tanggal.'/'.$bulan.'/'.$tahun;
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if ( ! function_exists('angka_huruf'))
{
	function angka_huruf($angka)
	{
		
		if($angka=="1") {$angka="Satu";}
		else if($angka=="2") {$angka="Dua";}
		else if($angka=="3") {$angka="Tiga";}
		else if($angka=="4") {$angka="Empat";}
		else if($angka=="5") {$angka="Lima";}
		else if($angka=="6") {$angka="Enam";}
		else if($angka=="7") {$angka="Tujuh";}
		else if($angka=="8") {$angka="Delapan";}
		else if($angka=="9") {$angka="Sembilan";}
		else if($angka=="10") {$angka="Sepuluh";}
		else if($angka=="11") {$angka="Sebelas";}
		else if($angka=="12") {$angka="Dua belas";}
		else if($angka=="13") {$angka="Tiga Belas";}
		else if($angka=="14") {$angka="Empat Belas";}
		else if($angka=="15") {$angka="Lima Belas";}
		else if($angka=="16") {$angka="Enam Belas";}
		else if($angka=="17") {$angka="Tujuh Belas";}
		else if($angka=="18") {$angka="Delapan Belas";}
		else if($angka=="19") {$angka="Sembilan Belas";}
		else if($angka=="20") {$angka="Dua Puluh";}
		else if($angka=="21") {$angka="Dua Puluh Satu";}
		else if($angka=="22") {$angka="Dua Puluh Dua";}
		else if($angka=="23") {$angka="Dua Puluh Tiga";}
		else if($angka=="24") {$angka="Dua Puluh Empat";}
		else if($angka=="25") {$angka="Dua Puluh Lima";}
		else if($angka=="26") {$angka="Dua Puluh Enam";}
		else if($angka=="27") {$angka="Dua Puluh Tujuh";}
		else if($angka=="28") {$angka="Dua Puluh Delapan";}
		else if($angka=="29") {$angka="Dua Puluh Sembilan";}
		else if($angka=="30") {$angka="Tiga Puluh";}
		else if($angka=="31") {$angka="Tiga Puluh Satu";}
		else if($angka=="32") {$angka="Tiga Puluh Dua";}
		else if($angka=="33") {$angka="Tiga Puluh Tiga";}
		else if($angka=="34") {$angka="Tiga Puluh Empat";}
		else if($angka=="35") {$angka="Tiga Puluh Lima";}
		else if($angka=="36") {$angka="Tiga Puluh Enam";}
		else if($angka=="37") {$angka="Tiga Puluh Tujuh";}
		else if($angka=="38") {$angka="Tiga Puluh Delapan";}
		else if($angka=="39") {$angka="Tiga Puluh Sembilan";}
		else if($angka=="40") {$angka="Empat Puluh";}
		else if($angka=="41") {$angka="Empat Puluh Satu";}
		else if($angka=="42") {$angka="Empat Puluh Dua";}
		else if($angka=="43") {$angka="Empat Puluh Tiga";}
		else if($angka=="44") {$angka="Empat Puluh Empat";}
		else if($angka=="45") {$angka="Empat Puluh Lima";}
		else if($angka=="46") {$angka="Empat Puluh Enam";}
		else if($angka=="47") {$angka="Empat Puluh Tujuh";}
		else if($angka=="48") {$angka="Empat Puluh Delapan";}
		else if($angka=="49") {$angka="Empat Puluh Sembilan";}
		else if($angka=="50") {$angka="Lima Puluh";}
		return $angka;
	}
}

if ( ! function_exists('hitung_mundur'))
{
	function hitung_mundur($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
}

if ( ! function_exists('number_to_words'))
{
	function number_to_words($number)
	{
		// $before_comma = trim(to_word($number));
		// $after_comma = trim(comma($number));
		// return ucwords($results = $before_comma.' koma '.$after_comma);

		$before_comma = trim(to_word($number));
		// $after_comma = trim(comma($number));
		return ucwords($results = $before_comma);
	}

	function to_word($number)
	{
		$words = "";
		$arr_number = array(
		"",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan",
		"sepuluh",
		"sebelas");

		if($number<12)
		{
			$words = " ".$arr_number[$number];
		}
		else if($number<20)
		{
			$words = to_word($number-10)." belas";
		}
		else if($number<100)
		{
			$words = to_word($number/10)." puluh ".to_word($number%10);
		}
		else if($number<200)
		{
			$words = "seratus ".to_word($number-100);
		}
		else if($number<1000)
		{
			$words = to_word($number/100)." ratus ".to_word($number%100);
		}
		else if($number<2000)
		{
			$words = "seribu ".to_word($number-1000);
		}
		else if($number<1000000)
		{
			$words = to_word($number/1000)." ribu ".to_word($number%1000);
		}
		else if($number<1000000000)
		{
			$words = to_word($number/1000000)." juta ".to_word($number%1000000);
		}
		else if($number<1000000000000)
		{
			$words = to_word($number/1000000000)." milyar ".to_word($number%1000000000);
		}
		else
		{
			$words = "undefined";
		}
		return $words;
	}

	function comma($number)
	{
		$after_comma = stristr($number,',');
		$arr_number = array(
		"nol",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan");

		$results = "";
		$length = strlen($after_comma);
		$i = 1;
		while($i<$length)
		{
			$get = substr($after_comma,$i,1);
			$results .= " ".$arr_number[$get];
			$i++;
		}
		return $results;
	}
}

if (!function_exists('Rupiah'))
{
    function Rupiah($angka)
    {
        $jadi = "Rp " . number_format($angka,2,',','.');
        return $jadi;
    }
}


if ( ! function_exists('romawi'))
{
	function romawi($angka)
	{
		
		if($angka=="01") {$angka="I";}
		else if($angka=="02") {$angka="II";}
		else if($angka=="03") {$angka="III";}
		else if($angka=="04") {$angka="IV";}
		else if($angka=="05") {$angka="V";}
		else if($angka=="06") {$angka="VI";}
		else if($angka=="07") {$angka="VII";}
		else if($angka=="08") {$angka="VIII";}
		else if($angka=="09") {$angka="IX";}
		else if($angka=="10") {$angka="X";}
		else if($angka=="11") {$angka="XI";}
		else if($angka=="12") {$angka="XII";}
		
		return $angka;
	}
}

if ( ! function_exists('dateRange'))
{

function dateRange($start,$end){
        $xdate    =frmDate($start,4);
        $ydate    =frmDate($end,4);
        $xmonth    =frmDate($start,5);
        $ymonth    =frmDate($end,5);
        $xyear    =frmDate($start,6);
        $yyear    =frmDate($end,6);
        // Jika Input tanggal berada ditahun yang sama
        if($xyear==$yyear){
            // Jika Input tanggal berada dibulan yang sama
            if($xmonth==$ymonth){
                $nday=$ydate+1-$xdate;
            } else {
                $r2=NULL;
                $nmonth = $ymonth-$xmonth;           
                $r1 = nmonth($xmonth)-$xdate+1;
                for($i=$xmonth+1;$i<$ymonth;$i++){
                    $r2 = $r2+nmonth($i);
                }
                $r3 = $ydate;
                $nday = $r1+$r2+$r3;
            }
        } else {
            // Jika Input tahun awal berbeda dengan tahun akhir
            $r2=NULL; $r3=NULL;
            $r1=nmonth($xmonth)-$xdate+1;

            for($i=$xmonth+1;$i<13;$i++){
                $r2 = $r2+nmonth($i);
            }
            for($i=1;$i<$ymonth;$i++){
                $r3 = $r3+nmonth($i);
            }
            $r4 = $ydate;
            $nday = $r1+$r2+$r3+$r4;
        }           
        return $nday;
    }

}


