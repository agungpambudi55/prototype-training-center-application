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

$id_ni 	= $_POST['id'];
$id_pe	=$_POST['pelatihan'];
$id_ju	=$_POST['judul_training'];
$peserta=$_POST['peserta'];
$ni		=$_POST['nilai'];
$st		=$_POST['status'];
if(!is_array($peserta)){
	echo "
	<script>
	alert('Data Kosong!');
	location.href = ('javascript:self.history.back();');
	</script>";
}
else {
foreach($peserta as $m => $nama){
$insert = "insert into tb_nilai values ('','$id_pe','$id_ju','$nama','$ni[$m]','$st[$m]','1')";
if (($ni[$m] > 100) || ($ni[$m] <= 1)){
	echo "	<script>
			alert('Masukkan nilai dari 1 - 100');
			location.href = ('javascript:self.history.back();');
			</script>";
		
}else{
	$hasil=mysql_query($insert) or die (mysql_error());
	echo "	<script> location.href = ('index.php?page=nilai&pages=nilai_view&ref=add'); </script>";

}
}
}
?>
<?php }?>