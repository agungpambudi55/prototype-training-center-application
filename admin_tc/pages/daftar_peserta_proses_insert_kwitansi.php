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
$nopeserta=$_GET['nopeserta'];
$idjenisjudul=$_POST['judul'];
 $discount	=$_POST['discount'];
//$jenis = $_POST['jenis'];
$queryi = "SELECT max(no_kuitansi) as maxID FROM tb_kuitansi WHERE no_kuitansi LIKE 'K%'";
$hasili = mysql_query($queryi);
$data  = mysql_fetch_array($hasili);
$idMax = $data['maxID'];
$noUrut = (int) substr($idMax, 1, 3);
$date=date("Y/m/d");
$noUrut++;
if(is_array($idjenisjudul)){
   foreach($idjenisjudul as $nojudul){
	
	$newID = "K".$jenis . sprintf("%03s", $noUrut);
    $query1 = mysql_query("INSERT INTO `tb_kuitansi` VALUES ('', '$newID', '$nopeserta', '$nojudul','$discount', '$date', '')");

	if(!$query1){
		echo "gagal memasukkan data";
	}else{
		echo "<script>location.href = (\"pages/daftar_peserta_print.php?nopeserta=$nopeserta\");</script>";
	}
	  }
mysql_query("insert into tb_bay_kui values('', '$newID')");
}

else{
	echo "gagal";
}

?>

<?php
}
?>





