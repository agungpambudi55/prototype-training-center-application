<?php
session_start();
include("connect.php");
require_once "ceklogin.php";
?>
<?php
$input 		= $_GET['tanggal'];
$query_cek_jadwal=mysql_query("select *from tb_jadwal_training where id_jadwal_training = '$input'");
$row_cek	=	mysql_fetch_array($query_cek_jadwal);

$tgl1=$row_cek['tgl1'];
//echo "<br>";
$tgl2=$row_cek['tgl2'];
$pecah	=explode("/", $tgl1);
$date	=$pecah[2];
$bulan	=$pecah[1];
$tahun	=$pecah[0];
$pecah2	=explode("/", $tgl2);
$date2	=$pecah2[2];
$bulan2	=$pecah2[1];
$tahun2	=$pecah2[0];
$jd_tgl1 = GregorianToJD($bulan, $date, $tahun);
$jd_tgl2 = GregorianToJD($bulan2, $date2, $tahun2);

//$query_jadwal=mysql_query("select *from tb_jadwal_training");
$query_jadwal	=mysql_query("SELECT * FROM tb_jadwal_training, tb_kelas WHERE tb_kelas.id_jadwal_training = tb_jadwal_training.id_jadwal_training ");
$query_tempat	=mysql_query("select *from tb_tempat");

while($row_jadwal	=mysql_fetch_array($query_jadwal)){
//iki query
$pecah3	=explode("/", $row_jadwal['tgl1']);
$date3	=$pecah3[2];
$bulan3	=$pecah3[1];
$tahun3	=$pecah3[0];
$pecah4	=explode("/", $row_jadwal['tgl2']);
$date4	=$pecah4[2];
$bulan4	=$pecah4[1];
$tahun4	=$pecah4[0];
$jd_tgl3 = GregorianToJD($bulan3, $date3, $tahun3);
$jd_tgl4 = GregorianToJD($bulan4, $date4, $tahun4);

if($jd_tgl3 >= $jd_tgl1 and $jd_tgl3 <= $jd_tgl2 or $jd_tgl4 >= $jd_tgl1 and $jd_tgl4 <= $jd_tgl2)
{
//echo "iki sek ngulang = ".$row_jadwal['id_tempat']."<br>";
//echo "iki instruktur ngulang kondisi tgl1 = ".$row_jadwal['tgl1']."<br>";
//echo "iki instruktur ngulang kondisi tgl2 = ".$row_jadwal['tgl2']."<br>";
$idtempat[]	=$row_jadwal['id_tempat'];
}
else{
//echo " kondisi tgl1 = ".$row_jadwal['tgl1']."<br>";
//echo " kondisi tgl2 = ".$row_jadwal['tgl2']."<br>";
//echo $row_jadwal['id_instruktur']."<br>";
//echo $row_instruktur['id_instruktur']."<br>";
	}
}

if(is_array(@$idtempat)){
while($row_tempat=mysql_fetch_array($query_tempat))
{
	foreach($idtempat as $valu)
	{
		if($row_tempat['id_tempat'] == $valu){}
		else{
		echo "<input type='radio' name='tempat' value='".$row_tempat['id_tempat']."' required>".$row_tempat['nama_tempat']."<br>";
		}
	}
}
}

else
{
while($row_tempat=mysql_fetch_array($query_tempat))
{
	echo "<input type='radio' name='tempat' value='".$row_tempat['id_tempat']."' required>".$row_tempat['nama_tempat']."<br>";

}
}
?>
