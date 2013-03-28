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
<a href="index.php?page=modul_manajemen" class="back"></a>
<br /><br />
<div id="form">
<form method='post' name='form_modul' action='#'>
<ul>
	<li>
	<label>Nama Modul</label>
	<input type='text' name='nama' required='required' class='input' />
    <span class="notification">Masukkan nama modul</span>
    </li>
	<li>
	<label>Link Modul</label>
	<input type='text' name='link_modul' required='required' class='input' />
    <span class="notification">Masukkan link modul</span>
    </li>
	<li>
	<label>Hak Akses</label>
	<input type='checkbox' name='hak_a' value='1' /> Administrator &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' name='hak_p' value='2'/> Operator
    
    </li>
	<li>
<input type='submit' name='form_modul' value='Simpan' class='submit'>
    </li>
</ul>

</form>
</div>
</font>
<?php
$nama=$_POST['nama'];
$link=$_POST['link_modul'];
$hak_a=$_POST['hak_a'];
$hak_p=$_POST['hak_p'];
if($_POST['form_modul']){
$query_insert=mysql_query("INSERT INTO `tb_modul` (`id_modul`, `modul`, `link`, `hak_akses`) VALUES ('', '$nama', '$link', '$hak_a,$hak_p');");
if($query_insert)
{echo "<script>location.href = ('index.php?page=modul_manajemen');</script>";}
else
{echo mysql_error();}
}
?>
<?php }?>