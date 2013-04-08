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
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"
<style type='text/css'>
body{ font-family:Verdana, Geneva, sans-serif; font-size:19px; background:url(../$arr_aks[photo]) no-repeat 50% 165px}
</style>
";
?>
<style type="text/css">
*{margin:0; padding:0;}
p{ border01px solid gray; text-align:center}
.p1{ margin:35px 0px 0px 0px; padding:10px 0px 17px 0px; font-size:60px; background:#35AEFF; color:#FFF;font-family:"Monotype Corsiva"; border-top:2px dotted #FFF;border-bottom:2px dotted #FFF; text-shadow:4px 4px 3px #666666}
.p2{ margin:0px 0px 0px 0px; padding:135px 0px 0px 0px;}
.p3{ margin:0px 0px 0px 0px; padding:3px 0px; font-weight:bold; font-size:20px}
.p4{ margin:0px 0px 0px 0px; padding:3px 0px;}
.p5{ margin:0px 0px 0px 0px; padding:3px 0px;font-weight:bold; font-size:20px}
.p6{ margin:0px 0px 0px 0px; padding:3px 0px; font-size:15px}
.p7{ margin:0px 0px 0px 0px; padding:3px 0px;}
.p8{ margin:0px 0px 0px 0px; padding:3px 0px;}
.p9{ margin:0px 0px 0px 0px; padding:30px 0px 0px 0px; font-size:15px}
.p10{ margin:0px 0px 0px 0px; padding:100px 0px 0px 0px; text-decoration:underline; font-size:15px}
.p11{ margin:0px 0px 0px 0px; padding:2px 0px 0px 0px; font-size:15px}
.p12{ margin:-50px 0px 0px 600px; padding:0px 0px 0px 0px;}
</style>
</head>
<body onLoad="window.print()">
<p class="p1">Certificate of Completion</p>
<p class="p2">This certificate is awarded to</p>
<p class="p3"><?php echo $row_sertifikat['5'];?></p>
<p class="p4">In recognized of the successful completion of</p>
<p class="p5"><?php echo $row_sertifikat['6'];?></p>
<p class="p6">Surabaya, <?php echo " ".tanggal_lama($row_lama['tgl1']); ?> to <?php echo " ".tanggal_lama($row_lama['tgl2']); ?></p>
<p class="p7">Organized by</p>
<p class="p8">Training Center of Electronic Engineering Polytechnic Institute of Surabaya (EEPIS)</p>
<p class="p9">Surabaya, <?php echo tanggal($row_sertifikat['tgl_sertifikat']); ?></p>
<p class="p10"><?php echo $row_sertifikat['director'];?></p>
<p class="p11">Director</p>
<p class="p12"><?php include ("barcode/html/BCGisbn.php"); ?></p>
</body>
</html>
