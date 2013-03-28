<html>
<head>
<link rel="stylesheet" href="../style/pengaturan.css" type="text/css"> 
<!--<style type="text/css">
.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: #F9F9F9;
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}

	.modalDialog:target {
		opacity:2;
		pointer-events: auto;
	}

	.modalDialog > div {
		width: 500px;
		position:relative;
		margin: 10% auto;
		padding: 15px 20px 13px 20px;
		background: #ffffff; /* Old browsers */
		border: 1px solid rgb(204, 204, 204);
		color: #333;
	}
	.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}
	.close:hover { background: #999; }
.desctipsi{
	font-size:15px;
	color:#000;
	padding:5px 0px 10px 0px;
	font-weight:bold;
}
</style>-->
</head>
<body>
<?php
$file=date("Y-m-d")."_".date("Ymdhis")."_training_center_pens.sql";
?>
<a href="#openModal">open Modal</a>
<div id="openModal" class="modalDialog">
<div>
<a href="#close" title="Close" class="close">X</a>

<div class="desctipsi">Unduh backup data untuk menjaga data hilang atau sistem rusak!</div>
<div style="border-bottom: 1px solid #C7C7C7; padding:0px 0px 10px;">
	<a href="download_backupdata.php?nama_file=<?php echo $file;?>" title="Download" class="link"><font color="#0066FF">Download File Backup</font></a>
</div>
<?php
echo "<h1 style='margin-bottom:0px; font-size:19px;'>Restore Data MySQL</h1>";
?>
<form enctype='multipart/form-data' method='post' action=''>
<input type='hidden' name='MAX_FILE_SIZE' value='20000000'>
<input name='datafile' type='file'><br>
<input name='submit' type='submit' value='Restore' class="link">
</form>
<?php
include ("restoredata.php");
?>
  </div>
</div>
</body>
</HTML>