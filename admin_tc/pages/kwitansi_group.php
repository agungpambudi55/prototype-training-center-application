<style>
.modalDialog {
position: fixed;
font-family: Arial, Helvetica, sans-serif;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: rgba(0,0,0,0.8);
z-index: 100000000;
opacity:0;
-webkit-transition: opacity 400ms ease-in;
-moz-transition: opacity 400ms ease-in;
transition: opacity 400ms ease-in;
pointer-events: none;
}
.modalDialog:target {
opacity:1;
pointer-events: auto;
}
.modalDialog > div {
width: 550px;
height:auto;
position: relative;
margin:5% auto;
padding: 5px 20px 13px 20px;
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top, #ffffff 0%, #f6f6f6 47%, #ededed 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* IE10+ */
background: linear-gradient(to bottom, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 ); /* IE6-9 */
}
.modalDialog > div h2{
font-size:17px;
font-weight:bold;
color:#20A0FF;
font-family:'Open Sans', 'Segoe UI light', Tahoma, Helvetica, sans-serif;
margin-top:0px;
margin-bottom:20px;
border-bottom:#666 3px solid;
padding-top: 10px;
padding-right: 0px;
padding-bottom: 3px;
padding-left: 2px;
}
.close {
background:#20A0FF;
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
.close:hover { background:#82CAFF; }
.namatable{
font-family:Tahoma, Geneva, sans-serif;
color: #544F4F;
}
.gtable{
	height:30px;}
.gtable:hover{
	background:#E4C478;
	padding:1000px;
	}

.classname {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:arial;
	font-size:13px;
	font-weight:bold;
	padding:0px 10px 0px 10px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
	margin-right:10px;
}.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.classname:active {
	position:relative;
	top:1px;
}
#content #formCheck .tablesorter thead tr th {
	text-align: left;
}
</style>
<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{

?><link rel="stylesheet" href="style/jquery.datepick.css" type="text/css" />
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() 
{
$('#search_tgl').datepick();
});
</script>
<div id="content">
<form method="post">
<form method="post">
<div style="border:0px solid gray; padding:10px 0px 5px 0px; height:25px; margin:0px 0px 5px 0px">
<input type="submit" value="" class="search_button" />
  <select class="search_option" name="cari_sortir" onchange="cek_pencarian(this.value)" required>
      <option value=""></option>
      <option value="tb_group_kuitansi.no_group_kuitansi" id="kode_kuitansi">Kode Kwitansi</option>
      <option value="tb_daftar_peserta.instansi_peserta" id="nama">Instansi</option>
      <option value="pelatihan" id="pelatihan">Pelatihan</option>
      <option value="tgl_kuitansi" id="tgl">Tanggal Kwitansi</option>
	</select>
<input type="text" class="search" id="search" placeholder="Pencarian" name="cari" />
<input type="text" class="search" id="search_tgl" placeholder="Pencarian Tanggal" name="cari_tgl" />

</form>
<?php 
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
	echo "<div style='border:0px solid gray; margin:-10px 0px 0px 0px; width:350px; text-align:center; padding:9px 2px; background:#FD9200; color:#FFF'>Isi Tanggal Kwitansi Untuk Laporan Kwitansi Group!</div>";	}
else
{
	$cari_tgl1=$_POST['cari_tgl'];
	if($_POST['cari_sortir']=='tgl_kuitansi'){
	echo "<a href='index.php?page=peserta&pages=kwitansi_group' class='button_a'>Lihat Semua</a>&nbsp";
	echo "<a href='pages/kwitansi_laporan.php?tgl_kuitansi=$_POST[cari_tgl]&kwitansi=group' class='excel'>Laporan Kwitansi</a>";
	}
	else	
	{
	echo "<a href='index.php?page=peserta&pages=kwitansi_group' class='button_a'>Lihat Semua</a>&nbsp";
	}
}
?>
</div>
<script>
$("#search_tgl").hide();

$("#tgl").click(function(){$("#search_tgl").show();})
$("#tgl").click(function(){$("#search").hide();})

$("#kode_kuitansi").click(function(){$("#search").show();})
$("#kode_kuitansi").click(function(){$("#search_tgl").hide();})

$("#nama").click(function(){$("#search").show();})
$("#nama").click(function(){$("#search_tgl").hide();})

$("#pelatihan").click(function(){$("#search").show();})
$("#pelatihan").click(function(){$("#search_tgl").hide();})

</script>
<table class="table">
  <tr>
    <th width="15%">Kode Kwitansi</th>
    <th width="50%">Instansi</th>
    <th width="10%">Pelatihan</th>
    <th width="5%">Jumlah Print</th>
    <th width="2%">Aksi</th>
  </tr>


<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}

if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
$qry_1 = mysql_query("
SELECT distinct (tb_group_kuitansi.no_group_kuitansi), tb_daftar_peserta.instansi_peserta, tb_detail_pelatihan.pelatihan,tb_daftar_peserta.no_peserta
from 
tb_group_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_group_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_group_kuitansi.no_peserta=tb_daftar_peserta.no_peserta group by `tb_group_kuitansi`.`no_group_kuitansi` ASC LIMIT $posisi,$batas");

if (mysql_num_rows($qry_1)==0){
echo "<tr><td align='center' colspan='5'><b>Kosong</b></td></tr>";}
else
{
while($arr_1=mysql_fetch_array($qry_1))
{
$query_jumlah	=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$arr_1[0]'");
$jumlah=mysql_fetch_array($query_jumlah);
echo "
  <tr>
    <td>$arr_1[0]</td>
    <td><a href='$_SERVER[REQUEST_URI]&no_kuitansi=".$arr_1['0']."&#openModal' class='link1'>$arr_1[1]</a></td>
	<td align='center'>$arr_1[2]</td>
	<td align='center'>$jumlah[jumlah]</td>
    <td align='center'>
    <a href='index.php?page=peserta&pages=kwitansi_group_detail&i=$arr_1[0]' class='detail' title='Detail Kwitansi'></a>
    </td>
  </tr>
";
}}
$qry_2 = mysql_query("SELECT distinct (tb_group_kuitansi.no_group_kuitansi), tb_daftar_peserta.instansi_peserta, tb_detail_pelatihan.pelatihan,tb_daftar_peserta.no_peserta
from 
tb_group_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_group_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_group_kuitansi.no_peserta=tb_daftar_peserta.no_peserta group by `tb_group_kuitansi`.`no_group_kuitansi` ASC");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{
	$prev = $halaman-1;
	echo "<a href='index.php?page=peserta&pages=kwitansi_group&i=$prev' class='prev'></a>";
}
else 
{
	echo "<a href='#' class='prev_d'></a>";
}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{
	echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";
}

if($halaman<$jmlhal)
{
	$next = $halaman+1; echo "<a href='index.php?page=peserta&pages=kwitansi_group&i=$next' class='next'></a>";
}
else{
	echo "<a href='#' class='next_d'></a>";
	}
echo "</div>";
}
else 
{
	if($_POST['cari_sortir']=='tgl_kuitansi')
	{
	$q_cari	  ="
	SELECT distinct (tb_group_kuitansi.no_group_kuitansi), tb_daftar_peserta.instansi_peserta, tb_detail_pelatihan.pelatihan
from 
tb_group_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_group_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_group_kuitansi.no_peserta=tb_daftar_peserta.no_peserta
and $_POST[cari_sortir] LIKE '%$_POST[cari_tgl]%' order by tb_group_kuitansi.no_group_kuitansi asc";
	}
	else
	{
	$q_cari	  ="SELECT distinct (tb_group_kuitansi.no_group_kuitansi), tb_daftar_peserta.instansi_peserta, tb_detail_pelatihan.pelatihan
from 
tb_group_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_group_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_group_kuitansi.no_peserta=tb_daftar_peserta.no_peserta 
	and $_POST[cari_sortir] LIKE '%$_POST[cari]%' order by tb_group_kuitansi.no_group_kuitansi asc";
	}
$qry_cari = mysql_query($q_cari);
while($arr_cari=mysql_fetch_array($qry_cari)){
$query_jumlah_cari	=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$arr_cari[0]'");
$jumlah_cari=mysql_fetch_array($query_jumlah_cari);
echo "
  <tr>
    <td>$arr_cari[0]</td>
    <td><a href='$_SERVER[REQUEST_URI]&no_kuitansi=".$arr_1['0']."&#openModal' class='link1'>$arr_cari[1]</a></td>
	<td align='center'>$arr_cari[2]</td>
	<td align='center'>$jumlah_cari[jumlah]</td>
    <td align='center'>
    <a href='index.php?page=peserta&pages=kwitansi_group_detail&i=$arr_cari[0]' class='detail' title='Detail Kwitansi'></a>
    </td>
  </tr>
";
}	
}
?>
</table>
</div>
<div id="openModal" class="modalDialog" style="overflow:auto">
<?php
$q_detail=mysql_query("
select * from tb_daftar_peserta,tb_group_kuitansi where tb_daftar_peserta.no_peserta=tb_group_kuitansi.no_peserta 
and tb_group_kuitansi.no_group_kuitansi='$_GET[no_kuitansi]' group by tb_group_kuitansi.no_peserta");
?>
<div id="form" >
<a href="#close" title="Close" class="close">X</a>

<div style="overflow: auto; border:0px solid gray; width:550px; height:500px">
<table width="530" align="center" border="0">
<tr><td colspan="3">
<h2>Daftar Nama Untuk No. Group Kwitansi [ <?php echo $_GET['no_kuitansi']?> ]</h2></td></tr>
<?php 
$i=1;
while($row_detail	=mysql_fetch_array($q_detail)){
$no=$row_detail['no_group_kuitansi'];	
?>
<tr><td><?php echo $i."."?></td>
<td width="486px"><?php echo $row_detail['nama']; ?></td>
</tr>
<?php
$i++;}
?>
</table>
</div>
</div>
</div></div>
</div>
<?php
}
?>
