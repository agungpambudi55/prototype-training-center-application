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

if (isset($_POST['formsimpan'])){
$id_ju=ucwords($_POST['id_ju']);
$pe=$_POST['pelatihan'];
$min=$_POST['min'];
$ju=$_POST['ju'];
$du=$_POST['du'];
$ha=$_POST['ha'];
$ket=ucfirst($_POST['ket']);
$syarat=ucfirst($_POST['syarat']);

$syarat_a=str_replace('<p>','',$syarat);
$syarat_b=str_replace('</p>','<br>',$syarat_a);


$ket_a=str_replace('<p>','',$ket);
$ket_b=str_replace('</p>','<br>',$ket_a);
	
if ($pe=='' || $ju=='' || $du=='' || $ha=='' || $min==''){
	
	echo "<script>
alert('Masukkan data yang lengkap');
location.href = ('index.php?page=pel&pages=judul_insert');
</script>";
	
	}else{	
$cek="select id_judul from tb_judul where id_judul='$id_ju'";
$query=mysql_query($cek) or die (mysql_error());
$cek_query=mysql_fetch_array($query);
if($cek_query){
echo "<script>
alert('type sudah ada!');
location.href = ('javascript:self.history.back();');
</script>";
}
else{
$insert = "insert into tb_judul values 
('$id_ju','$pe','$ju','$du','$ha','$min','$ket_b','$syarat_b')";
$hasil=mysql_query($insert) or die (mysql_error());
echo "<script>
location.href = ('index.php?page=pel&pages=judul_view&ref=add');
</script>";
		}
	}
}


?>
<?php }?>