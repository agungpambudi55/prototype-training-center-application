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
	 if(isset($_POST['formdaftar']))
{	
	$cek_max_id	=mysql_query("select max(no_peserta) as no_peserta from tb_daftar_peserta");
	$row		=mysql_fetch_array($cek_max_id);
	$id_max		=$row['no_peserta'] + 1;
	$sqlid		=mysql_insert_id();
	$nama		=ucwords($_POST['nama']);
	$no			=$_POST['no_induk'];
	$email		=$_POST['email'];
	$jenis		=$_POST['jenis'];
	$instansi	=$_POST['instansi'];
	$jabatan	=$_POST['jabatan'];
	$tempatlahir=$_POST['tempatlahir'];
	$tgl		=$_POST['tanggal'];
	$kelamin	=$_POST['kelamin'];
	$telpon		=$_POST['telepon'];
	$date		=date("Y/m/d");
	$tempat 	="images/peserta/"; // upload panggon folder di ge gambar
	$gambar 	=$_FILES['upload']['name'];
	$cname		="id_".$id_max."_".$nama."_".$gambar."";
	$tmp_name	=$_FILES['upload']['tmp_name'];
	$tipe 		=$_FILES['upload']['type'];
	//cek isi opo ora
	if((!$_POST['nama'])||(!$_POST['jenis'])||(!$_POST['instansi'])||(!$_POST['tempatlahir'])||(!$_POST['kelamin'])){
	echo "<script> alert('data yang anda masukkan belum lengkap!') 
	location.href = (\"javascript:self.history.back();\");
	 </script>";
	//echo "urong bener";
	}
	else if($_GET['image'])
	{
	$image_kamera	=$_GET['image'].".jpg";
	$query_sql = "insert into tb_daftar_peserta values ('','$jenis','$nama','$no','$email','$instansi','$jabatan','$tempatlahir','$tgl','$kelamin','$telpon','$date','$image_kamera')";
	$cek_query_sql=mysql_query($query_sql);
	$idpeserta=mysql_insert_id();	
	echo "<script> location.href = (\"index.php?page=peserta&pages=peserta&pages=daftar_peserta_form2&jenis=$jenis&nopeserta=$idpeserta\"); </script>";
	}
	else if(empty($gambar))
	{
	$query_sql = "insert into tb_daftar_peserta values ('','$jenis','$nama','$no','$email','$instansi','$jabatan','$tempatlahir','$tgl','$kelamin','$telpon','$date','')";
	$cek_query_sql=mysql_query($query_sql);
	$idpeserta=mysql_insert_id();	
	echo "<script> location.href = (\"index.php?page=peserta&pages=peserta&pages=daftar_peserta_form2&jenis=$jenis&nopeserta=$idpeserta\"); </script>";
	}
	else if(isset($gambar))
	{	//jika gambar tidak ada
	if($tipe == "image/jpg"||$tipe=="image/jpeg"||$tipe=="image/gif"||$tipe=="image/png") 
	{
		if(is_uploaded_file($_FILES['upload']['tmp_name'])) 
			{
		$cek = move_uploaded_file($_FILES['upload']['tmp_name'], $tempat.$cname);
					if($cek){
			$query = "insert into tb_daftar_peserta values ('','$jenis','$nama','$no','$email','$instansi','$jabatan','$tempatlahir','$tgl','$kelamin','$telpon','$date','$cname')";
			$cek_query=mysql_query($query);
			$idpeserta=mysql_insert_id();
			echo "<script> location.href = (\"index.php?page=peserta&pages=peserta&pages=daftar_peserta_form2&jenis=$jenis&nopeserta=$idpeserta\"); </script>";
						}
			}
		}
	}
}
?>	
<?php
}
?>