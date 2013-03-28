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
Pengguna
</div>
<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<div id="form">
<form method='post' name='form' action='#'>
<ul>
	<li>
	<label>Nama Pengguna</label>
    <input class="input" name="username" type="text" maxlength="40" required/>
    <span class="notification">Masukkan nama pengguna</span>
    </li>
	<li>
	<label>Kata Sandi</label>
    <input class="input" name="pass" type="password" maxlength="40" required/>
    <span class="notification">Masukkan kata sandi</span>
    </li>
    <li>
	<label>Ulangi Kata Sandi</label>
    <input class="input" name="pass2" type="password" maxlength="40" required/>
    <span class="notification">Masukkan kata sandi lagi</span>
    </li>
	<li>
    <label>Tipe</label>
    <input type='radio' name='akses' value='1' required='required' class="radio"/> Administrator 
    <input type='radio' name='akses' value='2' required='required' class="radio" /> Operator
    </li>
	<li>
    <input type='submit' name='form' value='Daftar' class='submit'>
    </li>
</form>
</div>
<?php
if(@$_POST['pass'] != @$_POST['pass2'])
{echo "<p style='background:#FFA704; color:#FFF; width:145px;padding:10px 13px; margin:20px 0px 10px 8px '>Kata sandi tidak sama</p>";} 
else if (@$_POST['form'])
{
$query = mysql_query("SELECT * FROM tb_user WHERE user_name = '".$_POST['username']."';");
if(mysql_num_rows($query) < 1)
{
$as=mysql_query("INSERT INTO tb_user (`id_user`, `user_name`, `password`, `akses`, `status`) VALUES ('','".$_POST['username']."', MD5('".$_POST['pass']."'),'".$_POST['akses']."','1');");
echo "<script>location.href = ('index.php?page=user_manajemen&ref=add');</script>";}
else
{echo "<p style='background:#FFA704; color:#FFF; width:180px;padding:10px 13px; margin:30px 0px 0px 0px '>Nama pengguna sudah ada</p>";}
}
?>
</div>
<?php }?>