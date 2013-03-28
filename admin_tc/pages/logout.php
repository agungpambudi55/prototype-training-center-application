<?php session_start();?>
<html>
<head>
<title>Dashboard Training Center EEPIS</title>
<link rel="shortcut icon" href="../style/images/favicon.png">
</head>
<body style="background:url(../style/images/bg.jpg)">
<?php
session_destroy();
$_SESSION['user_name']="";
echo "<script>window.setTimeout('window.location=\"login.php\"; ',700);</script>";
?>
</body>
</html>