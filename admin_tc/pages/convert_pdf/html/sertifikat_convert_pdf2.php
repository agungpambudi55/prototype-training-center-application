<?php
session_start();
if(empty($_SESSION['user_name']))
	{header('location: ../login.php');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard Training Center EEPIS</title>
<link rel="shortcut icon" href="../../../style/images/favicon.png">
<?php
include "../../config/connect.php";
require_once "../../config/fungsi.php";
$id_terakir=$_GET['idterakir'];
$query_tampil=mysql_query("
SELECT tb_sertifikat.no_sertifikat, tb_sertifikat.tgl_sertifikat, tb_nilai.nilai, tb_sertifikat.kerjasama, tb_sertifikat.ket, tb_daftar_peserta.nama, tb_judul.judul_training, tb_instruktur.nama ,tb_sertifikat.director
FROM tb_sertifikat, tb_daftar_peserta, tb_pilih_judul, tb_judul, tb_instruktur, tb_nilai
WHERE tb_daftar_peserta.no_peserta = tb_sertifikat.no_peserta
AND tb_pilih_judul.id_pilih_judul = tb_sertifikat.id_pilih_judul
AND tb_pilih_judul.id_judul = tb_judul.id_judul
AND tb_instruktur.id_instruktur = tb_sertifikat.id_instruktur
AND tb_sertifikat.id_nilai = tb_nilai.id_nilai
AND tb_sertifikat.id_sertifikat =$id_terakir ORDER BY `no_sertifikat` ASC");

$query_idsertifikat=mysql_query("select *From tb_sertifikat where id_sertifikat=$id_terakir");
$row_id_serifikat=mysql_fetch_array($query_idsertifikat);
$query_lama=mysql_query("SELECT * FROM tb_kelas,tb_peserta_kelas,tb_jadwal_training where tb_kelas.id_kelas=tb_peserta_kelas.id_kelas and tb_jadwal_training.id_jadwal_training=tb_kelas.id_jadwal_training and tb_peserta_kelas.id_pilih_judul='$row_id_serifikat[id_pilih_judul]'");
$row_lama=mysql_fetch_array($query_lama);

$row_sertifikat=mysql_fetch_array($query_tampil);
?>


<style type="text/css">
#container{
	margin-top:0px;
	border:0px solid #000;
	background:url(./html/images/bg.png) no-repeat;
	width:1090px;
	height:740px;
	padding-left:-95px;
	margin-left:40px;
}
#head1{ border:0px solid gray;padding-top:80px; margin:auto; text-align:center	}
.p0{margin:0; padding:0; font-size:20px; text-align:right; padding-right:80px; padding-bottom:30px}
.p1{margin:0; padding:0; font-size:55px; padding-bottom:10px}
.p2{margin:0; padding:10px; font-size:30px;padding-bottom:10px;}
.p3{margin-top:195px; padding:0; font-size:25px; font-weight:bold; margin-left:130px; padding-bottom:20px; }
.p4{margin:0; padding:0; font-size:15px; padding-bottom:10px; margin-left:150px; margin-top:3px; }
.p5{margin:118px 0px 0px 165px; padding:0; font-size:20px; padding-bottom:5px; margin-bottom:100px;}
.p6{margin:0; padding:0; font-size:23px; font-weight:bold; margin-left:150px; padding-bottom:5px;}
.p7{margin:0; padding:0; font-size:25px;}
.p8{margin:0; padding:0; font-size:30px; font-weight:bold; padding-bottom:5px;}
.p9{margin:100px 0px 0px 150px; padding:0; font-size:15px;}
#footer{height:140px; border:0px solid gray}
#ttd{height:140px; margin-left:800px; width:200px; border:0px solid gray; text-align:center;}
.pp0{margin:0; padding:0; font-size:20px; font-weight:bold; padding-bottom:70px; padding-top:10px}
.pp1{margin:0; padding:0; font-size:20px; font-weight:bold}
</style>
</head>
<body>
<div id="container">
<div id="head1">
<p class="p3"><?php echo $row_sertifikat['5'];?></p>
<p class="p6"><?php echo $row_sertifikat['6'];?></p>
<p class="p4">Surabaya, <?php echo " ".tanggal_lama($row_lama['tgl1']); ?> to <?php echo " ".tanggal_lama($row_lama['tgl2']); ?></p>
<p class="p9">Surabaya <?php echo tanggal($row_sertifikat['tgl_sertifikat']); ?></p>
<p class="p5"><?php echo $row_sertifikat['director'];?></p>
</div>
<div id="footer">
</div>
</div>
</body>
</html>