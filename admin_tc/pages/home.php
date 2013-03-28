<?php
require_once "ceklogin.php";
?>
<div id="content">
<?php
$qry_pesan=mysql_query("select * from tb_tamu where baca=0 order by id_tamu desc");
if (mysql_num_rows($qry_pesan)>0){echo "<p id='pesan_ter'>".mysql_num_rows($qry_pesan)." pesan belum dibaca </p>";}else{}

$qry_jad=mysql_query("select tb_jadwal_training.id_jadwal_training, tb_judul.judul_training, tb_judul.ket, tb_judul.id_judul,  tb_jadwal_training.tgl1, tb_jadwal_training.tgl2, tb_jadwal_training.jam_mulai, tb_jadwal_training.jam_selesai, tb_jadwal_training.ket_sertifikat 
from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul order by tb_judul.judul_training asc");
if(mysql_num_rows($qry_jad)<0)
{}
else
{
?>
<div id="pel_jalan">
<p id="pel_title">Pelatihan Berjalan</p>
<?php
$no=1;
while($arr_jad=mysql_fetch_array($qry_jad))
{	
$dates=substr($arr_jad['4'],5,2);
switch ($dates)
{
	case "01": $bulan1 = "Januari"; 	break;
	case "02": $bulan1 = "Februari";	break;
	case "03": $bulan1 = "Maret"; 		break;
	case "04": $bulan1 = "April"; 		break;
	case "05": $bulan1 = "Mei";			break;
	case "06": $bulan1 = "Juni"; 		break;
	case "07": $bulan1 = "Juli"; 		break;
	case "08": $bulan1 = "Agustus"; 	break;
	case "09": $bulan1 = "September"; 	break;
	case "10": $bulan1 = "Oktober"; 	break;
	case "11": $bulan1 = "November"; 	break;
	case "12": $bulan1 = "Desember"; 	break;
}
$dates=substr($arr_jad['5'],5,2);
switch ($dates)
{
	case "01": $bulan2 = "Januari"; 	break;
	case "02": $bulan2 = "Februari";	break;
	case "03": $bulan2 = "Maret"; 		break;
	case "04": $bulan2 = "April"; 		break;
	case "05": $bulan2 = "Mei";			break;
	case "06": $bulan2 = "Juni"; 		break;
	case "07": $bulan2 = "Juli"; 		break;
	case "08": $bulan2 = "Agustus"; 	break;
	case "09": $bulan2 = "September"; 	break;
	case "10": $bulan2 = "Oktober"; 	break;
	case "11": $bulan2 = "November"; 	break;
	case "12": $bulan2 = "Desember"; 	break;
}

	$datenow	=date("Y/m/d");	
	$tgl_mulai		=$arr_jad['4'];
	$tgl_selesai	=$arr_jad['5'];
	if($datenow>=$tgl_mulai && $datenow<=$tgl_selesai)
	{	
	echo "
	<a href='#' style='text-decoration:none'>
	<p class='jad_no'>
	$no. $arr_jad[1]
	<span style='float:right'>".substr($arr_jad['4'],8,2)." ".$bulan1." ".substr($arr_jad['4'],0,4)." s/d ".substr($arr_jad['5'],8,2)." ".$bulan2." ".substr($arr_jad['5'],0,4)."</span>
	</p>
	</a>";
	$no ++;
	}
	else
	{echo "";}
}
?>
</div>
<?php } ?>
<div id="jadwal_pel">
<p id="tit_jad">Jadwal Terdekat</p>
<?php 
function selisihTgl($tgl1,$tgl2){
$pecah	=explode("/", $tgl1);
$year1	=$pecah[0];
$month1	=$pecah[1];
$date1	=$pecah[2];
$pecah2	=explode("/", $tgl2);
$year2	=$pecah2[0];
$month2	=$pecah2[1];
$date2	=$pecah2[2];
$jd1=gregorianToJD($month1,$date1,$year1);
$jd2=gregorianToJD($month2,$date2,$year2);
$s=$jd2-$jd1;
return $s;
}

$date	=date("Y/m/d");	
$query_notikasi=mysql_query("select * from `tb_jadwal_training`,tb_judul where tb_jadwal_training.id_judul = tb_judul.id_judul ORDER BY `id_jadwal_training` ASC");
$ni=1;
while($row_notifikasi	=mysql_fetch_array($query_notikasi)){
$tgl1		=$row_notifikasi['tgl1'];
$id_jadwal	=$row_notifikasi['id_jadwal_training'];
$idjudul	=$row_notifikasi['id_judul'];
$idpelatihan=$row_notifikasi['id_details_pelatihan'];
$query_kelas=mysql_query("select * from tb_kelas where id_jadwal_training = '$id_jadwal'");
$row_kelas	=mysql_fetch_array($query_kelas);
$selisih	=selisihTgl($date,$tgl1);

if($selisih < 100 and $selisih > 0)
{
	if(!$id_jadwal == $row_kelas['id_jadwal_training'])
	{echo "
	<a href='index.php?page=pel&pages=jadwal_training_view&idp=$idpelatihan&jd=$idjudul' style='text-decoration:none'><p class='jad_no'>$ni. $row_notifikasi[judul_training] <span style='float:right'><b>$selisih</b> hari lagi</span></p></a>";$ni ++;
	}
}
}
?>
</div>
</div>