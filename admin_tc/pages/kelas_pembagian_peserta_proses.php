<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{
?>
<?php
if($_POST['form_kelas']){
/*$query_insert=mysql_query("insert into tb_kelas values ('','$_POST[id_jadwal]','$_POST[instruktur]','$_POST[tempat]','$_POST[tahun]','$_POST[nama_kelas]','$_POST[peserta_max]','')");
$id_insert=mysql_insert_id();
$id_pilih_judul=$_POST['id_pilih_judul'];
$no_peserta=$_POST['no_peserta'];
foreach($_POST['no_peserta'] as $n => $v){
if($n>=$_POST['peserta_max']){
}else{
$query_pembagian=mysql_query("insert into tb_peserta_kelas values ('','$id_insert','$v','$id_pilih_judul[$n]')");
echo "<script> location.href=('index.php?page=jadwal_training_jumlah_judul'); </script>";
	}
}
*/
$id_pilih_judul=$_POST['id_pilih_judul'];
$no_peserta=$_POST['no_peserta'];
$jmlmax=count($no_peserta);
$kelas=ucwords($_POST['nama_kelas']);
$date		=date("Y/m/d");
$query_1=mysql_query("select *from tb_kelas where nama_kelas='".$_POST['nama_kelas']."'");
$cek=mysql_fetch_array($query_1);
if(($_POST['instruktur']=='')or($_POST['tempat']=='')or($_POST['nama_kelas']=='')or($_POST['tahun']=='')or($no_peserta=='')){
	echo"<script> alert('Data Empty, isi dengan benar'); location.href=('javascript:self.history.back();'); </script>";
}
else if($cek){
	echo "<script> alert('Nama Kelas Sudah Dipakai'); location.href=('javascript:self.history.back();'); </script>";
	}
else{
$query_insert=mysql_query("insert into tb_kelas values ('','$_POST[id_jadwal]','$_POST[instruktur]','$_POST[tempat]','$_POST[tahun]','$kelas','$jmlmax','','$date')");
$id_insert=mysql_insert_id();
foreach($no_peserta as $n => $value){
$query_pembagian=mysql_query("insert into tb_peserta_kelas values ('','$id_insert','$value','$id_pilih_judul[$n]')");
if(!$query_pembagian){
echo "gagal";
	}else{
		echo "<script> location.href=('index.php?page=kelas&ref=add'); </script>";}
}
}
}
?>
<?php }?>