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
	$id = $_POST['id'];
	$id_pe = $_POST['pelatihan'];
	$ju = $_POST['ju'];
	$pe = $_POST['peserta'];
	$ni = $_POST['ni'];
	$st = $_POST['status'];
if
	($ni > '100' or $ni < '1')
{
	echo "<script>
alert('Masukkan nilai dari 1 - 100');
location.href = ('javascript:self.history.back();');
</script>";
	
}else{
	$update = "update tb_nilai set id_nilai='$id',no_peserta='$pe', id_details_pelatihan='$id_pe', id_judul='$ju', nilai='$ni', status='$st', val='1' where id_nilai='$id' ";
	$hasil= mysql_query($update) or die (mysql_error());
echo "<script>location.href = ('index.php?page=nilai&pages=nilai_view&ref=edt&".$id."');</script>";
}
?>
<?php }?>