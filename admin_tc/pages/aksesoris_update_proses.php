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
function unggah_gambar($tmp,$tempat,$gambar,$format){
	$tmp		=	$_FILES['upload']['tmp_name'];
	if	( $format=='image/gif'|| $format == 'image/jpeg' || $format == 'image/pjpeg' || $format == 'image/png' )
	{
	$unggah		=	move_uploaded_file($tmp, $tempat.$gambar);
	return $unggah;
	}
	else
	{echo "File harus ber extensi jpg,gif,jpeg or png dan ukuran file kurang dari $ukuran_file";}
}

if($_POST['form_edit']){
	$id 			= $_POST['id'];
	$ket			= ucfirst($_POST['ket']);
	$folder		 	=	"images/slide/";
	$tmp			=	$_FILES['upload']['tmp_name'];
	$filebaru		=	$_FILES['upload']['name'];
	$cname			= 	"id_".$id."_".$filebaru;
	$format			=	$_FILES['upload']['type'];
	$query_tampil	=	mysql_query("select * from tb_slide where id_img='$id'");
	$row=mysql_fetch_array($query_tampil);
	$query_update_no_gambar	="update tb_aksesoris set id_aks='$id', keterangan='$ket' where id_aks='$id'";
	$query_update_gambar	="update tb_aksesoris set id_aks='$id', photo='images/slide/$cname',keterangan='$ket' where id_aks='$id'";
		//kondisi file 
		if($tmp=='')
			{
			$cek=mysql_query($query_update_no_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=aksesoris&ref=edt&".$id."'
			</script>";
			}
		else if(isset($tmp))
			{
			@$hapus		= unlink($row['file']);
			$unggah		= unggah_gambar($tmp,$folder,$cname,$format);
			$cek_gmb	= mysql_query($query_update_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=aksesoris&ref=edt&".$id."'
			</script>";
			}
		else if($row['file']=='')
			{
			$unggah		= unggah_gambar($tmp,$folder,$cname,$format);
			$cek=mysql_query($query_update_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=aksesoris&ref=edt&".$id."'
			</script>";
			}
			
}?>
<?php
}
?>