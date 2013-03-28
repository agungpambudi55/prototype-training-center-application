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
$id= $_POST['update_id'];
$kls=$_POST['update_nm_kls'];
foreach($_POST['status'] as $status)
{	
	$update = "UPDATE tb_absen_peserta SET status_absen = '$status' WHERE id_absen_peserta = '$id'";		
	$hasil_update = mysql_query($update);
}	
	if($hasil_update)
	{echo "<script>location.href = ('index.php?page=absen&pages=absen_peserta_view'); </script>";}
	else
	{ echo "<script>alert ('Pembaruan tidak Berhasil');location.href = ('javascript:self.history.back();');</script>";}
?>
<?php }?>