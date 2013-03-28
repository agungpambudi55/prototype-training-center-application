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
$idp=$_REQUEST['idp'];
if ($hapus_id=$_REQUEST['hapus_id']){
	$hapus="delete from tb_jadwal_training where id_jadwal_training='$hapus_id'";
	$result=mysql_query($hapus) or die (mysql_error());
	if ($result)
	{echo "<script>location.href = ('index.php?page=pel&pages=jadwal_training_view&idp=$idp&ref=del&".$hapus_id."'')</script>";}
	else
	{ echo "<script>location.href = ('javascript:self.history.back();')</script>";}
}
?>

<?php
}
?>