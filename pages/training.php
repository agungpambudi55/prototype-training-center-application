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
.table thead tr th{ border-bottom:3px solid gray; text-transform:uppercase; font-size:17px; font-weight:bold; text-align:left }
.table tbody tr td{ border:0px solid gray; font-size:13px; line-height:14px; padding:3px; height:108px;}
.table tbody tr td a{ text-decoration:none; color:#2291FF; font-weight:bold; color:#0099FF}
.table tbody tr td a:hover{text-decoration:underline}
.table tbody tr td ul{ margin:0px 0px 0px 25px; padding:0}
.table tbody tr td ul li{ margin:0; padding:0}
.table tbody tr td ol{ margin:0px 0px 0px 25px; padding:0}
.table tbody tr td ol li{ margin:0; padding:0}
#container_page{ min-height:695px; border:1px solid #999; margin-bottom:5px; border-radius:10px; box-shadow:0px 0px 5px #666666}
.title_page{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #CCCCCC; border-bottom:1px solid #C1C1C1}
.noticication_empty{ margin:270px 0px 0px 0px; padding:30px; font-size:20px; font-weight:bold; text-transform:uppercase; color:#007FFF; text-align:center; background:#E1E1E1}
#pil{padding:3px 0px; color:#000; margin:0px 0px; font-size:13px;}
#pil:hover{ background:#007FFF; color:#FFFFFF}
#tit_kat_1{border:0px solid gray; cursor:pointer;font-weight:bold; font-size:14px; margin:5px 0px 0px 5px; padding:9px 0px 9px 0px; text-align:center; color:#FFFFFF; width:125px;  position:absolute; background:#007FFF}
#tit_kat_1:hover{ background:#666}
</style>
<div id="container_page">
<p class="title_page">Training</p>
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
echo"<a href='index.php?page=training' style='text-decoration:none'><p id='pil'>All Categories</p></a>";
$qry_pel=mysql_query("select * from tb_detail_pelatihan order by pelatihan asc");
while($arr_pel=mysql_fetch_array($qry_pel))
{
echo"<a href='index.php?page=training&i=$arr_pel[0]' style='text-decoration:none'><p id='pil'>$arr_pel[2]</p></a>";
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
	<table class='table' >
	<thead>
		<tr>
			<th width='65%' height='40px'>Training</th>
			<th width='35%'>Requirement</th>
		</tr>
	</thead>
	<tbody>
	";
	$qry_jud=mysql_query("select * from tb_judul order by judul_training asc");
	while($arr_jud=mysql_fetch_array($qry_jud))
	{ 
	if($color %2==0){$bgcolor="#F8F8F8";}else{$bgcolor="#EAEAEA";}
	if (strlen($arr_jud['6']) > 250) 
	{ $shortText = substr($arr_jud['6'], 0, 250); $shortText .= '...';}
	else 
	{$shortText = $arr_jud['6'];}
	
	if($arr_jud['7']=="")
	{ $shortText1="Empty";}
	else
	{
		if (strlen($arr_jud['7']) > 100) 
		{ $shortText1 = substr($arr_jud['7'], 0, 100); $shortText1 .= '...';}
		else 
		{$shortText1 = $arr_jud['7'];}
	}
	echo "
	<tr style='background:$bgcolor'>
		<td style='vertical-align:sub; padding-right:15px'>
			<a href='index.php?page=det&t=$arr_jud[0]'>$arr_jud[2]</a><br><br>
			$shortText
		</td>
		<td>
			$shortText1
		</td>
	</tr>";
	$color++;
	}
	echo "
	</tbody>
	</table>
	<div id='control_pagination'>
		<div id='status'></div>	
		<div id='paginate'></div>
	</div>
	";
}
else
{
	$qry_judjud=mysql_query("select * from tb_judul where id_details_pelatihan=$_GET[i] order by judul_training asc");
	if(mysql_num_rows($qry_judjud)==0)
	{echo "<p class='noticication_empty'>Empty</p>";}
	else
	{
	echo"
	<table class='table'>
	<thead>
		<tr>
			<th width='65%' height='40px'>Training</th>
			<th width='35%'>Requirement</th>
		</tr>
	</thead>
	<tbody>";
	$qry_jud=mysql_query("select * from tb_judul where id_details_pelatihan=$_GET[i] order by judul_training asc");
	while($arr_jud=mysql_fetch_array($qry_jud))
	{ 
	if($color %2==0){$bgcolor="#F8F8F8";}else{$bgcolor="#EAEAEA";}
	if (strlen($arr_jud['6']) > 250) 
	{ $shortText = substr($arr_jud['6'], 0, 250); $shortText .= '...';}
	else 
	{$shortText = $arr_jud['6'];}
	
	if($arr_jud['7']=="")
	{ $shortText1="Empty";}
	else
	{
		if (strlen($arr_jud['7']) > 100) 
		{ $shortText1 = substr($arr_jud['7'], 0, 100); $shortText1 .= '...';}
		else 
		{$shortText1 = $arr_jud['7'];}
	}
	echo "
	<tr style='background:$bgcolor'>
		<td style='vertical-align:sub; padding-right:15px'>
			<a href='index.php?page=det&t=$arr_jud[0]'>$arr_jud[2]</a><br><br>
			$shortText
		</td>
		<td>
			$shortText1
		</td>
	</tr>";
	$color++;
}
	echo "
	</tbody>
	</table>
	<div id='control_pagination'>
	<div id='status'></div>	
	<div id='paginate'></div>
	</div>";
	}
}
?>
</div>
<script type="text/javascript">
$('#tit_kat_2').hide(0);
$('#tit_kat_1').click(function(){$('#tit_kat_1').hide(0);$('#tit_kat_2').show(0);$('#pil_kat').fadeIn(500);});
$('#tit_kat_2').click(function(){$('#tit_kat_2').hide(0);$('#tit_kat_1').show(0);$('#pil_kat').fadeOut(300);});
</script>