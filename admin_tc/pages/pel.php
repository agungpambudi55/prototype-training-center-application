<?php
@$pagestab = $_GET['pages'];
if($pagestab == 'kategori'){
$actived_kategori = "class='tabactived'";
}else if($pagestab == 'pelatihan'){
$actived_pelatihan = "class='tabactived'";
}else if($pagestab == 'jenis_peserta'){
$actived_jenis = "class='tabactived'";
}else if($pagestab == 'judul_view'){
$actived_judul = "class='tabactived'";
}else if($pagestab == 'biaya_pelatihan'){
$actived_biaya = "class='tabactived'";
}else if($pagestab == 'tempat'){
$actived_tempat = "class='tabactived'";
}else if($pagestab == 'jadwal_view' || $pagestab == 'jadwal_training_view'){
$actived_jadwal = "class='tabactived'";
}
?>


<div id="tab_menu">
<ul>
	<a href="index.php?page=pel&pages=kategori"><li <?php echo $actived_kategori; ?> style=" border-bottom:1px solid #CCC;">Kategori Pelatihan</li></a>
	<a href="index.php?page=pel&pages=pelatihan"><li <?php echo $actived_pelatihan; ?> style=" border-bottom:1px solid #CCC;">Pelatihan</li></a>
	<a href="index.php?page=pel&pages=jenis_peserta"><li <?php echo $actived_jenis; ?> style=" border-bottom:1px solid #CCC; ">Jenis Peserta</li></a>
	<a href="index.php?page=pel&pages=judul_view"><li <?php echo $actived_judul; ?> style=" border-bottom:1px solid #CCC;">Judul Pelatihan</li></a>
	<a href="index.php?page=pel&pages=biaya_pelatihan"><li <?php echo $actived_biaya; ?> style=" border-bottom:1px solid #CCC;">Biaya</li></a>
	<a href="index.php?page=pel&pages=tempat"><li <?php echo $actived_tempat; ?> style=" border-bottom:1px solid #CCC;">Tempat</li></a>
	<a href="index.php?page=pel&pages=jadwal_view"><li <?php echo $actived_jadwal; ?> style=" border-bottom:1px solid #CCC;">Jadwal</li></a>
</ul>
</div>
<?php
if(@$_GET['pages']) 
{
$page=$_GET['pages'];
require_once("pages/".$page.".php");
}
?>