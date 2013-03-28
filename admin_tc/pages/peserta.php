<?php
@$pagestab = $_GET['pages'];
if($pagestab == 'daftar_peserta_view_peserta'){
$actived_peserta = "class='tabactived'";
}
else if($pagestab == 'daftar_formulir'){
$actived_daftar = "class='tabactived'";
}else if($pagestab == 'kwitansi'){
$actived_kwitansi = "class='tabactived'";
}else if($pagestab == 'kwitansi_group'){
$actived_kwitansi_group = "class='tabactived'";
}
?>

<div id="tab_menu">
<ul>
	<a href="index.php?page=peserta&pages=daftar_peserta_view_peserta"><li <?php echo $actived_peserta; ?> style=" border-bottom:1px solid #CCC;">Pendaftaran</li></a>
	<a href="index.php?page=peserta&pages=daftar_formulir"><li <?php echo $actived_daftar; ?> style=" border-bottom:1px solid #CCC;">Formulir Pendaftaran</li></a>
	<a href="index.php?page=peserta&pages=kwitansi"><li <?php echo $actived_kwitansi; ?> style=" border-bottom:1px solid #CCC;">Kwitansi</li></a>
<?php
if(@$_GET['pages']=='kwitansi' or @$_GET['pages']=='kwitansi_group')
{
?>
	<a href="index.php?page=peserta&pages=kwitansi_group"><li <?php echo $actived_kwitansi_group; ?> style=" border-bottom:1px solid #CCC;">Kwitansi Group</li></a>
<?php
}
?>
</ul>
</div>
<?php
if(@$_GET['pages']) 
{
$page=$_GET['pages'];
require_once("pages/".$page.".php");
}
?>