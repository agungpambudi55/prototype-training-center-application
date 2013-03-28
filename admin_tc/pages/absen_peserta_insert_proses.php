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
if((!$_POST['kelas'])|| (!$_POST['instruktur'])|| (!$_POST['tanggal']) || (!$_POST['status']))
{
	echo "
	<script>
	alert('Masukkan data yang lengkap!'); 
	location.href = ('javascript:self.history.back();');
	</script>";
}
else
{
	$kelas=$_POST['kelas'];
	$instruktur=$_POST['instruktur'];
	$tgl=$_POST['tanggal'];
	$status=$_POST['status'];
	
	foreach($_POST['nopeserta'] as $no=>$value)
	{	
	$cek=("SELECT * FROM `tb_absen_peserta` where no_peserta='$value' and id_kelas='$kelas' and tanggal='$tgl'");
	$query=mysql_query($cek) or die (mysql_error());
	$cek_query=mysql_fetch_array($query);
	if($cek_query){
	echo "<script>alert('Peserta sudah absen pada tanggal $tgl!');location.href = ('javascript:self.history.back();');</script>";
	}
	else{
	
	$insert = "INSERT INTO tb_absen_peserta (id_absen_peserta, id_kelas, no_peserta, id_instruktur, status_absen, tanggal)  
	VALUES (NULL, '$kelas', '$value', '$instruktur', '$status[$value]', '$tgl');";		
	$hasil_insert = mysql_query($insert);
	//echo "nip : ".$nip[$no]."golongan : ".$golongan[$no];
	}	
	if($hasil_insert)
	{echo "<script>location.href = ('index.php?page=absen&pages=absen_peserta_view&ref=add');</script>";}
	else
	{ echo "<script>alert ('Simpan tidak Berhasil');location.href = ('javascript:self.history.back();');</script>";}
	

}
}
?>
<?php }?>