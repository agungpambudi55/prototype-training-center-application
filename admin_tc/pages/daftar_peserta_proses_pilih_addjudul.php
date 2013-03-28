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
$judul=$_POST['judul'];
$jenispeserta=$_POST['id_jenpes'];
if($judul==''){
	echo "<script> alert('silahkan pilih judul training'); location.href = 'javascript:self.history.back()' </script>";
}
else if(is_array($judul)){
foreach($judul as $key => $nojudul) :
$query1=mysql_query("insert into tb_pilih_judul values ('','$nopeserta','$nojudul')");
$ids[] = 'Values['.$key.']=' . $key;
endforeach;
$id = implode( '&', $ids );
if($query1){
echo "<script>location.href =('index.php?page=peserta&pages=daftar_peserta_form3_tambah_judul&nopeserta=$nopeserta&id_jenpes=$jenispeserta&$id'); </script>";
}else{
	echo "gagal";
 }
} 

?>
<?php
}
?>