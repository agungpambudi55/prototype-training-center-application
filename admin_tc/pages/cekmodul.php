<?php
$session = mysql_query("SELECT * FROM tb_user WHERE user_name = '".$_SESSION['user_name']."';");
$username  = mysql_fetch_array($session);
//echo $username['akses'];
@$cek_modul = mysql_query("SELECT * FROM tb_modul WHERE (link='".$_GET['page']."' or link = '".$_GET['pages']."') AND hak_akses like '%".$username['akses']."%';");
$cekmodul = mysql_num_rows($cek_modul);
?>