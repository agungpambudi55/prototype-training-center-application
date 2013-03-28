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
<div class="title_page">
Modul Hak Akses
</div>
<div id="content">
<br />
<a href="index.php?page=modul_manajemen" class="back"></a><br /><br />
<?php
if(@$_GET['id']){
$query_edit=mysql_query("select *from tb_modul where id_modul='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
if($row_edit['hak_akses'] == "1,")
	{
		$ad = "checked";
		$op = "";
	}
	else if($row_edit['hak_akses'] == ",2")
	{
		$ad = "";
		$op = "checked";
	}
	else if($row_edit['hak_akses'] == "1,2")
	{
		$ad = "checked";
		$op = "checked";
	}
	else
	{
		$ad = "";
		$op = "";
	}
?>
<div id="form">
<form method='post' name='form_editmodul'>
<input type='hidden' name='id' value='<?php echo $row_edit['id_modul'] ?>'/>
<ul>
	<li>
	<label>Nama Modul</label>
	<input type='text' name='nama' required='required' class='input'  value='<?php echo $row_edit['modul'] ?>' />
    <span class="notification">Masukkan nama modul</span>
    </li>
	<li>
	<label>Link Modul</label>
	<input type='text' name='link_modul' required='required' class='input' value='<?php echo $row_edit['link'] ?>' />
    <span class="notification">Masukkan link modul</span>
    </li>
	<li>
	<label>Hak Akses</label>
	<input type='checkbox' name='hak_a' value='1' <?php echo $ad ?> /> Administrator <input type='checkbox' name='hak_p' value='2' <?php echo $op ?> /> Operator
   
    </li>
	<li>
	<input type='submit' name='form_editmodul' value='Perbarui' class='submit'>
    </li>
</ul>
</div>
</form>
<?php 	
}
else
{echo "<script>location.href = ('index.php?page=modul_manajemen');</script>";}
$nama=$_POST['nama'];
$link=$_POST['link_modul'];
$hak_a=$_POST['hak_a'];
$hak_p=$_POST['hak_p'];
if($_POST['form_editmodul'])
{
$query_edit_data=mysql_query("UPDATE tb_modul SET modul = '$nama', link='$link', hak_akses='$hak_a,$hak_p' WHERE id_modul = '".$_POST['id']."'");	
echo "<script>location.href = ('index.php?page=modul_manajemen');</script>";
}
?>
</div>
<?php }?>