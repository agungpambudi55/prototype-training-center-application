<?php
session_start();
if(empty($_SESSION['user_name']))
{header('location:login.php');}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard Training Center EEPIS</title>
<link rel="shortcut icon" href="../style/images/favicon.png">
<?php
include "../config/connect.php";
require_once "../config/fungsi.php";
$id_terakir=$_GET['idterakir'];
$query_tampil=mysql_query("
SELECT tb_sertifikat.no_sertifikat, tb_sertifikat.tgl_sertifikat, tb_nilai.nilai, tb_sertifikat.kerjasama, tb_sertifikat.ket, tb_daftar_peserta.nama, tb_judul.judul_training, tb_instruktur.nama ,tb_director.director,tb_sertifikat.no_barcode
FROM tb_sertifikat, tb_daftar_peserta,tb_director, tb_pilih_judul, tb_judul, tb_instruktur, tb_nilai
WHERE tb_daftar_peserta.no_peserta = tb_sertifikat.no_peserta
AND tb_pilih_judul.id_pilih_judul = tb_sertifikat.id_pilih_judul
AND tb_pilih_judul.id_judul = tb_judul.id_judul
AND tb_instruktur.id_instruktur = tb_sertifikat.id_instruktur
AND tb_sertifikat.id_nilai = tb_nilai.id_nilai
AND tb_sertifikat.id_director = tb_director.id_director
AND tb_sertifikat.id_sertifikat ='$id_terakir' ORDER BY `no_sertifikat` ASC");
$query_idsertifikat=mysql_query("select *From tb_sertifikat where id_sertifikat=$id_terakir");
$row_id_serifikat=mysql_fetch_array($query_idsertifikat);
$query_lama=mysql_query("SELECT * FROM tb_kelas,tb_peserta_kelas,tb_jadwal_training where tb_kelas.id_kelas=tb_peserta_kelas.id_kelas and tb_jadwal_training.id_jadwal_training=tb_kelas.id_jadwal_training and tb_peserta_kelas.id_pilih_judul='$row_id_serifikat[id_pilih_judul]'");
$row_lama=mysql_fetch_array($query_lama);
$row_sertifikat=mysql_fetch_array($query_tampil);
?>
<style type="text/css">
*{margin:0; padding:0;}
#content{
	font-family:Verdana, Geneva, sans-serif;
	border:0px solid gray;
	height:670px;
	font-size:15px}
p{ border:0px solid gray; text-align:center}
.pgambar{ margin:0px 0px 0px 0px; padding:25px 0px 0px 10px;}
.p1{ margin:-75px 0px 0px 0px; padding:0px 0px 0px 0px; font-size:80px; font-family:"Edwardian Script ITC"}
.p2{ margin:0px 0px 0px 0px; padding:30px 0px 0px 0px; font-size:40px; font-family:"Edwardian Script ITC"}
.p3{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px; font-size:22px; font-weight:bold}
.p4{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px; font-size:40px; font-family:"Edwardian Script ITC"}
.p5{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px; font-size:22px; font-weight:bold}
.p6{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px; font-size:14px;}
.p7{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px; font-size:21px; font-family:Vijaya}
.p8{ margin:0px 0px 0px 0px; padding:5px 0px 0px 0px; font-size:21px; font-family:Vijaya}
.p9{ margin:0px 0px 0px 0px; padding:60px 0px 0px 0px; font-size:14px;}
.p10{ margin:0px 0px 0px 0px; padding:100px 0px 0px 0px; font-size:14px; text-decoration:underline}
.p11{ margin:0px 0px 0px 0px; padding:0px 0px 0px 0px; font-size:14px;}
.p12{ margin:-50px 0px 0px 600px; padding:0px 0px 0px 0px;}
</style>
</head>
<body onLoad="window.print()">


<div id="content">
<?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='../$arr_aks[photo]' class='pgambar'/>";
?>
<p class="p1">Certificate of Completion</p>
<p class="p2">This certificate is awarded to</p>
<p class="p3"><?php echo $row_sertifikat['5'];?></p>
<p class="p4">In recognized of the successful completion</p>
<p class="p5"><?php echo $row_sertifikat['6'];?></p>
<p class="p6">Surabaya, <?php echo " ".tanggal_lama($row_lama['tgl1']); ?> to <?php echo " ".tanggal_lama($row_lama['tgl2']); ?></p>
<p class="p7">Organized by</p>
<p class="p8">Training Center of Electronic Engineering Polytechnic Institute of Surabaya (EEPIS)</p>
<p class="p9">Surabaya, <?php echo tanggal($row_sertifikat['tgl_sertifikat']); ?></p>
<p class="p10"><?php echo $row_sertifikat['director'];?></p>
<p class="p11">Director</p>
<p class="p12"><?php include ("barcode/html/BCGisbn.php"); ?></p>

</div>
</body>
</html>