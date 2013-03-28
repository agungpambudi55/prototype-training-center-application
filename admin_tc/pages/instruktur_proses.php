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
include ("config/function_unggah.php");
//hapus instruktur
if(isset($_REQUEST['hapusinstruktur'])){
	$sintak=mysql_query("select * from tb_instruktur where id_instruktur='".$_REQUEST['hapusinstruktur']."'");
	$view=mysql_fetch_array($sintak);
	$derok=$view['foto'];
	$panggon="images/instruktur/";
	if (file_exists($panggon.$derok)){
	unlink($panggon.$derok);
	$hapus = "delete from tb_instruktur where id_instruktur = '".$_REQUEST['hapusinstruktur']."'";
	$result = mysql_query($hapus) or die (mysql_error());
	echo "<script>location.href = ('index.php?page=instruktur_view&ref=del');</script>";
	}else{
	$hapusi = "delete from tb_instruktur where id_instruktur = '".$_REQUEST['hapusinstruktur']."'";
	$resulti = mysql_query($hapusi) or die (mysql_error());
	echo "<script> location.href = ('index.php?page=instruktur_view&ref=del');</script>";
	}

}

//update instruktur

if($_POST['editforminstruktur']){
	$id 			= $_POST['idinstruktur'];
	$nama           = ucwords($_POST['namainstruktur']);
	$instansi		= $_POST['instansi'];
	$nip 			= $_POST['nip'];
	$jabatan 		= $_POST['jabatan'];
	$tempat_lahir 	= $_POST['tempatlahir'];
	$tgl_lahir		= $_POST['tanggal'];
	$kelamin 		= $_POST['kelamin'];
	$tlp 			= $_POST['notelepon'];
	$status 		= $_POST['status'];
	$ket			= ucfirst($_POST['ket']);
	$folder		 	=	"images/instruktur/";
	$tmp			=	$_FILES['upload']['tmp_name'];
	$filebaru		=	$_FILES['upload']['name'];
	$cname			= 	"id_".$id."_".$nama."_".$filebaru;
	$format			=	$_FILES['upload']['type'];
	$query_tampil	=	mysql_query("select *from tb_instruktur where id_instruktur='$id'");
	$row=mysql_fetch_array($query_tampil);
	$query_update_no_gambar	="update tb_instruktur set id_instruktur='$id', nama='$nama',NIP='$nip', instansi='$instansi', jabatan='$jabatan' ,tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir' ,gender='$kelamin' ,tlp='$tlp' ,status='$status', ket='$ket' where id_instruktur='$id'";
	$query_update_gambar	="update tb_instruktur set id_instruktur='$id', nama='$nama',NIP='$nip', instansi='$instansi', jabatan='$jabatan' ,tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir' ,gender='$kelamin' ,tlp='$tlp' ,status='$status', ket='$ket' ,foto='$cname' where id_instruktur='$id'";
		//kondisi file 
	 	if($tmp=="")
			{
			$cek=mysql_query($query_update_no_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=instruktur_view&ref=edt&".$id."'
			</script>";
			}
		else if(isset($tmp))
			{
			@$hapus		= unlink($folder.$row['foto']);
			$unggah		= unggah_gambar($tmp,$folder,$cname,$format);
			$cek_gmb	= mysql_query($query_update_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=instruktur_view&ref=edt&".$id."'
			</script>";
			}
		else if($row['foto']=="")
			{
			$unggah		= unggah_gambar($tmp,$folder,$cname,$format);
			$cek=mysql_query($query_update_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=instruktur_view&ref=edt&".$id."'
			</script>";
			}
			
}
?>
<?php
}
?>