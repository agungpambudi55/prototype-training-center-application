<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
$filename = 'jadwal_training_center_pens_'.date('YmdHis');
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=".$filename.".xls");
?>
<html>
<head>
<style type="text/css">
.pth{margin:0; padding:10px 0px 20px 0px;}
.a{ text-align:left; padding:0px 0px 0px 0px;}
.p{padding:0px 0px 0px 0px; text-align:left;}
.judul{ margin:-65px -320px 35px 0px; padding:0; font-size:18px;}
.pelatihan{background:rgba(0, 0, 25, 0.4); padding:5px; width:320px; color:#FFF; font-weight:bold; text-align:center}
</style>
</head>
<body>
<?php 
		$get=$_REQUEST['idp'];
		$tgl11=$_REQUEST['tgl1'];
		$tgl22=$_REQUEST['tgl2'];
		if (($tgl11=="") or ($tgl22=="")){
		}else{
		$l=mysql_query("SELECT * FROM `tb_jadwal_training` where tgl1 and tgl2 between '$tgl11'  and '$tgl22' and tb_jadwal_training.id_details_pelatihan='$get'");
		$h=mysql_fetch_array($l);
		
		$jenpes=mysql_query("select * from tb_jenis_peserta order  by id_jenis_peserta asc");
		$jml_jenis = mysql_num_rows($jenpes);
		
		
?>
<table border="0"  cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:12px; ">
  <tr>
    <th colspan="10" bgcolor="white" >    <?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='$arr_aks[photo]' style='width:70px; height:70px; margin:20px 0px 10px -760px; vertical-align:sub'/>";
?>
    <br><br>
    <p class="judul" align="right">Training 
		<?php 
		
	  $query1 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$get'");
	  $a=mysql_fetch_array($query1);
	  $pe=$a['pelatihan'];

echo $pe."-PENS";?></p>
 </th>
  </tr>
  <br>
<br>
<br>
<br>

  <table border="1"  cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:12px; ">
  <tr bgcolor="#FF9933">
  
   	<th rowspan='2'><p class="pth">No</p></th>
	<th align="center" rowspan='2'><p class="pth">Judul</p></th>
    <th align="center"  colspan="<?php echo $jml_jenis; ?>"><p class="pth">Biaya Training</p></th>
 
	<th width="10px" align="center" rowspan='2' ><p class="pth">Jumlah<br>Jam</p></th>
	<th rowspan='2' align="center"><p class="pth">Jumlah<br>Hari</p></th>
	<th rowspan='2' align="center"><p class="pth">Tanggal<br>Training</p></th>
	<th rowspan='2' align="center"><p class="pth">Jam<br>Training</p></th>
    <th rowspan='2' align="center"><p class="pth">Sertifikat</p></th>
  </tr>
  <tr>
     <?php
	while($arr_jenpes=mysql_fetch_array($jenpes))
	{
	echo "<td bgcolor=#FF9933 align='center'>($arr_jenpes[jenis_peserta])</td>";
	}
	?>
  
  </tr>
  
  
<?php
$query =mysql_query("SELECT * FROM `tb_jadwal_training` where tgl1 and tgl2 between '$tgl11'  and '$tgl22' and tb_jadwal_training.id_details_pelatihan='$get'");
$i=0;
$no=1;
while($row = mysql_fetch_array($query))
{
	$id_jadwal_training=$row['0'];
	$pelatihan=$row['1'];
	$id_judul=$row['2'];
	$tgl1=$row['3'];
	$tgl2=$row['4'];
	$jam_mulai=$row['5'];
	$jam_selesai=$row['6'];
	$ket=$row['7'];

$query1 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$get'");
$a=mysql_fetch_array($query1);
$pe=$a['pelatihan'];

$query2 = mysql_query("select judul_training from tb_judul where id_judul = '$id_judul'");
$b=mysql_fetch_array($query2);
$judul=$b['judul_training'];

$query5 = mysql_query("select durasi from tb_judul where id_judul = '$id_judul'");
$e=mysql_fetch_array($query5);
$durasi=$e['durasi'];

$query6 = mysql_query("select jmlh_hari from tb_judul where id_judul = '$id_judul'");
$f=mysql_fetch_array($query6);
$hari=$f['jmlh_hari'];
?>
	<tr >
	<td align='center'><?php echo $no?></td>
	<td><?php echo $judul?></td>
	<?php

	$jenis=mysql_query("select * from tb_jenis_peserta order by id_jenis_peserta asc");
	while($rows=mysql_fetch_array($jenis))
	{
	$x=mysql_query("select * from tb_judul_jenis_peserta  where id_jenis_peserta=$rows[0] and id_judul=$id_judul");
	$xx=mysql_fetch_array($x);
	echo "<td align='center' style='vertical-align: middle'>".$xxx=$xx['3']."</td>";
	}
	?>
	<td align='center'><?Php echo $durasi?></td>
	<td align='center'><?php echo $hari?></td>
	<td align='center'><?php echo substr($tgl1,8,2)."/".substr($tgl1,5,2)."/".substr($tgl1,0,4)." s/d ".substr($tgl2,8,2)."/".substr($tgl2,5,2)."/".substr($tgl2,0,4) ?></td>
	<td align='center'><?php echo "$jam_mulai - $jam_selesai"?></td>
    <td align="center"><?php echo $ket;?></td>
	</tr>
    <?php
	$no++;
	$i++;
	?>
<?php
}?>
</table>
<table border="0"  cellpadding="0" cellspacing="0" style=" margin:0 auto; padding:4px 0px 0px 0px; font-size:12px; ">
<tr>
    <th colspan="10" bgcolor="white" style="font-weight:normal;">
    <div class="p"><b>Infomasi Tambahan</b></div>
    <div class="a">1. Adapun untuk informasi lebih lanjut dapat menghubungi Rengga Asmara (Lab Sistem Informasi (C-102)/ <font color="BLUE">rengga@eepis-its.edu </font>) atau langsung ke Mbak Martha(TC PENS)<br></div>
    <div class="a">2. Training SELALU dimulai hari Senin dst, sesuai dengan jumlah hari dan jam training yang bersangkutan <br></div>
    <DIV class="p" style="font-weight:bold">Registrasi dan Pembayaran</div>
    <div class="a">Mbak Martha (TC PENS)<br></div>
    <div class="a">kelas dibuka ,jika terdapat peserta minimal 10(sepuluh) orang</div>
</th>
</tr>
</table>
</table>
</body>
</html>
<?php }?>