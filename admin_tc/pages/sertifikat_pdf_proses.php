<?php
//include "../config/connect.php";
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
$no_peserta=$_POST['peserta'];
$id_pilih_judul=$_POST['id_pilih_judul'];
$idjudul=$_POST['idjudul'];
$tgl=date("Y-m-d");
$thn=date("Y");
$id_instruktur=$_POST['id_instruktur'];
$id_nilai=$_POST['id_nilai'];
$keterangan=$_POST['keterangan'];
$kerjasama=$_POST['kerjasama'];	
$director	=$_POST['director'];
$nobarcode	=$_POST['nobarcode'];

$query=mysql_query("SELECT max(id_sertifikat) as idmax from tb_sertifikat");
$view_max=mysql_fetch_array($query);
$max=$view_max['idmax'];

if($_POST['formsertifikat']){
$query_insert_buat=mysql_query("
INSERT INTO tb_sertifikat
VALUES (
'' , '".$_POST['nosertifikat']."', '$no_peserta', '$id_pilih_judul', '$tgl', '$id_instruktur','$director', '$id_nilai','$nobarcode','$keterangan', '$kerjasama')");
if(!$query_insert_buat){
	echo mysql_error();
}else{
	$id_terakir=mysql_insert_id();
	/*echo "<script>location.href =('pages/convert_pdf/sertifikat_convert_pdf2.php?idterakir=$id_terakir'); </script>";*/
		echo "<script>location.href =('index.php?page=sertifikat_model&idterakir=$id_terakir'); </script>";
}
}else{
foreach($no_peserta as $n => $nama){
$nilai++;
$idst=$max + $nilai;
//echo $nama." ".$id_pilih_judul[$n]." ".$id_instruktur[$n]." ".$id_nilai[$n]." ".$keterangan." ".$kerjasama." ".$tgl."$thn/$idjudul/$idst"."<br>";
$query_insert=mysql_query("
INSERT INTO tb_sertifikat 
VALUES (
'' , '$thn/$idjudul/$idst', '$nama', '$id_pilih_judul[$n]', '$tgl', '$id_instruktur[$n]','$director', '$id_nilai[$n]','$nobarcode', '$keterangan', '$kerjasama'
)
");
/*
$ids[] = 'nopeserta['.$n.']=' . $nama.'&'.'idpilihjudul['.$n.']=' .$id_pilih_judul[$n];
endforeach;
$idpeserta = implode( '&', $ids);
if(!$query_insert){
	ECHO mysql_error()."<br>";
}
else{
echo "<script>location.href =('sertifikat_convert_csv.php?$idpeserta'); </script>";
  }*/
  }
}
?>
<?php }?>