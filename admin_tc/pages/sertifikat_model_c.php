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
	height:620px;
	font-size:15px	}
p{ border:0px solid gray; text-align:center; font-family:Arial, Helvetica, sans-serif}
body{font-size:15px; font-weight:bold}
.pgambar{ margin:0px 0px 0px 0px; padding:20px 0px 0px 10px;}
.p1{ margin:-100px 0px 0px 0px; padding:0px 0px 0px 0px; font-weight:bold; font-size:22px; line-height:30px}
.p2{ margin:0px 0px 0px 0px; padding:25px 0px 0px 0px; font-weight:bold; font-size:50px;}
.p3{ margin:0px 0px 0px 0px; padding:20px 0px 0px 0px;}
.p4{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px; font-weight:bold; font-size:26px;}
.p5{ margin:0px 0px 0px 0px; padding:8px 0px 0px 0px;}
.p6{ margin:0px 0px 0px 0px; padding:10px 0px 0px 0px; font-size:18px;}
.p7{ margin:0px 0px 0px 0px; padding:15px 0px 0px 0px;}
.p8{ margin:10px 0px 0px 0px; padding:5px 0px 0px 0px;}
.p9{ margin:0px 0px 0px 0px; padding:5px 0px 0px 0px;}
.p10{ margin:0px 0px 0px 0px; padding:5px 0px 0px 0px;}
.p11{ margin:0px 0px 0px 0px; padding:5px 0px 0px 0px;}
.p12{ margin:0px 0px 0px 0px; padding:40px 0px 0px 0px;}
.p13{ margin:0px 0px 0px 0px; padding:105px 0px 0px 0px; text-decoration:underline;}
.p14{ margin:0px 0px 0px 0px; padding:5px 0px 0px 0px;}
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
<p class="p1">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<BR />POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</p>
<P class="p2">SERTIFIKAT</P>
<P class="p3">Diberikan kepada:</P>
<p class="p4"><?php echo $row_sertifikat['5'];?></p>
<p class="p5">Telah mengikuti</p>
<p class="p6"><?php echo $row_sertifikat['6'];?><br /><?php echo $row_sertifikat['4'];?></p>
<p class="p7">di <?php echo $row_sertifikat['3'];?> mulai tanggal <?php $a=explode('/',$row_lama['tgl1']); echo $a['2'];?> - <?php echo " ".tanggal_lama($row_lama['tgl2']); ?></p>
<p class="p8">Kerjasama Antara</p>
<p class="p9"><?php echo $row_sertifikat['3'];?></p>
<p class="p10">Dengan</p>
<p class="p11">POLITEKNIK ELEKTRONIKA NEGERI SURABAYA DAN GOOGLE</p>
<p class="p12">Surabaya, <?php echo tanggal($row_sertifikat['tgl_sertifikat']); ?></p>
<p class="p13"><?php echo $row_sertifikat['director'];?></p>
<p class="p14">Direktur</p>
</div>
</body>
</html>
