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
$jumlah=$_GET['jumlah'];
$discount	=$_POST['discount'];
$queryi = "SELECT max(no_kuitansi) as maxID FROM tb_kuitansi WHERE no_kuitansi LIKE 'K%'";
$hasili = mysql_query($queryi);
$data  = mysql_fetch_array($hasili);
$idMax = $data['maxID'];
$noUrut = (int) substr($idMax, 1, 3);
$date=date("Y/m/d");
$noUrut++;
//print_r($_POST);

//echo $discount/$jumlah."<BR>";
$d=$discount/$jumlah;
for($i=0;$i<=(count($_POST['id_peserta'])-1);$i++){
	//echo $_POST['id_peserta'][$i];
	$newID = "K".$jenis . sprintf("%03s", $noUrut);
	for($h=0;$h<=((count($_POST['id_judul_jenis_peserta'])/($jumlah))-1);$h++){
		//$hl=$_POST['id_peserta'][$i];
		//$f=$_POST['id_judul_jenis_peserta'][$h];
	$query = mysql_query("INSERT INTO `tb_kuitansi` VALUES ('', '$newID', '".$_POST['id_peserta'][$i]."', '".$_POST['id_judul_jenis_peserta'][$h]."','$d', '$date', '')");
	}
	mysql_query("insert into tb_bay_kui values('', '$newID')");
	$noUrut++;
	@$peserta .= "&peserta[$i]=".$_POST['id_peserta'][$i]."";
}

//	$cek=mysql_query("select * from tb_kuitansi where no_peserta='$hl' and id_judul_jenis_peserta='$f'");
	//while($arr=mysql_fetch_array($cek)){
	//$id_kuitansi=$arr['id_kuitansi'];
	
	//}
	
	if(!$query)
	{
		echo "gagal memasukkan data";
	}
	else
	{
	echo "<script type='text/javascript'>self.location='index.php?page=peserta&pages=daftar_peserta_banyak_kwitansi_pecah&peserta=$peserta';</script>";
	}
	  

}
?>