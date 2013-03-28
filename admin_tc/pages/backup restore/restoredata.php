
<?php
//include ("koneksi.php");
include ("function_restore_db.php");

// form upload file dumo

if(isset($_POST['submit'])){
$folder	  = "pages/backup restore/restore/";
$filedb	  = $_FILES['datafile']['name'];
$type	  =	$_FILES['datafile']['type'];
$fileName = $folder.$filedb;
$unggah   = move_uploaded_file($_FILES['datafile']['tmp_name'],$fileName);
$string	  = "DROP TABLE ";
$file 	  = fopen($fileName,"r");
$read	  = fread($file,"11");
fclose($file);

if($read	==	$string)
{
	$restore	=restore_db($fileName);
	$delete_db	=unlink($fileName);
	if(!$restore)
	{
	echo "<p style='background:#FFA704; color:#FFF; width:170px;padding:10px 13px; margin:30px 0px 0px 0px '>Restore databases selesai</p>";
	}
	else
	{
	echo "<p style='background:#FF4F4F; color:#FFF; width:170px;padding:10px 13px; margin:30px 0px 0px 0px '>Restore database gagal</p>";
	}
}
else
{
	$tables=mysql_query("show tables");
	while($a=mysql_fetch_array($tables))
	{ 
	$drop=mysql_query("drop table $a[0]");
	}
	$restore	=restore_db($fileName);
	unlink($fileName);
	if(!$restore)
	{
	echo "<p style='background:#FFA704; color:#FFF; width:170px;padding:10px 13px; margin:30px 0px 0px 0px '>Restore databases selesai</p>";
	}
	else
	{
	echo "<p style='background:#FF4F4F; color:#FFF; width:170px;padding:10px 13px; margin:30px 0px 0px 0px '>Restore database gagal</p>";
	}
}

}
?>
