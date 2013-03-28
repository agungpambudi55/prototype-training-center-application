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
	$hapus="delete from tb_absen_instruktur where id_absen_instruktur='$hapus_id'";
	$result=mysql_query($hapus) or die (mysql_error());
	if ($result)
{ echo"<script>location.href = ('index.php?page=absen&pages=absen_instruktur_view&ref=del&".$hapus_id."');</script>";} 
else 
{echo "<script>alert('Hapus Gagal!');location.href = ('javascript:self.history.back();');</script>";}
}
?>
<?php }?>