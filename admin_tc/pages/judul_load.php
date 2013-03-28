<?php
session_start();
include "connect.php";
$qjudul = mysql_query("SELECT * FROM tb_judul WHERE id_details_pelatihan=".$_GET['id']." ORDER BY judul_training DESC");
while($judul = mysql_fetch_array($qjudul))
{
	echo "<option value='".$judul['id_judul']."'>".$judul['judul_training']."</option>";
}
?>