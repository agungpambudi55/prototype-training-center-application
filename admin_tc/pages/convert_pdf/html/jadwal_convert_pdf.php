<?php
session_start();
if(empty($_SESSION['user_name']))
	{header('location: ../login.php');}
?>
<?php
include "../../config/connect.php";
$jenpes=mysql_query("select * from tb_jenis_peserta order  by id_jenis_peserta asc");
$jml_jenis = mysql_num_rows($jenpes);
?>
<html>
<head>
<title>Dashboard Training Center EEPIS</title>
<link rel="shortcut icon" href="../../../style/images/favicon.png">
<style type="text/css">
.pth{margin:0; padding:10px 0px 20px 0px;}
.a{margin:0; padding:0px 0px 0px 10px;}
#p{padding:0px 0px 20px 10px;}
.judul{ margin:-65px -420px 35px 90px; padding:0; font-size:25px;}
.pelatihan{background:rgba(0, 0, 25, 0.4); padding:5px; width:320px; color:#FFF; font-weight:bold; text-align:center}
</style>
</head>
<body>
<?php 
	  $get=$_REQUEST['idp'];
	  $tgl11=$_REQUEST['tgl1'];
	  $tgl22=$_REQUEST['tgl2'];
	  $l=mysql_query("SELECT * FROM `tb_jadwal_training` where tgl1 and tgl2 between '$tgl11'  and '$tgl22' and tb_jadwal_training.id_details_pelatihan='$get'");
	  $h=mysql_fetch_array($l);
?>
<table border="0"  cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:12px; ">
  <tr>
    <th colspan="10" bgcolor="white" > 
    <?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='../../$arr_aks[photo]' style=width:70px; height:70px; margin:20px 0px 5px 12px; vertical-align:sub'/>";
?>
    
    <p class="judul" align="right">Training 
		<?php 
		$query1 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$get'");
		$a=mysql_fetch_array($query1);
		$pe=$a['pelatihan'];

		echo $pe."-PENS";?></p>
 </th>
  </tr>
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
	echo "<td align='center'  style='vertical-align: middle;'>".$xxx=$xx['3']."</td>";
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
<table border="0"  cellpadding="0" cellspacing="0" style=" margin-right:0px; font-size:12px; ">

<tr>
    <th colspan="10" bgcolor="white" >
    <div class="p" style="margin-TOP:10px;">Informasi Tambahan</div>
    <p class="a">1. Adapun untuk informasi lebih lanjut dapat menghubungi <strong>Rengga Asmara</strong> (Lab Sistem Informasi (C-102)/<a href="rengga@eepis-its.edu">rengga@eepis-its.edu</a>) atau langsung ke Mbak Martha(TC PENS)<br></p>
    <p class="a" style="margin-bottom:10px;">2. <strong>Training SELALU dimulai hari Senin</strong> dst, sesuai dengan jumlah hari dan jam training yang bersangkutan <br></p>
    <div class="p" >Registrasi dan Pembayaran</div>
    <p class="a"><strong>Mbak Martha (TC PENS)</strong><br></p>
    <p class="a">kelas dibuka, jika terdapat peserta <strong>minimal 10(sepuluh) orang</strong></p>


</th>
</tr>
</table>


</table>
</body>
</html>