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

if (isset($_POST['formsimpan'])){
$id=$_POST['id_in'];
$nama=$_POST['instruktur'];
$kelas=$_POST['kelas'];
$tgl=$_POST['tanggal'];
$st=$_POST['status'];
if ($kelas=='' || $nama=='' || $st==''){
	 
	echo "<script>
	alert('isi data dengan lengkap!');
	location.href = ('javascript:self.history.back();');
	</script>";

}else{
$cek="SELECT * FROM `tb_absen_instruktur` where id_instruktur='$nama' and id_kelas='$kelas' and tgl_absen='$tgl'";
$query=mysql_query($cek) or die (mysql_error());
$cek_query=mysql_fetch_array($query);
if($cek_query){
echo "<script>
alert('Instruktur sudah absen pada tanggal $tgl!');
location.href = ('javascript:self.history.back();');
</script>";
}
else{
$insert = "insert into tb_absen_instruktur values 
('$id','$nama','$kelas','$st','$tgl')";
$hasil=mysql_query($insert) or die (mysql_error());
if ($hasil)
{
echo "<script>location.href = ('index.php?page=absen&pages=absen_instruktur_view&ref=add');</script>";
}
else 
{echo "<script>
alert('Simpan tidak Berhasil');
location.href = ('javascript:self.history.back();');
</script>";
		}
	}
  }
}
?>
<?php }?>