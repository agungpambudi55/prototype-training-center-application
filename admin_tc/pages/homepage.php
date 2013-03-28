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
Home Page
</div>
<div id="content">
<div id="form">
<form method='post' name='form_slide' action="" enctype="multipart/form-data">
<ul>
  <li>
	<label>Keterangan</label>
    <input type='text' value='<?php echo $row_edit['keterangan'] ?>' name='keterangan' class="input" required/>
    <span class="notification">Masukkan keterangan slide</span>
    </li>
    <li>
    <label>Gambar</label>
 <input type="file" name="image" class="file" required="required"> 
 	</li>  
	<li>
 <input type='submit' name='form_edit' value='Tambah' class='submit' style="margin:15px 0px 0px 0px">
    </li>
</ul>
</form>
</div>
<table class="table">
  <tr>
    <th width="20%">Gambar</th>
    <th width="75%">Keterangan</th>
    <th width="5%">Aksi</th>
  </tr>
<?php
if ($del=$_REQUEST['i'])
{
	$a=mysql_query("select * from tb_slide where id_img='$del'");
	$b=mysql_fetch_array($a);
	$photo=$b['2'];
	$del_img=mysql_query("delete from tb_slide where id_img='$del'") or die (mysql_error());
	unlink("$photo");
	//unlink("d:/xampp/htdocs/tc.eepis/admin_tc/images/slide/$photo");
	//unlink("f:/xampp/htdocs/tc.eepis/admin_tc/images/slide/$photo");
	echo "<script type='text/javascript'>self.location='index.php?page=homepage';</script>"; 
}
$qry_slide=mysql_query("select * from tb_slide");
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
    <td>$arr_slide[1]</td>
    <td align='center'>
	<a href='index.php?page=homepage_update&i=$arr_slide[0]' class='update' title='Edit'></a> 
	<a href='index.php?page=homepage&i=$arr_slide[0]' class='delete'  title='Hapus' onclick='return konfirm()'></a></td>
  </tr>
";
}
}
?>
</table>
</div>

<?php
$namafile_tmp = $_FILES['image']['tmp_name'];
$namafile=$_FILES['image']['name'];
if(!$namafile_tmp or !$_POST['keterangan']) 
{} 
else 
{
	if(copy($namafile_tmp, "images/slide/$namafile")) 
	{
	$qry = "insert into tb_slide values ('', '$_POST[keterangan]', 'images/slide/$nama$namafile')";
	mysql_query($qry);
	echo "<script type='text/javascript'>self.location='index.php?page=homepage';</script>";
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