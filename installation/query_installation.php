<?php
include ("connect.php");
if(isset($_POST['form_install_step3'])){
$user		=$_POST['username'];
$pass		=$_POST['password'];
$repass		=$_POST['repassword'];
$encripsi	=md5($pass);
$fileName	="db/db_layanan_tc_pens1.sql";
		if($user=='' or $pass=='' or $repass=='')
		{
		die ("isi data dengan lengkap");
		}
		else if($pass != $repass){
		echo "password anda salah harap cek kembali";
		}
		else if($pass == $repass){
		include		 ("function_query.php");
		$query_instalation	=restore_db($fileName);
				$query_admin=mysql_query("INSERT INTO tb_user VALUES ('1', '".$user."', '".$encripsi."', 1, 1)");
				if($query_admin)
				{
				unlink($fileName);
				echo "<script> location.href=('setup-config.php?step=4'); </script>";
				}
				else
				{
				echo mysql_error();
				}
	}
}
else{
echo "harap isi dengan benar";
}
?>