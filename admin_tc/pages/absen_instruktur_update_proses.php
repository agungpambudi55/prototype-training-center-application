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
$id= $_POST['id_absen'];
foreach($_POST['status'] as $status)
{	
	$update = "UPDATE tb_absen_instruktur SET status_absen = '$status' WHERE id_absen_instruktur = '$id'";		
	$hasil_update = mysql_query($update);
}	
	if($hasil_update)
	{echo "<script>location.href = ('index.php?page=absen&pages=absen_instruktur_view&ref=edt'); </script>";}
	else
	{ echo "<script>alert ('Pembaruan tidak Berhasil');location.href = ('javascript:self.history.back();');</script>";}
?>
<?php }?>