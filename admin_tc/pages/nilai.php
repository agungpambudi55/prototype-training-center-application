<?php
@$pagestab = $_GET['pages'];
if($pagestab == 'nilai_view'){
$actived_nilai_view = "class='tabactived'";
}else if($pagestab == 'nilai_view_tanpa_status'){
$actived_nilai_view_tanpa_status = "class='tabactived'";
}
?>

<div id="tab_menu">
<ul>
	<a href="index.php?page=nilai&pages=nilai_view"><li <?php echo $actived_nilai_view; ?> style=" border-bottom:1px solid #CCC;">Nilai dengan Status</li></a>
	<a href="index.php?page=nilai&pages=nilai_view_tanpa_status"><li <?php echo $actived_nilai_view_tanpa_status; ?> style=" border-bottom:1px solid #CCC;">Nilai tanpa Status</li></a>
	</ul>
</div>
<?php
if(@$_GET['pages']) 
{
$page=$_GET['pages'];
require_once("pages/".$page.".php");
}
?>