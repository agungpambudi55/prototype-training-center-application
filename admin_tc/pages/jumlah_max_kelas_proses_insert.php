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
	if(isset($_POST['jmlkelas']))
	{
    $jumlahkelas	=$_POST['jumlahkelas'];
    $query			=mysql_query("insert into tb_jumlah_peserta values ('','$jumlahkelas')");
   	echo "<script>location.href=('index.php?page=jumlah_max_kelas_insert&ref=add'); </script>";
	}
	else if($_GET['hapusjumlah'])
	{
	$delete			=mysql_query("DELETE FROM tb_jumlah_peserta WHERE id_jumlah_max = '".$_GET['hapusjumlah']."'");
	if($delete)
	echo "<script>location.href=('index.php?page=jumlah_max_kelas_insert&ref=del&".$_GET['hapusjumlah']."'); </script>";
	else
	echo mysql_error();
	}
?>
<?php }?>