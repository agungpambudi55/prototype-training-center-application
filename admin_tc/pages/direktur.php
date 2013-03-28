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
@$id=$_POST['id'];
@$nama=ucwords($_POST['nama']);
@$idkw=$_POST['idttdkwitansi'];
@$namakw=ucwords($_POST['namakw']);
if(@$_POST['director'])
{
$querycek=mysql_query("update tb_director set director='$nama' where id_director='1'") or die (mysql_error());
}
else
{
$querycek=mysql_query("update tb_aksesoris set nama='$namakw' where id_aks='$idkw'") or die (mysql_error());
}

?>


<div class="title_page">
Tanda Tangan
</div>
<div id="content">
<form action="" method="post">
<div id="aks" style="border:1px solid #CCC; margin:0px 0px 10px 0px">
<div class="title_page" style="padding:5px 0px 5px 10px">Kwitansi</div>  
<?php
$qry=mysql_query("select * from tb_aksesoris where keterangan='ttd kwitansi'");
$arr=mysql_fetch_array($qry);
echo "
<table style='width:100%; margin:10px;' border='0'>
   <tr>
    <td width='8%'><b>Nama</b></td>
    <td width='92%'>
	<input type='hidden' value='$arr[0]' name='idttdkwitansi'>
	<input name='namakw' type='text' value='$arr[1]' class='input' required/>
	<span class='notification'>Masukkan Nama TTD Kwitansi</span></td>
  </tr>
  <tr>
  <td colspan='2'>
<input type='submit' style='margin:25px 0px 0px 0px;' value='Perbarui' class='submit' name='kwitansi'/>  
  </td>
  </tr>
</table>";
?>
</div>
</form>

<form action="" method="post">
<div id="aks" style="border:1px solid #CCC; margin:0px 0px 10px 0px">
<div class="title_page" style="padding:5px 0px 5px 10px">Direktur</div>  
<?php
$qry_dir=mysql_query("select * from tb_director");
$arr_dir=mysql_fetch_array($qry_dir);
echo "
<table style='width:100%; margin:10px;' border='0'>
   <tr>
    <td width='8%'><b>Nama</b></td>
    <td width='92%'>
	<input name='nama' type='text' value='$arr_dir[1]' class='input' required/>
	<span class='notification'>Masukkan Nama TTD Direktur</span></td>
  </tr>
  <tr>
  <td colspan='2'>
<input type='submit' style='margin:25px 0px 0px 0px;' value='Perbarui' class='submit' name='director'/>  
  </td>
  </tr>
</table>";
?>
</div>
</form>
<?php }?>
