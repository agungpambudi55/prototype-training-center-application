<?php
include("koneksi.php");
if($_GET['nama_file']){
$file	=$_GET['nama_file'];
//backup data
include("function_db_backup.php");
backup_tables($host,$user_name,$password,$database,$file); 
//header("location: download_backupdata.php?nama_file=".$file."");
//echo "<script>location.href=('download_backupdata.php?nama_file=".$file."'); </script>";
$files	=$_GET['nama_file'];
$folder	="backup/";
header("Content-Disposition: attachment; filename=".$files."");
header("Content-type: application/download");
$fp  	 = fopen($folder.$files, 'r');
$content = fread($fp, filesize($folder.$files));
fclose($fp);
echo $content;
unlink($folder.$files);
exit;
}
?>
