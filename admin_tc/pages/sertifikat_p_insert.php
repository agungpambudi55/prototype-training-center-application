<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
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
$direktur=$_POST['direktur'];

$query_pelatihan	=mysql_query("SELECT * FROM tb_judul,tb_detail_pelatihan where tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan and tb_judul.id_judul='$idjudul'");
$row_pelatihan	=mysql_fetch_array($query_pelatihan);
$query_pelatihan2	=mysql_query("SELECT * FROM tb_judul,tb_detail_pelatihan where tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan and tb_judul.id_judul='$idjudul'");
$row_pelatihan2	=mysql_fetch_array($query_pelatihan2);
$query=mysql_query("SELECT max(id_sertifikat) as idmax from tb_sertifikat");
$view_max=mysql_fetch_array($query);
$max=$view_max['idmax'];


if($_POST['setifikatcsv'])
//else
{
foreach($no_peserta as $n => $nama){
$nilai++;
$idst=$max + $nilai;
$nobarcode	=$thn.$idst.$row_pelatihan['id_details_pelatihan'].$idjudul.$_GET['nopeserta'].$nama;
$nomor_sertifikat=$thn."/".$idst."/".$row_pelatihan2['id_details_pelatihan']."/".$idjudul;
$query_insert=mysql_query("
INSERT INTO tb_sertifikat
VALUES ('' , '$nomor_sertifikat', '$nama', '$id_pilih_judul[$n]', '$tgl', '$id_instruktur[$n]', '1', '$id_nilai[$n]','$nobarcode', '$keterangan', '$kerjasama'
)");

if(!$query_insert){
	echo mysql_error();
}

  }
}
?>
