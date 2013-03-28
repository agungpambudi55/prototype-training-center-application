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

if((!$_POST['jam_mulai'])|| (!$_POST['jam_selesai']) || (!$_POST['ket'])) 
{
	echo "<script>
		alert('Field kosong!');
		location.href = ('javascript:self.history.back();');
		</script>";
}
else 
{	
	$idp=$_REQUEST['idp'];
	$id_jadwal_training=$_POST['id_jadwal_training'];
	$tgl1=$_POST['tanggal1'];
	$tgl2=$_POST['tanggal2'];
	$jam_mulai=$_POST['jam_mulai'];
	$jam_selesai=$_POST['jam_selesai'];
	$ket=$_POST['ket'];
	$insert = "
	update tb_jadwal_training set id_judul='".$_POST['du']."', id_judul='".$_POST['ha']."', tgl1='$tgl1', tgl2='$tgl2', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', ket_sertifikat='$ket' where id_jadwal_training='$id_jadwal_training'";
		$hasil = mysql_query($insert) or die (mysql_error());
		if ($hasil)
		{
		echo "<script>
		location.href = ('index.php?page=pel&pages=jadwal_training_view&idp=$idp&ref=edt&".$id_jadwal_training."');
		</script>";
		}
		else
		{
		echo "<script>
		alert('Pembaruan tidak berhasil');
		location.href = ('index.php?page=pel&pages=jadwal_training_update');
		</script>";
		}
	}

?>		
<?php
}
?>