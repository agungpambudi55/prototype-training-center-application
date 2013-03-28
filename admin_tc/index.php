<?php
$file_i	="../installation/lock.conetc";
if(file_exists($file_i)){
session_start();
if (@$_SESSION['user_name']==""){
echo "<script>alert('Anda harus login dahulu'); location.href = ('pages/login.php');</script>";
}
else
{?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel Training Center</title>
<link rel="shortcut icon" href="style/images/favicon.png" />
<link rel="stylesheet" href="style/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
</head>
<body>
<?php include "config/connect.php"; 
include "config/function.php"; 

?>
<a href="../index.php" id="view_site" target="_blank">Lihat Website</a>
<p id='help' onclick="window.open('pages/help.php','','resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no');"></p>

<p id="pengaturan" class="con1">Pengaturan</p>
<p id="pengaturan" class="con2">Pengaturan</p>

<div id="control">
<a href="index.php?page=modul_managemen"><p class="modul">Modul Hak Akses</p></a>
<a href="index.php?page=user_manajemen"><p class="user">Pengguna</p></a>
<a href="index.php?page=direktur"><p class="director">TTD<br />Direktur & Kwitansi</p></a>
<a href="index.php?page=aksesoris"><p class="homepage">Aksesoris</p></a>
<a href="index.php?page=jumlah_max_kelas_insert"><p class="kls_mak">Kelas Maksimal</p></a>
<a href="index.php?page=backup_and_restore"><p class="backres">Backup dan Restore</p></a>
</div>

<p id="account"><?php echo $_SESSION['user_name']; ?></p>
<p id="acc_down"></p>
<p id="acc_up"></p>
<div id="account_con">
<a href="index.php?page=account"><p class="us_acc">Akun</p></a>
<a href="pages/logout.php"><p class="logout">Keluar</p></a>
</div>

<div id="header">
<div id="title_header">
<?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='$arr_aks[photo]' style='height:60px; width:60px;vertical-align:middle'/> ".$arr_aks['keterangan'];
?>
</div>
</div>

<div id="sidebar">
<p style="text-align:center; margin:0; border:0px solid gray; padding:15px 0px 0px 0px; font-size:12px; font-weight:bold">
<?php echo hari(date("Y-m-d")).", ".tanggal(date("Y-m-d")); ?></p>
<p style="text-align:center; margin:0; padding:5px 0px 15px 0px; font-size:17px; font-weight:bold" id="clockDisplay"></p>
<ul>
	<a href="index.php"><li class="home">Home</li></a>
    <a href="index.php?page=peserta"><li class="peserta">Peserta</li></a>
    <a href="index.php?page=kelas"><li class="kelas">Kelas</li></a>
    <a href="index.php?page=pel"><li class="pelatihan">Pelatihan</li></a>
    <a href="index.php?page=instruktur_view"><li class="instruktur">Instruktur</li></a>
    <a href="index.php?page=absen"><li class="absen">Absen</li></a>
    <a href="index.php?page=nilai"><li class="nilai">Status Nilai</li></a>
    <a href="index.php?page=sertifikat_view"><li class="sertifikat">Sertifikat</li></a>
    <a href="index.php?page=laporan"><li class="laporan">Laporan</li></a>
    <a href="index.php?page=buku_tamu_view"><li class="bukutamu">Buku Tamu</li></a>
</ul>
</div>

<div id="container">
<div id="container_box">
<?php
if(@$_GET['page']) 
{
$page=$_GET['page'];
require_once("pages/".$page.".php");
}
else
{require_once("pages/home.php");}
?>
</div>
</div>

</body>
<script src="js/javascript.js" type="text/javascript"></script>
</html>
<?php
}
}else{
header("location: ../installation/setup-config.php");
}
?>