<?php session_start();
if (@$_SESSION['user_name']==""){
include "connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard Training Center EEPIS</title>
<link rel="shortcut icon" href="../style/images/favicon.png" />
<link rel="stylesheet" href="../style/style.css" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.easing.js"></script>
</head>
<body id="bo_log">
<div id="logo"></div>
<form method="post" action="" id="login">
<div id="boxlogin">
<p class="us_in"></p>
<p class="pass_in"></p>
<p class="tit_log" align="center">Login<br />Administrator</p>
<input class="in_log" id="username" type="text" name="username" required placeholder="Username"/>
<input class="in_log" id="password" type="password" name="password" required placeholder="Password"/>
<center><input type="submit" value="Login" class="sub_log"/></center>
<?php
if((!@$_POST['username']) || (!@$_POST['password']))
{}
else
{		
		$username=$_POST['username'];
		$pass=$_POST['password'];
		$password=md5($pass);
		
		$qry="select * from tb_user where user_name='$username' and password='$password'";
		$sql=mysql_query($qry);
		$cek=mysql_fetch_array($sql);
		if ($cek['status']=='2')
		{echo "<p class='notif_log' align='center'>Your account has not been confirmed!</p>";}
		else if($cek['status']=='3')
		{echo "<p class='notif_log' align='center'>Your account is blocked!</p>";}
		else if ($cek)
		{	
			if($cek['id_user']==1)
			{
			$_SESSION['user_name']=$username; 
			$_SESSION['password']=$password;
			echo "<script>$('.sub_log').val('Connecting...');window.setTimeout('window.location=\"../index.php\"; ',2500);$('#boxlogin').fadeOut(160);$('#logo').animate({'margin-top':'+180px'},700,'swing');$('#logo').fadeOut(1900);</script>";
			}
			else
			{
			$log=mysql_query("insert into tb_log value ('','$username',current_date,current_time)");
			if(!$log)
			{
			echo "Log not success";
			}
			$_SESSION['user_name']=$username; 
			$_SESSION['password']=$password;
			echo "<script>$('.sub_log').val('Connecting...');window.setTimeout('window.location=\"../index.php\"; ',2500);$('#boxlogin').fadeOut(160);$('#logo').animate({'margin-top':'+180px'},700,'swing');$('#logo').fadeOut(1900);</script>";
			}
		}
		else
		{echo "<p class='notif_log' align='center'>User or password false!</p>";}
		}

?>
<p class="foot_log">Training Center EEPIS | <?php echo date('Y'); ?></p>
</div>
</form>
</body>
<script src="../js/javascript.js" type="text/javascript"></script>
</html>
<?php }else{echo "<script>location.href = ('../index.php');</script>";}?>