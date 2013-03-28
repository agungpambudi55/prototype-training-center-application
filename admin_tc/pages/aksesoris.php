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
<script type="text/javascript" src="js/texteditor/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<script type="text/javascript">
function konfirm()
{x = confirm("Yakin ingin dihapus?");
 if(x == true)
{return true;}
else
{return false;}
}
</script>
<div class="title_page">
Aksesoris
</div>
<div id="content">
<form action="index.php?page=logo" method="post" enctype="multipart/form-data">
<div id="aks" style="border:1px solid #CCC; margin:0px 0px 10px 0px">
<div class="title_page" style="padding:5px 0px 5px 10px">Logo</div>
  
<?php
$qry_logo=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_logo=mysql_fetch_array($qry_logo);
echo "
<table style='width:100%; margin:10px;' border='0'>
  <tr>
    <td width='8%'><b>Logo</b></td>
    <td width='92%'><img src='$arr_logo[2]' style='height:60px; vertical-align:middle; width:60px;'/>
	<input type='file' name='logo' style=' height:25px;' size='9' /></td>
  </tr>
   <tr>
    <td width='8%'><b>Judul</b></td>
    <td width='92%'>
	<input name='judul' type='text' value='$arr_logo[3]' class='input' required/>
	<span class='notification'>Masukkan Judul website</span></td>
  </tr>
  <tr>
  <td colspan='2'>
<input type='submit' style='margin:25px 0px 0px 0px;' value='Perbarui' class='submit'/>  
  </td>
  </tr>
</table>";
?>
</div>
</form>

<div id="aks" style="border:1px solid #CCC;">
<div class="title_page" style="padding:5px 0px 5px 10px; margin-bottom:10px;">Slide</div>
<div id="form">
<form method='post' name='form_slide' action="" enctype="multipart/form-data">
<ul>
  <li>
	<label>Keterangan</label>
    <input type='text'  name='keterangan' class="input" required/>
    <span class="notification">Masukkan keterangan slide</span>
    </li>
    <li>
    <label>Gambar</label>
 <input type="file" name="image" class="file" required="required"> 
 	</li>  
	<li>
 <input type='submit' name='form_slide' value='Tambah' class='submit' style="margin:15px 0px 0px 10px">
    </li>
</ul>
</form>
</div>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="edt")
	{echo "<div class='notifhijau'>Data berhasil diperbarui! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table" style="margin:2px; width:99.6%">
  <tr>
    <th width="20%">Gambar</th>
    <th width="75%">Keterangan</th>
    <th width="5%">Aksi</th>
  </tr>
<?php
if (@$del=$_REQUEST['i'])
{
	$a=mysql_query("select * from tb_aksesoris where nama='slide' and id_aks=$_REQUEST[i]");
	$b=mysql_fetch_array($a);
	$photo=$b['2'];
	$del_img=mysql_query("delete from tb_aksesoris where  nama='slide' and id_aks=$_REQUEST[i]") or die (mysql_error());
	unlink("$photo");
	echo "<script type='text/javascript'>self.location='index.php?page=aksesoris&ref=del';</script>"; 
}
$qry_slide=mysql_query("select * from tb_aksesoris where nama='slide'");
if(mysql_num_rows($qry_slide)==0)
{echo "<tr><td colspan='3' align='center'><b>Kosong</b></td></tr>";}
else
{
while($arr_slide=mysql_fetch_array($qry_slide))
{
echo 
" 
  <tr>
    <td height='100'><img src='$arr_slide[2]' width='100%' height='100%' /></td>
    <td>$arr_slide[3]</td>
    <td align='center'>
	<a href='index.php?page=aksesoris_update&i=$arr_slide[0]' class='update' title='Edit'></a> 
	<a href='index.php?page=aksesoris&i=$arr_slide[0]' class='delete'  title='Hapus' onclick='return konfirm()'></a></td>
  </tr>
";
}
}
?>
</table>
</div>
<?php
@$ket_about=$_POST['about'];
@$id_about=$_POST['id_about'];
if(@$_POST['about_web'])
{
$querycek=mysql_query("update tb_aksesoris set keterangan='$ket_about' where id_aks='$id_about'") or die (mysql_error());
}
?>
<form action="" method="post">
<div id="aks" style="border:1px solid #CCC; margin:10px 0px 10px 0px">
<div class="title_page" style="padding:5px 0px 5px 10px">About Website</div>  
<?php
$qry_about=mysql_query("select * from tb_aksesoris where nama='about website'");
$arr_about=mysql_fetch_array($qry_about);
echo "
<table style='width:100%; margin:10px;' border='0'>
	<input type='hidden' name='id_about' value='$arr_about[0]'>
   <tr>
    <td width='8%'><b>Deskripsi</b></td>
    <td width='92%'>
	<textarea  name='about' cols='100' rows='10'>$arr_about[3]</textarea>
	</td>	
  </tr>
  <tr>
  <td colspan='2'>
<input type='submit' style='margin:25px 0px 0px 0px;' value='Perbarui' class='submit' name='about_web'/>  
  </td>
  </tr>
</table>";
?>
</div>
</form>

<?php
@$namafile_tmp = $_FILES['image']['tmp_name'];
@$namafile=$_FILES['image']['name'];
if(!$namafile_tmp or !$_POST['keterangan']) 
{} 
else 
{
	if(copy($namafile_tmp, "images/slide/$namafile")) 
	{
	$qry = "insert into tb_aksesoris values ('', 'slide', 'images/slide/$nama$namafile', '$_POST[keterangan]')";
	mysql_query($qry);
	echo "<script type='text/javascript'>self.location='index.php?page=aksesoris&ref=add';</script>";
	}
	else
	{
	echo "<script>alert('Gagal Upload!');</script>";
	}
	unlink($namafile_tmp);
	unlink($namafile);
}
?>

<?php }?>
</div>