<?php
@$pagestab = $_GET['pages'];
if($pagestab == 'absen_instruktur_view'){
$actived_absen_instruktur_view = "class='tabactived'";
}else if($pagestab == 'absen_peserta_view'){
$actived_absen_peserta_view = "class='tabactived'";
}else if($pagestab == 'absen_peserta_print_pre'){
$actived_absen_peserta_print_pre = "class='tabactived'";
}
?>
<div id="tab_menu">
<ul>
	<a href="index.php?page=absen&pages=absen_instruktur_view"><li <?php echo $actived_absen_instruktur_view; ?> style=" border-bottom:1px solid #CCC;">Absen Instruktur</li></a>
	<a href="index.php?page=absen&pages=absen_peserta_view"><li <?php echo $actived_absen_peserta_view; ?> style=" border-bottom:1px solid #CCC;">Absen Peserta</li></a>
	<a href="index.php?page=absen&pages=absen_peserta_print_pre"><li <?php echo $actived_absen_peserta_print_pre; ?> style=" border-bottom:1px solid #CCC;">Cetak Absen</li></a>
</ul>
</div>
<?php
if(@$_GET['pages']) 
{
$page=$_GET['pages'];
require_once("pages/".$page.".php");
}
?>