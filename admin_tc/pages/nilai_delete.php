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
if ($hapus_id=$_REQUEST['hapus_id']){
	$hapus="delete from tb_nilai where id_nilai='$hapus_id'";
	$result=mysql_query($hapus) or die (mysql_error());
	if ($result)
{ echo"<script>location.href = ('index.php?page=nilai&pages=nilai_view&ref=del&".$hapus_id."');</script>";} 
else 
{echo "<script>location.href = ('index.php?page=nilai&pages=nilai_view');</script>";}
}
?>
<?php }?>