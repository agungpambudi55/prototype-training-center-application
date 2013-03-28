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
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<link rel="stylesheet" href="style/jquery.datepick.css" type="text/css" />
<script type="text/javascript">
$(function() 
{$('#Datepicker1').datepick();$('#Datepicker2').datepick();});
</script>
<div id="content">
<?php 
$idp=$_REQUEST['idp'];
if (isset($idp))
{?>
<form method="post">
<div style="border:0px solid gray; padding:10px 0px 20px 0px ">
<input type="submit" value="" class="search_button" />
<input type="text" class="search" placeholder="Tanggal Selesai" id="Datepicker2" name="cari2" required/>
<input type="text" class="search" placeholder="Tanggal Mulai" id="Datepicker1" name="cari1" required>
<?php
@$cari1=$_POST['cari1'];
@$cari2=$_POST['cari2'];
if (($cari1) or ($cari2))
{ 
?>
<a href="pages/convert_pdf/jadwal_convert_pdf.php?idp=<?php echo $_REQUEST['idp'];?>&tgl1=<?php echo $cari1; ?>&tgl2=<?php echo $cari2; ?> " target="_new" class="pdf">Cetak PDF</a>&nbsp;
<a href="pages/jadwal_training_convert_exel.php?idp=<?php echo $_REQUEST['idp'];?>&tgl1=<?php echo $cari1; ?>&tgl2=<?php echo $cari2; ?> " class="excel">Cetak Excel</a>&nbsp;
<?php 
if (($cari1=="") or ($cari2==""))
{}
else
{echo "<a href='index.php?page=pel&pages=jadwal_training_view&idp=$idp' class='button_a'>Lihat Semua</a>";}
}
elseif(@$_GET['jd'])
{}
else
{
echo "<p style='border:0px solid gray; text-align:center; margin:-10px 0px -10px 5px; width:460px; padding:10px 5px; background:#FD9200; color:#FFF'>Isi Tanggal Mulai dan Tanggal Selesai untuk Mencetak Jadwal Pelatihan!</p>";
}?>
</div>
</form>
<?php
if(isset($_GET['ref']))
{
  if($_GET['ref']=="edt")
	{echo "<div class='notifhijau'>Data berhasil diperbarui! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>
    <th width="13%" rowspan="2">Judul</th>
    <th width="30%" colspan="3">Biaya Peserta</th>
    <th width="4%"  rowspan="2">Jumlah Jam</th>
    <th width="4%" rowspan="2">Jumlah Hari</th>
    <th width="10%" rowspan="2">Tanggal Training</th>
    <th width="7%" rowspan="2">Jam Training</th>
    <th width="6%" rowspan="2">Sertifikat</th>
    <th width="5%" rowspan="2">Jumlah Peserta</th>
    <th width="6%" rowspan="2">Aksi</th>
    <th width="8%" rowspan="2">Status</th>
  </tr>
  <tr>
       <?php
    $jenpes=mysql_query("select * from tb_jenis_peserta order  by id_jenis_peserta asc ");
    while($arr_jenpes=mysql_fetch_array($jenpes))
    {
    echo "<th width='11%'>$arr_jenpes[jenis_peserta]</th>";
    }
    ?>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}

if (($cari1=='') or ($cari2==''))
{
if(isset($_GET['jd']))
{
$jud=mysql_query("select * from tb_jadwal_training where id_details_pelatihan=$_GET[idp] and id_judul=$_GET[jd]");
$jud_arr=mysql_fetch_array($jud);
	$id_jadwal_training=$jud_arr['0'];
	$pelatihan=$jud_arr['1'];
	$id_judul=$jud_arr['2'];
	$tgl1=$jud_arr['3'];
	$tgl2=$jud_arr['4'];
	$jam_mulai=$jud_arr['5'];
	$jam_selesai=$jud_arr['6'];
	$ket=$jud_arr['7'];
	$query1 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$pelatihan'");
	$a=mysql_fetch_array($query1);
	$pe=$a['pelatihan'];
	////judul
	$query2 = mysql_query("select judul_training from tb_judul where id_judul = '$id_judul'");
	$b=mysql_fetch_array($query2);
	$judul=$b['judul_training'];
	////hari
	$query6 = mysql_query("select * from tb_judul where id_judul = '$id_judul'");
	$f=mysql_fetch_array($query6);
	$hari=$f['jmlh_hari'];
	/////durasi
	$qry_min = mysql_query("select * from tb_judul where id_judul =$jud_arr[id_judul]");
	$qry_min_arr=mysql_fetch_array($qry_min);
	$durasi=$qry_min_arr['durasi'];
	
	$qry_cek=mysql_query("select count(*) as x from tb_peserta_kelas, tb_pilih_judul where tb_pilih_judul.id_pilih_judul=tb_peserta_kelas.id_pilih_judul and tb_pilih_judul.id_judul=$jud_arr[id_judul]");
	$qry_cek_arr=mysql_fetch_array($qry_cek);
	
	$jml_peserta=mysql_query("select count(no_peserta) as jumlah from tb_pilih_judul where id_judul=$jud_arr[id_judul]");
	$jml_pes=mysql_fetch_array($jml_peserta);
	$ygada=$jml_pes['jumlah']-$qry_cek_arr['x'];
	$dates=substr($jud_arr['3'],5,2);
	switch ($dates)
	{
		case "01": $bulan1 = "Januari"; 	break;
		case "02": $bulan1 = "Februari";	break;
		case "03": $bulan1 = "Maret"; 		break;
		case "04": $bulan1 = "April"; 		break;
		case "05": $bulan1 = "Mei";			break;
		case "06": $bulan1 = "Juni"; 		break;
		case "07": $bulan1 = "Juli"; 		break;
		case "08": $bulan1 = "Agustus"; 	break;
		case "09": $bulan1 = "September"; 	break;
		case "10": $bulan1 = "Oktober"; 	break;
		case "11": $bulan1 = "November"; 	break;
		case "12": $bulan1 = "Desember"; 	break;
	}
	$dates=substr($jud_arr['4'],5,2);
	switch ($dates)
	{
		case "01": $bulan2 = "Januari"; 	break;
		case "02": $bulan2 = "Februari";	break;
		case "03": $bulan2 = "Maret"; 		break;
		case "04": $bulan2 = "April"; 		break;
		case "05": $bulan2 = "Mei";			break;
		case "06": $bulan2 = "Juni"; 		break;
		case "07": $bulan2 = "Juli"; 		break;
		case "08": $bulan2 = "Agustus"; 	break;
		case "09": $bulan2 = "September"; 	break;
		case "10": $bulan2 = "Oktober"; 	break;
		case "11": $bulan2 = "November"; 	break;
		case "12": $bulan2 = "Desember"; 	break;
	}
echo "
	<tr>
	<td style='vertical-align: middle'>$judul</td>";	
$jenis=mysql_query("select * from tb_jenis_peserta order by id_jenis_peserta asc");
while($rows=mysql_fetch_array($jenis))
{
$x=mysql_query("select * from tb_judul_jenis_peserta  where id_jenis_peserta=$rows[0] and id_judul=$id_judul");
$xx=mysql_fetch_array($x);
echo "<td align='center'>".$xxx=$xx['3']."</td>";
}
echo"<td align='center'>$durasi</td>	
	<td align='center'>$hari</td>	
	<td align='center'>".substr($jud_arr['3'],8,2)." ".$bulan1." ".substr($jud_arr['3'],0,4)."<br>s/d<br>".substr($jud_arr['4'],8,2)." ".$bulan2." ".substr($jud_arr['4'],0,4)."</td>	
	<td align='center'>$jam_mulai<br>s/d<br>$jam_selesai</td>	
	<td>$ket</td>	
	<td align='center'>$ygada</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=jadwal_training_update&edit_id=$id_jadwal_training' class='update' title='Edit Jadwal Pelatihan'></a>
	"?>
	<a href='index.php?page=pel&pages=jadwal_training_delete&hapus_id=<?php echo $id_jadwal_training;?>' onclick='return konfirmasi_jadwal("<?php echo $pe;?>")' class="delete" title="Hapus Jadwal Pelatihan"></a>
	<?php
    if($ygada==0)
{echo "<p class='tdkmasuk'  title='Belum memenuhi syarat Masuk Kelas'></p>";}else{
echo "<a href='index.php?page=pel&pages=kelas_pembagian_peserta&id_jadwal=$id_jadwal_training&id_pelatihan=$jud_arr[id_details_pelatihan]&judul=$id_judul'  title='Memenuhi syarat Masuk Kelas'><p class='masuk'></p></a></td>";}
    if($ygada==0)
{echo "<td align='center'><font color='red'>Belum Siap Masuk Kelas</font></td>";}else{
echo "<td align='center'><font color='green'>Sudah Siap Masuk Kelas</font></td></tr>";}
echo "</table>";
}
else
{
$jud=mysql_query("select * from tb_jadwal_training where id_details_pelatihan=$_REQUEST[idp] LIMIT $posisi,$batas");
$noo=1;
while($jud_arr=mysql_fetch_array($jud))
{
	$id_jadwal_training=$jud_arr['0'];
	$pelatihan=$jud_arr['1'];
	$id_judul=$jud_arr['2'];
	$tgl1=$jud_arr['3'];
	$tgl2=$jud_arr['4'];
	$jam_mulai=$jud_arr['5'];
	$jam_selesai=$jud_arr['6'];
	$ket=$jud_arr['7'];
	$query1 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$pelatihan'");
	$a=mysql_fetch_array($query1);
	$pe=$a['pelatihan'];
	////judul
	$query2 = mysql_query("select judul_training from tb_judul where id_judul = '$id_judul'");
	$b=mysql_fetch_array($query2);
	$judul=$b['judul_training'];
	////hari
	$query6 = mysql_query("select * from tb_judul where id_judul = '$id_judul'");
	$f=mysql_fetch_array($query6);
	$hari=$f['jmlh_hari'];
	/////durasi
	$qry_min = mysql_query("select * from tb_judul where id_judul =$jud_arr[id_judul]");
	$qry_min_arr=mysql_fetch_array($qry_min);
	$durasi=$qry_min_arr['durasi'];
	
	$qry_cek=mysql_query("select count(*) as x from tb_peserta_kelas, tb_pilih_judul where tb_pilih_judul.id_pilih_judul=tb_peserta_kelas.id_pilih_judul and tb_pilih_judul.id_judul=$jud_arr[id_judul]");
	$qry_cek_arr=mysql_fetch_array($qry_cek);
	
	$jml_peserta=mysql_query("select count(no_peserta) as jumlah from tb_pilih_judul where id_judul=$jud_arr[id_judul]");
	$jml_pes=mysql_fetch_array($jml_peserta);
	$ygada=$jml_pes['jumlah']-$qry_cek_arr['x'];
	$dates=substr($tgl1,5,2);
	switch ($dates)
	{
		case "01": $bulan1v = "Januari"; 	break;
		case "02": $bulan1v = "Februari";	break;
		case "03": $bulan1v = "Maret"; 		break;
		case "04": $bulan1v = "April"; 		break;
		case "05": $bulan1v = "Mei";			break;
		case "06": $bulan1v = "Juni"; 		break;
		case "07": $bulan1v = "Juli"; 		break;
		case "08": $bulan1v = "Agustus"; 	break;
		case "09": $bulan1v = "September"; 	break;
		case "10": $bulan1v = "Oktober"; 	break;
		case "11": $bulan1v = "November"; 	break;
		case "12": $bulan1v = "Desember"; 	break;
	}
	$dates=substr($tgl2,5,2);
	switch ($dates)
	{
		case "01": $bulan2v = "Januari"; 	break;
		case "02": $bulan2v = "Februari";	break;
		case "03": $bulan2v = "Maret"; 		break;
		case "04": $bulan2v = "April"; 		break;
		case "05": $bulan2v = "Mei";			break;
		case "06": $bulan2v = "Juni"; 		break;
		case "07": $bulan2v = "Juli"; 		break;
		case "08": $bulan2v = "Agustus"; 	break;
		case "09": $bulan2v = "September"; 	break;
		case "10": $bulan2v = "Oktober"; 	break;
		case "11": $bulan2v = "November"; 	break;
		case "12": $bulan2v = "Desember"; 	break;
	}
	
echo "
	<tr>
	<td style='vertical-align: middle'>$judul</td>";	
$jenis=mysql_query("select * from tb_jenis_peserta order by id_jenis_peserta asc");
while($rows=mysql_fetch_array($jenis))
{
$x=mysql_query("select * from tb_judul_jenis_peserta  where id_jenis_peserta=$rows[0] and id_judul=$id_judul");
$xx=mysql_fetch_array($x);
echo "<td align='center'>".$xxx=$xx['3']."</td>";
}
echo"<td align='center'>$durasi</td>	
	<td align='center'>$hari</td>	
	<td align='center'>".substr($jud_arr['3'],8,2)." ".$bulan1v." ".substr($jud_arr['3'],0,4)."<br>s/d<br>".substr($jud_arr['4'],8,2)." ".$bulan2v." ".substr($jud_arr['4'],0,4)."</td>	
	<td align='center'>$jam_mulai<br>s/d<br>$jam_selesai</td>	
	<td>$ket</td>	
	<td align='center'>$ygada</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=jadwal_training_update&edit_id=$id_jadwal_training&idp=$idp' class='update' title='Edit Jadwal Pelatihan'></a>
	"?>
	<a href='index.php?page=pel&pages=jadwal_training_delete&hapus_id=<?php echo "$id_jadwal_training&idp=$idp";?>' onclick='return konfirmasi_jadwal("<?php echo $pe;?>")' class="delete" title="Hapus Jadwal Pelatihan"></a>
	<?php
    if($ygada==0)
{echo "<p class='tdkmasuk'  title='Belum memenuhi syarat Masuk Kelas'></p>";}else{
echo "<a href='index.php?page=pel&pages=kelas_pembagian_peserta&id_jadwal=$id_jadwal_training&id_pelatihan=$jud_arr[id_details_pelatihan]&judul=$id_judul'  title='Memenuhi syarat Masuk Kelas'><p class='masuk'></p></a></td>";}
    if($ygada==0)
{echo "<td align='center'><font color='red'>Belum Siap Masuk Kelas</font></td>";}else{
echo "<td align='center'><font color='green'>Sudah Siap Masuk Kelas</font></td></tr>";}
$noo++;
}

$qry_2 = mysql_query("select * from tb_jadwal_training where id_details_pelatihan=$_REQUEST[idp]");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=pel&pages=jadwal_training_view&idp=$idp&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=pel&pages=jadwal_training_view&idp=$idp&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
}
else
{
	$query=mysql_query("SELECT * FROM `tb_jadwal_training` where tgl1 and tgl2 between '$_POST[cari1]'  and '$_POST[cari2]' and tb_jadwal_training.id_details_pelatihan='$idp'");	
	while($cari=mysql_fetch_array($query))
	{
	$id_jadwal_trainingc=$cari['0'];
	$pelatihanc=$cari['1'];
	$id_judulc=$cari['2'];
	$tgl1c=$cari['3'];
	$tgl2c=$cari['4'];
	$jam_mulaic=$cari['5'];
	$jam_selesaic=$cari['6'];
	$ketc=$cari['7'];
	$query1c = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$pelatihanc'");
	$ac=mysql_fetch_array($query1c);
	$pec=$ac['pelatihan'];
	////judul
	$query2c = mysql_query("select judul_training from tb_judul where id_judul = '$id_judulc'");
	$bc=mysql_fetch_array($query2c);
	$judulc=$bc['judul_training'];
	////hari
	$query6c = mysql_query("select * from tb_judul where id_judul = '$id_judulc'");
	$fc=mysql_fetch_array($query6c);
	$haric=$fc['jmlh_hari'];
	/////durasi
	$qry_minc = mysql_query("select * from tb_judul where id_judul =$cari[id_judul]");
	$qry_min_arrc=mysql_fetch_array($qry_minc);
	$durasic=$qry_min_arrc['durasi'];
	
	$qry_cekc=mysql_query("select count(*) as x from tb_peserta_kelas, tb_pilih_judul where tb_pilih_judul.id_pilih_judul=tb_peserta_kelas.id_pilih_judul and tb_pilih_judul.id_judul=$cari[id_judul]");
	$qry_cek_arrc=mysql_fetch_array($qry_cekc);
	
	$jml_pesertac=mysql_query("select count(no_peserta) as jumlah from tb_pilih_judul where id_judul=$cari[id_judul]");
	$jml_pesc=mysql_fetch_array($jml_pesertac);
	$ygadac=$jml_pesc['jumlah']-$qry_cek_arrc['x'];
	
	$dates=substr($cari['3'],5,2);
	switch ($dates)
	{
		case "01": $bulan1c = "Januari"; 	break;
		case "02": $bulan1c = "Februari";	break;
		case "03": $bulan1c = "Maret"; 		break;
		case "04": $bulan1c = "April"; 		break;
		case "05": $bulan1c = "Mei";			break;
		case "06": $bulan1c = "Juni"; 		break;
		case "07": $bulan1c = "Juli"; 		break;
		case "08": $bulan1c = "Agustus"; 	break;
		case "09": $bulan1c = "September"; 	break;
		case "10": $bulan1c = "Oktober"; 	break;
		case "11": $bulan1c = "November"; 	break;
		case "12": $bulan1c = "Desember"; 	break;
	}
	$dates=substr($cari['4'],5,2);
	switch ($dates)
	{
		case "01": $bulan2c = "Januari"; 	break;
		case "02": $bulan2c = "Februari";	break;
		case "03": $bulan2c = "Maret"; 		break;
		case "04": $bulan2c = "April"; 		break;
		case "05": $bulan2c = "Mei";			break;
		case "06": $bulan2c = "Juni"; 		break;
		case "07": $bulan2c = "Juli"; 		break;
		case "08": $bulan2c = "Agustus"; 	break;
		case "09": $bulan2c = "September"; 	break;
		case "10": $bulan2c = "Oktober"; 	break;
		case "11": $bulan2c = "November"; 	break;
		case "12": $bulan2c = "Desember"; 	break;
	}

echo "
	<tr>
	<td>$judulc</td>";	
$jenisc=mysql_query("select * from tb_jenis_peserta order by id_jenis_peserta asc");
while($rowsc=mysql_fetch_array($jenisc))
{
$xc=mysql_query("select * from tb_judul_jenis_peserta  where id_jenis_peserta=$rowsc[0] and id_judul=$id_judulc");
$xxc=mysql_fetch_array($xc);
echo "<td align='center'>".$xxxc=$xxc['3']."</td>";
}
echo"<td align='center'>$durasic</td>	
	<td align='center'>$haric</td>	
	<td align='center'>".substr($cari['3'],8,2)." ".$bulan1c." ".substr($cari['3'],0,4)."<br>s/d<br>".substr($cari['4'],8,2)." ".$bulan2c." ".substr($cari['4'],0,4)."</td>	
	<td align='center'>$jam_mulaic<br>s/d<br>$jam_selesaic</td>	
	<td>$ketc</td>	
	<td align='center'>$ygadac</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=jadwal_training_update&edit_id=$id_jadwal_trainingc&idp=$idp' class='update' title='Edit Jadwal Pelatihan'></a>
	"?>
	<a href='index.php?page=pel&pages=jadwal_training_delete&hapus_id=<?php echo "$id_jadwal_trainingc&idp=$idp";?>' onclick='return konfirmasi_jadwal("<?php echo $pec;?>")' class="delete" title="Hapus Jadwal Pelatihan"></a><?php
if($ygadac==0)
{echo "<p class='tdkmasuk'  title='Belum memenuhi syarat Masuk Kelas'></p>";}
else
{echo "<a href='index.php?page=pel&pages=kelas_pembagian_peserta&id_jadwal=$id_jadwal_trainingc&id_pelatihan=$cari[id_details_pelatihan]&judul=$id_judulc'  title='Memenuhi syarat Masuk Kelas'><p class='masuk'></p></a></td>";}
if($ygadac==0)
{echo "<td align='center'><font color='red'>Belum Siap Masuk Kelas</font></td>";}
else
{echo "<td align='center'><font color='green'>Sudah Siap Masuk Kelas</font></td></tr>";}
?>
<?php
}
if(mysql_num_rows(@$query) < 1)
{				
echo "<tr><td colspan='13' align='center'>Data tidak ditemukan</td></tr><p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($query)."</b></p>";
}
echo "</table>";
echo "<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($query)."</b></p>";
}
}
?>
</div>
<?php
}
?>