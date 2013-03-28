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
	if ($_POST['forminstruktur']){
	$cek_max_id	=mysql_query("select max(id_instruktur) as id_instruktur from tb_instruktur");
	$row		=mysql_fetch_array($cek_max_id);
	$id_max		=$row['id_instruktur'] + 1;
	$nama=ucwords($_POST['namainstruktur']);
	$nip=$_POST['nip'];
	$instansi=$_POST['instansi'];
	$jabatan=$_POST['jabatan'];
	$tempatlahir=$_POST['tempatlahir'];	
	$kelamin=$_POST['kelamin'];
	$tgl=$_POST['tanggal'];
	$telpon=$_POST['notelepon'];
	$status=ucfirst($_POST['status']);
	$ket=ucfirst($_POST['ket']);
	$tempat ="images/instruktur/"; // upload panggon folder di ge gambar
	$gambar =$_FILES['upload']['name'];
	$cname="id_".$id_max."_".$nama."_".$gambar."";
	$tmp_name=$_FILES['upload']['tmp_name'];
	$tipe = $_FILES['upload']['type'];
	//cek isi opo ora
	if($_GET['image'])
	{
	$image_kamera	=$_GET['image'].".jpg";
	$query = "insert into tb_instruktur values ('','$nama','$nip','$instansi','$jabatan','$tempatlahir','$tgl','$kelamin','$telpon','$status','$ket','$image_kamera')";
	$cek_query=mysql_query($query);
	echo "<script> location.href = ('index.php?page=instruktur_view&ref=add&".$id_max."');</script>";		
	}
	
	else if($nama==''||$nip==''||$jabatan==''||$tempatlahir==''||$kelamin==''||$gambar=='')
	{
		echo "<script>alert ('Masukkan data yang lengkap');location.href = ('index.php?page=instruktur_insert');</script>";
	}
	
	elseif($tipe == "image/jpg" || $tipe=="image/jpeg"|| $tipe=="image/gif"|| $tipe=="image/png") 
	{
		if(is_uploaded_file($_FILES['upload']['tmp_name'])) 
		{
			$cek = move_uploaded_file($_FILES['upload']['tmp_name'], $tempat.$cname);
			if($cek)
			{
				$query = "insert into tb_instruktur values ('','$nama','$nip','$instansi','$jabatan','$tempatlahir','$tgl','$kelamin','$telpon','$status','$ket','$cname')";
				$cek_query=mysql_query($query);
				echo "<script> location.href = ('index.php?page=instruktur_view&ref=add&".$id_max."');</script>";
			}
			else
			{
				echo "<script>alert ('Simpan gagal');location.href = ('index.php?page=instruktur_insert');</script>";
			}
		}
	}
	}
?>
<?php
}
?>