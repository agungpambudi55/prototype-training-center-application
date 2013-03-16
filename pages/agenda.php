<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.paginate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.table tbody').paginate({status: $('#status'),controls: $('#paginate'),itemsPerPage: 5});
});
</script>
<style type="text/css">
#paginate {margin-top:-120px;display: inline-block;}
#status p{margin:325px 0px 0px 0px;padding:0; float:right}	
#pages_display{ width:120px; text-align:center; background:url(style/images/bg.png); border:0px solid gray; font-size:16; font-weight:bold}
#control_pagination{ border:0px solid gray; width:130px}
#paginate p{ border:0px solid gray; opacity:0.6;}
#paginate p:hover{ cursor:pointer; opacity:1}
.first{ background:url(style/images/images.png) -469px -147px; margin:0px 0px 0px 50px; padding:17px;}
.prev{ background:url(style/images/images.png) -469px -193px; margin:15px 0px 80px 50px; padding:11px;}
.next{ background:url(style/images/images.png) -469px -224px; margin:70px 0px 0px 50px; padding:11px;}
.last{ background:url(style/images/images.png) -469px -258px; margin:15px 0px 0px 50px; padding:17px;}
.table{width:807px;  border:0px solid gray; margin:0px 5px 0px 0px; float:right;border-collapse: collapse;}
.table thead tr th{ border-bottom:3px solid gray; text-transform:uppercase; font-size:17px; font-weight:bold; }
.table tbody tr td{ border-bottom:0px solid gray; font-size:13px; padding:2px}
.table tbody tr td a{ text-decoration:none; color:#2291FF; font-weight:bold; color:#0099FF;}
.table tbody tr td a:hover{text-decoration:underline}
#container_training{ min-height:700px; border:1px solid #999; margin-bottom:5px; border-radius:10px; box-shadow:0px 0px 5px #666666}
.title_page{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #C1C1C1; border-bottom:1px solid #C1C1C1
}
.noticication_empty{ margin:270px 0px 0px 0px; padding:30px; font-size:20px; font-weight:bold; text-transform:uppercase; color:#007FFF; text-align:center; background:#E1E1E1}
#pil{padding:3px 0px; color:#000; margin:0px 0px; font-size:13px;}
#pil:hover{ background:#007FFF; color:#FFFFFF}
#tit_kat_1{border:0px solid gray; cursor:pointer;font-weight:bold; font-size:14px; margin:5px 0px 0px 5px; padding:9px 0px 9px 0px; text-align:center; color:#FFFFFF; width:125px;  position:absolute; background:#007FFF}
#tit_kat_1:hover{ background:#666}
</style>
<div id="container_training">
<p class="title_page">Agenda</p>
<p id="tit_kat_1">
<?php
if(isset($_GET['i']))
{
	$kat_pel=mysql_query("select * from tb_detail_pelatihan where id_details_pelatihan=$_GET[i]");
	$arr_kat=mysql_fetch_array($kat_pel);
	echo "$arr_kat[2]";
}
else
{echo "All Categories";}
?>
</p>

<p id="tit_kat_2" style="border:0px solid gray; cursor:pointer;font-weight:bold; font-size:14px; margin:5px 0px 0px 5px; padding:9px 0px 9px 0px; text-align:center; color:#FFFFFF; width:125px;  position:absolute; background:#666"><?php
if(isset($_GET['i']))
{
	$kat_pel=mysql_query("select * from tb_detail_pelatihan where id_details_pelatihan=$_GET[i]");
	$arr_kat=mysql_fetch_array($kat_pel);
	echo "$arr_kat[2]";
}
else
{echo "All Categories";}
?>
</p>

<div id="pil_kat" style=" display:none;border-left:1px solid gray;border-right:1px solid gray;border-bottom:1px solid gray; background:url(style/images/bg.jpg); text-align:center; width:123px; z-index:999; position:absolute; margin:40px 0px 0px 5px; padding:0px 0px;">
<?php
echo"<a href='index.php?page=agenda' style='text-decoration:none'><p id='pil'>All Categories</p></a>";
$qry_pel=mysql_query("select * from tb_detail_pelatihan order by pelatihan asc");
while($arr_pel=mysql_fetch_array($qry_pel))
{
echo"<a href='index.php?page=agenda&i=$arr_pel[0]' style='text-decoration:none'><p id='pil'>$arr_pel[2]</p></a>";
}
?>
</div>

<?php
$color=1;
@$qry_cek=mysql_query("select * from tb_detail_pelatihan where id_details_pelatihan like '$_GET[i]%'");
if(mysql_num_rows($qry_cek)==0)
{echo "<script type='text/javascript'>self.location='index.php';</script>";}
elseif(@$_GET['i']=="")
{
	echo"
	<table class='table'>
	<thead>
		<tr>
				<th width='45%' height='40px' align='left'>Training</th>
				<th width='25%' align='center'>Cost</th>
				<th width='10%' align='center'>Agenda</th>
				<th width='10%' align='center'>Time</th>
				<th width='10%' align='center'>Certificate</th>
		</tr>
	</thead>
	<tbody>";
	$qry_jad=mysql_query("select tb_jadwal_training.id_jadwal_training, tb_judul.judul_training, tb_judul.ket, tb_judul.id_judul,  tb_jadwal_training.tgl1, tb_jadwal_training.tgl2, tb_jadwal_training.jam_mulai, tb_jadwal_training.jam_selesai, tb_jadwal_training.ket_sertifikat 
	from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul order by tb_judul.judul_training asc");
	while($arr_jad=mysql_fetch_array($qry_jad))
	{
	if($color %2==0){$bgcolor="#F8F8F8";}else{$bgcolor="#EAEAEA";}	
	if (strlen($arr_jad['2']) > 150) 
	{$shortText1 = substr($arr_jad['2'], 0, 150); $shortText1 .= '...';}
	else 
	{$shortText1 = $arr_jad['2'];}	
	echo "
	<tr style='background:$bgcolor'>
	<td style='vertical-align:sub;height:110px;'>
		<a href='index.php?page=det&a=$arr_jad[0]'>$arr_jad[1]</a><br><br>
		$shortText1
	</td>
	<td align='center' style='font-size:12px'>";
		$qry_biaya=mysql_query("select * from tb_judul_jenis_peserta where id_judul=$arr_jad[3]");
		while($arr_biaya=mysql_fetch_array($qry_biaya))
		{
		 $qry_jenpes=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$arr_biaya[2]");
		 $arr_jenpes=mysql_fetch_array($qry_jenpes);
		 $uang = number_format($arr_biaya['3'],0,'','.');
		 echo "$arr_jenpes[1]<br>Rp $uang,00<br>";
		}	
	echo "
	</td>
	<td align='center'>";
	echo substr($arr_jad['4'],8,2)."-";
	echo substr($arr_jad['4'],5,2)."-";
	echo substr($arr_jad['4'],0,4);
	echo"
	<br>s/d<br>";
	echo substr($arr_jad['5'],8,2)."-";
	echo substr($arr_jad['5'],5,2)."-";
	echo substr($arr_jad['5'],0,4);
	echo "	
	<br>";
	$datenow	=date("Y/m/d");	
	$tgl_mulai		=$arr_jad['4'];
	$tgl_selesai	=$arr_jad['5'];
	if($datenow>=$tgl_mulai && $datenow<=$tgl_selesai)
	{echo "<font color='#FF0000'><b>Running</b></font>";}
	else
	{echo "";}
	echo "
	</td>
		<td align='center'>$arr_jad[6]<br>s/d<br>$arr_jad[7]</td>
		<td align='center'>$arr_jad[8]</td>
	</tr>";
	$color++;
	}
	echo "
	</tbody></table>
	<div id='control_pagination'>
		<div id='status'></div>	
		<div id='paginate'></div>
	</div>";
}
else
{
	$qry_jadjad=mysql_query("
	select tb_jadwal_training.id_jadwal_training, tb_judul.judul_training, tb_judul.ket, tb_jadwal_training.tgl1, tb_jadwal_training.tgl2, tb_jadwal_training.jam_mulai, tb_jadwal_training.jam_selesai, tb_jadwal_training.ket_sertifikat 
	from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul and tb_jadwal_training.id_details_pelatihan=$_GET[i] order by tb_judul.judul_training asc");
	if(mysql_num_rows($qry_jadjad)==0)
	{echo "<p class='noticication_empty'>Empty</p>";}
	else
	{
	echo"
	<table class='table'>
	<thead>
		<tr>
			<th width='50%' height='40px' align='left'>Training</th>
			<th width='20%'>Cost</th>
			<th width='10%'>Agenda</th>
			<th width='10%'>Time</th>
			<th width='10%'>Certificate</th>
		</tr>
	</thead>
	<tbody>";
	$qry_jad=mysql_query("select tb_jadwal_training.id_jadwal_training, tb_judul.judul_training, tb_judul.ket, tb_judul.id_judul,  tb_jadwal_training.tgl1, tb_jadwal_training.tgl2, tb_jadwal_training.jam_mulai, tb_jadwal_training.jam_selesai, tb_jadwal_training.ket_sertifikat 
	from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul and tb_jadwal_training.id_details_pelatihan=$_GET[i] order by tb_judul.judul_training asc");
	while($arr_jad=mysql_fetch_array($qry_jad))
	{
	if($color %2==0){$bgcolor="#F8F8F8";}else{$bgcolor="#EAEAEA";}	
	if (strlen($arr_jad['2']) > 150) 
	{$shortText1 = substr($arr_jad['2'], 0, 150); $shortText1 .= '...';}
	else 
	{$shortText1 = $arr_jad['2'];}
	echo "
	<tr style='background:$bgcolor'>
	<td style='vertical-align:sub;height:110px;'>
		<a href='index.php?page=det&a=$arr_jad[0]'>$arr_jad[1]</a><br><br>
		$shortText1
	</td>
	<td align='center' style='font-size:12px'>";
		$qry_biaya=mysql_query("select * from tb_judul_jenis_peserta where id_judul=$arr_jad[3]");
		while($arr_biaya=mysql_fetch_array($qry_biaya))
		{
		 $qry_jenpes=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$arr_biaya[2]");
		 $arr_jenpes=mysql_fetch_array($qry_jenpes);
		 $uang = number_format($arr_biaya['3'],0,'','.');
		 echo "$arr_jenpes[1]<br>Rp $uang,00<br>";
		}
	echo "
	</td>
	<td align='center'>";
	echo substr($arr_jad['4'],8,2)."-";
	echo substr($arr_jad['4'],5,2)."-";
	echo substr($arr_jad['4'],0,4);
	echo"
	<br>s/d<br>";
	echo substr($arr_jad['5'],8,2)."-";
	echo substr($arr_jad['5'],5,2)."-";
	echo substr($arr_jad['5'],0,4);
	echo "	
	<br>";
	$datenow	=date("Y/m/d");	
	$tgl_mulai		=$arr_jad['4'];
	$tgl_selesai	=$arr_jad['5'];
	if($datenow>=$tgl_mulai && $datenow<=$tgl_selesai)
	{echo "<font color='#FF0000'><b>Running</b></font>";}
	else
	{echo "";}	
	echo "
	</td>
	<td align='center'>$arr_jad[6]<br>-<br>$arr_jad[7]</td>
	<td align='center'>$arr_jad[8]</td>
	</tr>";
	$color++;
	}
	echo "
	</tbody></table>
	<div id='control_pagination'>
		<div id='status'></div>	
		<div id='paginate'></div>
	</div>
	";
	}
}
?>
</div>
<script type="text/javascript">
$('#tit_kat_2').hide(0);
$('#tit_kat_1').click(function(){$('#tit_kat_1').hide(0);$('#tit_kat_2').show(0);$('#pil_kat').fadeIn(500);});
$('#tit_kat_2').click(function(){$('#tit_kat_2').hide(0);$('#tit_kat_1').show(0);$('#pil_kat').fadeOut(300);});
</script>