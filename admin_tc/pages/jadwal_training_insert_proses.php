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
if (isset($_POST['formjadwal'])){
	$pelatihan=$_POST['pelatihan'];
	$judul=$_POST['judul'];
	$tgl1=$_POST['tanggal1'];
	$tgl2=$_POST['tanggal2'];
	$jam_mulai=$_POST['jam_mulai'];
	$jam_selesai=$_POST['jam_selesai'];
	$ket=ucwords($_POST['ket']);

if ( $pelatihan=='' || $jam_mulai=='' || $jam_selesai=='' || $ket=='')
{
	echo "<script>alert('Field kosong!'); location.href = ('javascript:self.history.back();');</script>";
}
else
{
$insert = "INSERT INTO tb_jadwal_training VALUES (
'', '$pelatihan','$judul','$tgl1','$tgl2', '$jam_mulai', '$jam_selesai','$ket')";
	$hasil = mysql_query($insert) or die (mysql_error());
	if($hasil)
	{echo "<script>;location.href = ('index.php?page=pel&pages=jadwal_view');</script>";}
	else
	{ echo "<script>alert ('Simpan tidak Berhasil');location.href = ('javascript:self.history.back();')";}
	}
}
?>

<?php
}
?>