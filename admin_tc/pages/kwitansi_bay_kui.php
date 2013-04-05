<?php
include "connect.php";
$m=$_REQUEST['i'];
$insert=mysql_query("insert into tb_bay_kui values('','$m')");
if ($insert) { echo "<script type='text/javascript'>self.location='kwitansi_print.php?i=$m'</script>";
}else {
	echo "GUAGAL";}
?>