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
$kelas=$_POST['kelas_delete'];
$instruktur=$_POST['instruktur_delete'];
if ($kelas=='' or $instruktur=='')
{
	echo"<script>alert ('Tidak ada data');location.href = ('index.php?page=absen&pages=absen_peserta_view');</script>";
}
else
{
$hapus="delete from tb_absen_peserta where id_kelas=$kelas and id_instruktur=$instruktur";
$result=mysql_query($hapus) or die (mysql_error());
if ($result)
{ echo"<script>location.href = ('index.php?page=absen&pages=absen_peserta_view&ref=del');</script>";} 
else 
{echo "<script>alert ('Hapus tidak Berhasil');location.href = ('index.php?page=absen&pages=absen_peserta_view_sortir');</script>";}
}
?>

<?php }?>