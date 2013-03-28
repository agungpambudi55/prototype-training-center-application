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

if(isset($_POST['formpilihjudul'])){
$idjenis=$_GET['jenis'];
$no_peserta=$_GET['no_peserta'];
$judul=$_POST['judul'];
$cjudul = count($judul);
//echo "<br>";
//print_r($_GET); echo "<br>";
//print_r($_POST);

echo "<br><br><br>";
//if(is_array($judul)){
   foreach($no_peserta as $no=>$judultraining){
		for($i=0;$i<=$cjudul-1;$i++)
		{
			$query1=mysql_query("insert into tb_pilih_judul values ('','$no_peserta[$no]','$judul[$i]')") or die(mysql_error());
			
		if($query1){
$kategori=$_GET['kategori'];			
$idjenis=$_GET['jenis'];			
$jumlah=$_GET['jumlah'];
$no_peserta=$_GET['no_peserta'];
foreach($no_peserta as $arr => $value) :
$ids[] = 'no_peserta['.$arr.']=' . $value;
endforeach;
$idp = implode( '&', $ids );
			
foreach($judul as $key => $value) :
$ids[] = 'judul['.$key.']=' . $value;
endforeach;
$idj = implode( '&', $ids);
	echo $idj."<br>";		
			//echo "berhasil";
			echo "<script>location.href = ('index.php?page=peserta&pages=daftar_peserta_form3_banyak&jumlah=$jumlah&idjenis=$idjenis&$idp&kategori=$kategori&$idj');</script>";
		}
		else mysql_error();
		} 
  }
}
//}
}
?>