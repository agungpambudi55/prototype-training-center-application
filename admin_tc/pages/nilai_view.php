<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{
?>
<style type="text/css">
.ui-widget {
	list-style:none;
	margin:0;
	padding:0;
}
li{ margin:0; padding:0}
.ui-widget-content {
	border: 1px solid #aaaaaa;
	background:#FFF;
	width:20px;
	cursor:pointer;
	font-size:13px;
	color: #222222;
}
.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus 
{ color:#0000FF}
</style>
<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
function kon(name)
{
if (confirm('Apakah anda yakin ingin menghapus nilai dari peserta ' + name +'?'))
{return true;}
else
{return false;}
}
</script>
<?php 
echo 
"
<script>
$(function() {
var availableTags = [
";
$aaa=mysql_query("select * from tb_kelas order by nama_kelas asc");
while($bbb=mysql_fetch_array($aaa))
{
echo "'$bbb[5]',";
}
echo 
"
];
$( '#tags' ).autocomplete({
source: availableTags
});
});
</script>
";
?>
<div id="content">
<div style="border:0px solid gray; margin:5px 0px 10px 0px; ">
<a href="index.php?page=nilai&pages=nilai_insert"><button class="button_a" style="padding:8px 10px; margin-right:5px">Tambah Data</button></a>
<div style="border:0px solid gray; margin:0; float:right; padding:9px 0px 0px 0px">
<form method="post">
<input type="submit" value="" class="search_button" />
<div class="ui-widget" style=" float:right; margin:-1px 0px 0px 0px">
<input id="tags" style="margin-left:10px" type="text" class="search" placeholder="Pencarian Nama Kelas" name="cari" required/>
</div>
</div>	
<?php
$kelas=mysql_query("SELECT 
tb_kelas.nama_kelas
FROM tb_daftar_peserta, tb_detail_pelatihan, tb_peserta_kelas, tb_pilih_judul, tb_kelas, tb_judul, tb_nilai 
WHERE 
tb_daftar_peserta.no_peserta=tb_nilai.no_peserta AND
tb_daftar_peserta.no_peserta=tb_pilih_judul.no_peserta AND
tb_daftar_peserta.no_peserta=tb_peserta_kelas.no_peserta AND
tb_detail_pelatihan.id_details_pelatihan=tb_judul.id_details_pelatihan AND
tb_nilai.id_details_pelatihan=tb_judul.id_details_pelatihan AND
tb_nilai.id_judul=tb_judul.id_judul AND
tb_nilai.id_judul=tb_pilih_judul.id_judul AND
tb_nilai.no_peserta=tb_pilih_judul.no_peserta AND
tb_nilai.no_peserta=tb_peserta_kelas.no_peserta AND
tb_judul.id_judul=tb_pilih_judul.id_judul AND
tb_peserta_kelas.id_pilih_judul = tb_pilih_judul.id_pilih_judul AND 
tb_kelas.id_kelas = tb_peserta_kelas.id_kelas AND 
tb_kelas.nama_kelas LIKE '%".@$_POST['cari']."%' AND 
tb_nilai.val='1'
ORDER BY `tb_peserta_kelas`.`no_peserta` ASC ");
$arr_kelas=mysql_fetch_array($kelas);
$nama_kelas=$arr_kelas['0'];
?>
<?php 
if(@$_POST['cari']=="")
{echo "<a href='pages/nilai_print.php' class='excel' >Laporan Nilai Semua Kelas</a>";
	echo "<div style='border:0px solid gray; margin:-34px 0px 0px 331px; width:280px; text-align:center; padding:9px 2px; background:#FD9200; color:#FFF'>Isi Nama Kelas Untuk Laporan Per Kelas!</div>";}
else
{	echo "<a href='pages/nilai_kelas_print.php?print=$_POST[cari]&kelas=$nama_kelas' class='excel'>Laporan Nilai Per Kelas</a>&nbsp;&nbsp;";
	echo "<a href='index.php?page=nilai&pages=nilai_view' class='button_a'>Lihat Semua</a>";	
}
?>

</div>
</form>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="edt")
	{echo "<div class='notifhijau'>Data berhasil diperbarui! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>

 <table class="table" width="100%">
	<thead>
		<tr>
        	<th width="30%">Nama Peserta</th>
			<th width="15%">Pelatihan</th>
            <th width="40%">Judul Pelatihan</th>
			<th width="5%">Nilai</th>
            <th width="5%">Status</th>
			<th withh="5%">Aksi </th>
        </tr>
	</thead>
	<tbody>
<?php

$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="")
{
$query="SELECT * FROM `tb_nilai` WHERE VAL = '1' ORDER BY `tb_nilai`.`id_judul` ASC LIMIT $posisi,$batas";
$cek_query=mysql_query($query);

if(mysql_num_rows($cek_query)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>0</b></p>";}
else
{

while($baris=mysql_fetch_array($cek_query))
{
$id=$baris['0'];
$id_pe=$baris['1'];
$id_ju=$baris['2'];
$pe=$baris['3'];
$ni=$baris['4'];
$st=$baris['5'];
$query1 = mysql_query("select judul_training from tb_judul where id_judul = '$id_ju'");
$b=mysql_fetch_array($query1);
$judul=$b['judul_training'];
///
$query2 = mysql_query("select nama from tb_daftar_peserta where no_peserta = '$pe'");
$c=mysql_fetch_array($query2);
$peserta=$c['nama'];
///
$query3 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$id_pe'");
$d=mysql_fetch_array($query3);
$pelatihan=$d['pelatihan'];	
	echo "<tr>
	<td ><a href='index.php?page=histori_detail&i=$pe' class='link1' style='height:17px'>$peserta</a></td>
	<td style='vertical-align: middle'>$pelatihan</td>
    <td >$judul</td>
	<td align='center' >$ni</td>
	<td align='center' >$st</td>
	<td align='center'>
	<a href='index.php?page=nilai_update&update_id=$id' class='update'></a>
    <a href='index.php?page=nilai_delete&hapus_id=$id'  class='delete' onclick='return kon(\"".$peserta."\")'></a>
	</td>       
  </tr>";	
}

?>
</body>
</tbody>
<?php
$qry_2 = mysql_query("SELECT * FROM `tb_nilai` WHERE VAL = '1' ORDER BY `tb_nilai`.`id_judul` ASC");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=nilai&pages=nilai_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=nilai&pages=nilai_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";
echo "</div>";
}
}
}else{
	
$qry_cari = mysql_query("
SELECT 
tb_detail_pelatihan.pelatihan, 
tb_judul.judul_training,
tb_daftar_peserta.no_peserta,
tb_daftar_peserta.nama, 
tb_nilai.nilai, 
tb_nilai.status,
tb_nilai.id_nilai
FROM tb_daftar_peserta, tb_detail_pelatihan, tb_peserta_kelas, tb_pilih_judul, tb_kelas, tb_judul, tb_nilai 
WHERE 
tb_daftar_peserta.no_peserta=tb_nilai.no_peserta AND
tb_daftar_peserta.no_peserta=tb_pilih_judul.no_peserta AND
tb_daftar_peserta.no_peserta=tb_peserta_kelas.no_peserta AND
tb_detail_pelatihan.id_details_pelatihan=tb_judul.id_details_pelatihan AND
tb_nilai.id_details_pelatihan=tb_judul.id_details_pelatihan AND
tb_nilai.id_judul=tb_judul.id_judul AND
tb_nilai.id_judul=tb_pilih_judul.id_judul AND
tb_nilai.no_peserta=tb_pilih_judul.no_peserta AND
tb_nilai.no_peserta=tb_peserta_kelas.no_peserta AND
tb_judul.id_judul=tb_pilih_judul.id_judul AND
tb_peserta_kelas.id_pilih_judul = tb_pilih_judul.id_pilih_judul AND 
tb_kelas.id_kelas = tb_peserta_kelas.id_kelas AND 
tb_kelas.nama_kelas LIKE '%$_POST[cari]%' AND 
tb_nilai.val='1'
ORDER BY `tb_peserta_kelas`.`no_peserta` ASC");
if(mysql_num_rows($qry_cari)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($qry_cari))
{
	echo "<tr>
	<td><a href='index.php?page=histori_detail&i=$arr_1[2]' class='link1' style='height:17px'>$arr_1[3]</a></td>
	<td style='vertical-align: middle'>$arr_1[0]</td>
    <td>$arr_1[1]</td>
	<td align='center'>$arr_1[4]</td>
	<td align='center'>$arr_1[5]</td>
	<td align='center'>
	<a href='index.php?page=nilai_update&update_id=$arr_1[6]' class='update'></a>
    <a href='index.php?page=nilai_delete&hapus_id=$arr_1[6]'  class='delete' onclick='return kon(\"".$arr_1['3']."\")'></a>
	</td>       
  </tr>";	
}
}	
	

	}?>
<?php }?>