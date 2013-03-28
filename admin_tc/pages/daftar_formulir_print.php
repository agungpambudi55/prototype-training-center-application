<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<html>
<head>
</head>
<body onLoad="window.print()">

<style>
.button_a{ margin:0; padding:9px 13px;  text-decoration:none; color:#FFFFFF; background:#63B0FE; font-size:13px; border:0px solid gray; }
.button_a:hover{ background:#7DC8FF}
.back{height:30px; width:30px; border:0px solid gray; margin:5px 0px 5px 0px ; cursor:pointer; background:#CCCCCC; border-radius:100px; background:url(../style/images/back.png) no-repeat; background-size:30px;}
</style>
<link rel="shortcut icon" href="../style/images/favicon.png">

	<?php

	$get=$_GET['idp'];
	
	$v=mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan='$get'");
	$query=mysql_fetch_array($v)?>
    <table width="100%" cellspacing="0" style="margin-top:0.0px; border:0px solid gray; list-style:outside;font-size: 12px;color: #5b5b5b; padding-left:8px; padding-right:8px; padding-top:0px;">
      <tr>
        <td height="43" colspan="3"><h3>
          <?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='../$arr_aks[photo]' style='height:60px; width:60px;vertical-align:middle'/>";
?>
          &nbsp; Formulir Pendaftaran Training Center <?php echo $query['pelatihan'];?></h3>
          <hr style="color:#666666;"></td>
      </tr>
      <tr align="center">
        <td height="17" colspan="3" ><div style="padding-left:200px">No. Pendaftaran :</div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td height="0"><b>DATA PRIBADI</b></td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17">Nama Lengkap</td>
        <td>:</td>
        <td></td>
      </tr>
      <tr>
        <td height="23" valign="top">Jenis Peserta</td>
        <td >:</td>
        <td ><?php $jenis_peserta=mysql_query("select * from tb_jenis_peserta");
		while ($rows=mysql_fetch_array($jenis_peserta)){
			$id=$rows['id_jenis_peserta'];
			$jenis=$rows['jenis_peserta'];
			?>
          <input type='checkbox' name='jenis' value="<?php echo $id ?>"/>
          <?php echo  $jenis.'<br>';}?></td>
      </tr>
      <tr>
        <td height="17" >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >NRP</td>
        <td >:</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >E-mail</td>
        <td >:</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >Instansi</td>
        <td >:</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >Jabatan</td>
        <td >:</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >Tempat Lahir</td>
        <td >:</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >Jenis Kelamin</td>
        <td >:</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >Telepon</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="17" ><strong>PILIH JUDUL</strong></td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="20" >Pelatihan</td>
        <td >:</td>
        <td ><?php echo $query['pelatihan'];?></td>
      </tr>
      <tr>
        <td height="23" valign="top">Judul Training</td>
        <td >:</td>
        <td ><?php  $sql=mysql_query("select * from tb_judul where id_details_pelatihan='$get'");
		  		while($view=mysql_fetch_array($sql)){
					$judul=$view['judul_training'];?>
          <input type='checkbox' name='jenis2' value="<?php echo $id ?>"/>
          <?php echo  $judul.'<br>';}?></td>
      </tr>
      <tr>
        <td height="115" align="center"><img src="../style/images/photo.png" width="85px" height="113px" style="padding-top:20px" /></td>
        <td>&nbsp;</td>
        <td><style type="text/css">
		  #ttd{margin:0; padding:0; border:0px solid gray; float:right; text-align:center }
          </style>
          <div id="ttd"> ..........., ......................<br />
            <br />
            <br />
            TTD<br />
            (........................) </div></td>
      </tr>
    </table>
</body>
</html>
