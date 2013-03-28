<?php
@session_start();
require_once "ceklogin.php";
?>
<div class="title_page">
Backup and Restore
</div>
<div id="content">
<?php
$file=date("Y-m-d")."_".date("Ymdhis")."_training_center_pens.sql";
?>
Untuk menjaga dari <b>DATA HILANG atau SISTEM RUSAK!</b>

<br /><br />
Download backup database
<p style="margin:5px 0px 10px 0px; padding:10px 0px; border:0px solid gray">
<a href="pages/backup restore/download_backupdata.php?nama_file=<?php echo $file;?>" title="Download" class="button_a">Download Database</a>
</p>

<br />
Restore database<br>
<form enctype='multipart/form-data' method='post' action=''>
<input type='hidden' name='MAX_FILE_SIZE' value='20000000'>
<input name='datafile' type='file' required="required" class="file"><br>
<input name='submit' type='submit' value='Restore Database' class="button_a" style=" margin:5px 0px; cursor:pointer">
</form>
<?php
include ("backup restore/restoredata.php");
?>
</div>
