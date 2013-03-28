<?php
function unggah_gambar($tmp,$tempat,$gambar,$format){
$tmp=$_FILES['logo']['tmp_name'];
if( $format=='image/gif'|| $format == 'image/jpeg' || $format == 'image/pjpeg' || $format == 'image/png' )
{
$unggah=move_uploaded_file($tmp, $tempat.$gambar);
return $unggah;
}
else
{echo "File harus ber extensi jpg,gif,jpeg or png dan ukuran file kurang dari $ukuran_file";}
}

$ket= ucfirst($_POST['judul']);
$folder ="images/logo/";
$tmp=$_FILES['logo']['tmp_name'];
$filebaru=$_FILES['logo']['name'];
$cname= date('Ymd').$filebaru;
$format=$_FILES['logo']['type'];
$query_tampil=mysql_query("select * from tb_aksesoris where nama='logo'");
$row=mysql_fetch_array($query_tampil);
$query_update_no_gambar="update tb_aksesoris set keterangan='$ket' where nama='logo'";
$query_update_gambar="update tb_aksesoris set keterangan='$ket' , photo='images/logo/$cname' where nama='logo'";

if($tmp=='')
{
$cek=mysql_query($query_update_no_gambar);
echo "
<script type='text/javascript'>
window.location = 'index.php?page=aksesoris'
</script>";
}
else if(isset($tmp))
{
@$hapus= unlink($row['photo']);
$unggah= unggah_gambar($tmp,$folder,$cname,$format);
$cek_gmb= mysql_query($query_update_gambar);
echo "
<script type='text/javascript'>
window.location = 'index.php?page=aksesoris'
</script>";
}
else if($row['photo']=='')
{
$unggah= unggah_gambar($tmp,$folder,$cname,$format);
$cek=mysql_query($query_update_gambar);
echo "
<script type='text/javascript'>
window.location = 'index.php?page=aksesoris'
</script>";
}

?>