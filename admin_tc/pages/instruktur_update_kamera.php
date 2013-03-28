<?php
$var=$_GET['editinstruktur'];
if($_GET['image'])
	{
	$image_kamera	=$_GET['image'].".jpg";
	$query_sql = "update tb_instruktur set foto='$image_kamera' where id_instruktur='$var'";
	$cek_query_sql=mysql_query($query_sql);
	$idpeserta=mysql_insert_id();	
	echo "<script> location.href = (\"index.php?page=instruktur_update&editinstruktur=$var\"); </script>";
	}
?>