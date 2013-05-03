<?php
$host		=	$_POST['host'];
$user		=	$_POST['user'];
$password	=	$_POST['password'];
$db			=	$_POST['db'];
$isi 		= '<?php' . "\n" .
" define('HOST', '". $host . "');" . "\n" .
" define('USER', '" . $user . "');" . "\n" .
" define('PASS', '". $password ."');" . "\n" .
" define('DB_NAME','". $db ."');" . "\n" .
'?>';
$fp 	= fopen('../admin_tc/config/define_connect.php', 'w');
$cek 	= fputs($fp, $isi);
$bt		= fopen('lock.conetc', 'a');
fclose($fp);
fclose($bt);
if($cek)
{
header('location:setup-config.php?step=3');
}

?>