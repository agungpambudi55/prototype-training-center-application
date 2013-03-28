<?php
$var=$_GET['editpeserta'];
if($_GET['image'])
	{
	$image_kamera	=$_GET['image'].".jpg";
	$query_sql = "update tb_daftar_peserta set gambar='$image_kamera' where no_peserta='$var'";
	$cek_query_sql=mysql_query($query_sql);
	$idpeserta=mysql_insert_id();	
	echo "<script> location.href = (\"index.php?page=peserta&pages=peserta&pages=daftar_peserta_update&editpeserta=$var\"); </script>";
	}
?>