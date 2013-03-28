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
$nopeserta=$_REQUEST['nopeserta'];
$idjudulpeserta=$_POST['idjuduljenis'];
$queryi = "SELECT max(no_kuitansi) as maxID FROM tb_kuitansi WHERE no_kuitansi LIKE 'K%'";
$hasili = mysql_query($queryi);
$data  = mysql_fetch_array($hasili);
$discount=$_POST['discount'];
$date=date("Y/m/d");
$idMax = $data['maxID'];
$noUrut = (int) substr($idMax, 1, 3);
$noUrut++;
if(is_array($idjudulpeserta)){
foreach($idjudulpeserta as $key => $nojudul) : 
$ids[] = 'idjuduljenis['.$key.']=' . $key;
$newID = "K".$jenis . sprintf("%03s", $noUrut);
$query1 = mysql_query("INSERT INTO `tb_kuitansi` VALUES ('', '$newID', '$nopeserta', '$key','$discount', '$date', '')");
endforeach;
$id = implode( '&', $ids );
if(!$query1){
echo "gagal memasukkan data";
echo mysql_error();
}else{
	echo "<script>location.href = (\"pages/daftar_peserta_print_tambah_judul.php?nopeserta=$nopeserta&$id&nokuitansi=$newID\");</script>";
	}

}
?>
<?php
}
?>
<?php 
mysql_query("insert into tb_bay_kui values('', '$newID')");
?>