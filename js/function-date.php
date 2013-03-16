<?php

function tanggal($tanggal)
	{
		$tanggal  = date("Y/m/d",strtotime($tanggal));
		$tanggal  = explode("/",$tanggal);
		$hari		 = $tanggal[2];
		switch(trim($tanggal[1]))
		{
			case "01";	$bulan = "Januari";		break;
			case "02";	$bulan = "Februari";	break;
			case "03";	$bulan = "Maret";			break;
			case "04";	$bulan = "April";			break;
			case "05";	$bulan = "Mei";			  break;
			case "06";	$bulan = "Juni";			break;
			case "07";	$bulan = "Juli";			break;
			case "08";	$bulan = "Agustus";		break;
			case "09";	$bulan = "September";	break;
			case "10";	$bulan = "Oktober";		break;
			case "11";	$bulan = "November";	break;
			case "12";	$bulan = "Desember";	break;
		}
		$tahun = $tanggal[0];
		return $hari." ".$bulan." ".$tahun;
	}
	
function hari($tanggal)
  {
    $day  = date("D",strtotime($tanggal));
    switch(trim($day))
		{
			case "Sun";	$hari = "Minggu";	break;
			case "Mon";	$hari = "Senin";	break;
			case "Tue";	$hari = "Selasa";	break;
			case "Wed";	$hari = "Rabu";		break;
			case "Thu";	$hari = "Kamis";	break;
			case "Fri";	$hari = "Jumat";	break;
			case "Sat";	$hari = "Sabtu";	break;
		}
    return $hari;
  }
  

?>