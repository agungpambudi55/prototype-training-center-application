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
<style>
.button{ padding:9px 13px; cursor:pointer; text-decoration:none; color:#FFFFFF; background:#63B0FE; font-size:13px; border:0px solid gray;}
.button:hover{ background:#7DC8FF}
</style>
<div class="title_page">
Sertifikat</div>
<div id="content">


<a href="index.php?page=sertifikat_pdf_form1"><button class="button">Buat Sertifikat</button></a>&nbsp;
<!--<a href="index.php?page=sertifikat_excel_form1" class="excel">Buat Excel</a>&nbsp;-->
<p style="border:0px solid gray; margin:-27px; margin-bottom:40px; margin-right:5px;">
<?php 
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{}
else
{echo "<a href='index.php?page=sertifikat_view' class='button_a' style='margin:0px 0px 0px 267px; padding:8px 15px 10px 15px'>Lihat Semua</a>";}
?>
<form method="post" style="margin:-67px 0px 80px 0px;">
<input type="submit" value="" class="search_button" />
    <select class="search_option" name="cari_sortir" required>
      <option value=""></option>
      <option value="tb_daftar_peserta.nama">Nama</option>
      <option value="tb_sertifikat.no_sertifikat">No. Sertifikat</option>
	</select>
<input type="text" class="search" placeholder="Pencarian" name="cari" required/>
</p>
</form>
<table class="table">
  <tr>
    <th width="55%">Nama</th>
    <th width="43%">No. Sertifikat</th>
    <th width="2%" colspan="2">Aksi</th>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
$qry_1 = mysql_query("select tb_sertifikat.id_sertifikat, tb_sertifikat.no_sertifikat, tb_daftar_peserta.nama, tb_daftar_peserta.no_peserta from tb_sertifikat, tb_daftar_peserta where tb_sertifikat.no_peserta=tb_daftar_peserta.no_peserta order by tb_daftar_peserta.nama asc LIMIT $posisi,$batas");
$no = $posisi+1;
if (mysql_num_rows($qry_1)==0)
{echo "<tr><td align='center' colspan='3'><b>Kosong</b></td></tr></table><p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_1)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($qry_1))
{
echo "
  <tr>
    <td>$arr_1[2]</td>
    <td>$arr_1[1]</td>
    <td align='center'>
    <a href='index.php?page=histori_detail&i=$arr_1[3]' class='detail' title='Detail'></a>
	</td>
	<td><a href='index.php?page=sertifikat_model&idterakir=$arr_1[id_sertifikat]'><img src='style/images/printer.png' style='width:18px; margin:2px 1px 0px 1px;' /></a></td>
  </tr>
";
$no++;
}
$qry_2 = mysql_query("SELECT * FROM tb_sertifikat");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=sertifikat_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=sertifikat_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
}
else
{
$qry_cari = mysql_query("SELECT tb_sertifikat.id_sertifikat, tb_sertifikat.no_sertifikat, tb_daftar_peserta.nama,  tb_daftar_peserta.no_peserta FROM tb_sertifikat, tb_daftar_peserta where tb_sertifikat.no_peserta=tb_daftar_peserta.no_peserta and $_POST[cari_sortir] LIKE '%$_POST[cari]%' order by tb_daftar_peserta.nama asc");
if(mysql_num_rows($qry_cari)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($qry_cari))
{
echo "
  <tr>
    <td>$arr_1[2]</td>
    <td>$arr_1[1]</td>
    <td align='center'>
    <a href='index.php?page=histori_detail&i=$arr_1[3]' class='detail' title='Detail'></a>
    </td>
	<td><a href='pages/convert_pdf/sertifikat_convert_pdf2.php?idterakir=$arr_1[id_sertifikat]'><img src='style/images/printer.png' style='width:18px; margin:2px 1px 0px 1px;' /></a></td>
  </tr>
";
}
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>
";
}

}
?>
</div>
<?php }?>