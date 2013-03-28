<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{
?>
<?php 
if
	(($_POST['id_ju']) || ($_POST['pe']))
{

	$id = $_POST['id_ju'];
	$pelatihan = $_POST['pe'];
	$ju = ucwords($_POST['ju']);
	$min= $_POST['min'];
	$du = $_POST['du'];
	$ha = $_POST['ha'];
	$ket = ucfirst($_POST['ket']);
	$syarat = ucfirst($_POST['syarat']);
	
	$syarat_a=str_replace('<p>','',$syarat);
	$syarat_b=str_replace('</p>','<br>',$syarat_a);

	
	$ket_a=str_replace('<p>','',$ket);
	$ket_b=str_replace('</p>','<br>',$ket_a);

$update = "update tb_judul set id_details_pelatihan='$pelatihan', judul_training='$ju',durasi='$du',jmlh_hari='$ha', peserta_min='$min', ket='$ket_b', syarat='$syarat_b' where id_judul='$id' ";
	
	$hasil= mysql_query($update) or die (mysql_error());
echo "<script>
	
	location.href = ('index.php?page=pel&pages=judul_view&ref=edt&".$id."');
	</script>";
}
?>
<?php }?>