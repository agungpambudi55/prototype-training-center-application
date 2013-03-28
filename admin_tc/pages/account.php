<?php
@session_start();
if (@$_SESSION['user_name']==""){
echo "<script>alert('Anda harus login dahulu'); location.href = ('pages/login.php');</script>";
}else
{
	$x=$_SESSION['user_name'];
	$xx=$_SESSION['password'];
	$load="select * from tb_user where user_name='$x' and password='$xx'";
	$hasil=mysql_query($load) or die (mysql_error());
	$baris=mysql_fetch_array($hasil);
	$pass_dulu=$baris['2'];
	
	if(@$_POST['username'] && $_POST['passwordnow'] && $_POST['passwordnew'] && $_POST['repasswordnew'])
{	
	$user=$_POST['username'];
	$password=md5($_POST['passwordnow']);
	$password_baru=$_POST['passwordnew'];
	$repassword=$_POST['repasswordnew']; 
	$pa=md5($repassword);
	if($pass_dulu==$password)
	{
		if(($repassword != $password_baru))	
		{echo "<script>alert('Kata sandi baru tidak sama');</script>"; } 
		else 
		{ 
		@$update = "update tb_user set password='$pa' where user_name='$user'";
		$hasil = mysql_query($update) or die (mysql_error());
			if($hasil)
			{echo "<script>alert('Kata sandi telah diganti');</script>";}
			else
			{echo "<script>alert('Kata sandi gagal diganti');</script>";} 
		}
	}
	else
	{echo "<script>alert('Password sekarang salah');</script>";}
}
else
{}
	
	
echo "
<div class='title_page'>
Pengaturan Akun
</div>
<div id='content'>

<div id='form'>
<form method='post' name='account'>
<ul>
    <li>
	<label style='width:160px;'>Nama Pengguna</label>
    <input class='input' name='username' type='text' maxlength='40' value='$baris[1]' required readonly/>
    </li>
    <li>
	<label style='width:160px;'>Kata Sandi Sekarang</label>
    <input class='input' name='passwordnow' type='password' maxlength='40' required/>
    <span class='notification'>Masukkan kata sandi sekarang</span>
    </li>
    <li>
	<label style='width:160px;'>Kata Sandi Baru</label>
    <input class='input' name='passwordnew' type='password' maxlength='40' required/>
    <span class='notification'>Masukkan kata sandi baru</span>
    </li>
    <li>
	<label style='width:160px;'>Ulangi Kata Sandi Baru</label>
    <input class='input' name='repasswordnew' type='password'  maxlength='40' required/>
    <span class='notification'>Masukkan kata sandi baru lagi</span>
    </li>
    <li>
	<button type='submit' class='submit' style='margin-top:15px;'>Perbarui</button>
    </li>
</ul>
</form>
</div>
</div>
"; } 
?>