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
$get	=$_GET['keyword'];
$administrator	=$_POST['administrator'];
$operator		=$_POST['operator'];
$query_modul	=mysql_query("select *from tb_modul where link like '$get%'");
while($row_modul=mysql_fetch_array($query_modul))
{
$query_update	=mysql_query("UPDATE tb_modul SET `hak_akses` = '$administrator,$operator' WHERE id_modul =".$row_modul['id_modul']."");
	if($query_update){
	//echo $row_modul['link']."<br>";
	echo "<script> location.href=('index.php?page=modul_managemen'); </script>";
	}
?>
<?php
}
?>
<?php
}
?>
