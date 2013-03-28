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
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
$idkelas=$_REQUEST['nama_kelas'];
$i=1;
$qry1=mysql_query("select*from tb_kelas,tb_peserta_kelas, tb_jenis_peserta,tb_instruktur, tb_daftar_peserta where tb_kelas.id_kelas=tb_peserta_kelas.id_kelas 
and tb_kelas.id_instruktur=tb_instruktur.id_instruktur
and tb_kelas.id_kelas =tb_peserta_kelas.id_kelas 
and tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta 
and tb_daftar_peserta.id_jenis_peserta=tb_jenis_peserta.id_jenis_peserta
and tb_kelas.id_kelas='$idkelas'");

?>
<div id="content">
<?php
$rrr=mysql_query("SELECT * FROM `tb_peserta_kelas`, tb_pilih_judul, tb_judul where tb_judul.id_judul=tb_pilih_judul.id_judul
AND tb_pilih_judul.id_pilih_judul=tb_peserta_kelas.id_pilih_judul 
AND tb_peserta_kelas.id_kelas=$idkelas");
$ggg=mysql_fetch_array($rrr);
?>
<p style="margin:0;border:0px solid gray; padding:5px 0px 25px 0px; font-size:17px; color:#333333">
<?php  echo "Judul Pelatihan : $ggg[judul_training]"; ?>
<?php
echo "<a style='text-decoration:none; float:right; margin-left:10px;' href='pages/absen_peserta_print_mahasiswa.php?nama_kelas=".$_GET['nama_kelas']."&jenispeserta=mahasiswa'><input type='button' class='button_a' formtarget='_new' value='Print Mahasiswa'/></a> ";
echo "<a style='text-decoration:none; float:right;' href='pages/absen_peserta_print_umum.php?nama_kelas=".$_GET['nama_kelas']."&jenispeserta=umum'><input type='submit' formtarget='_new' class='button_a' value='Print Umum'/></a> ";
?>
</p>


<?php

$id_judul=$ggg['id_judul'];?>

 <table class="table">
<tr>

<th width="5%">No</th>
<th width="20%">Nama</th>
<th width="30%">Kelas</th>
<th width="20%">Instruktur</th>
<th width="25%">Jenis Peserta</th>
</tr>
<?php 
while($r=mysql_fetch_array($qry1)){
$idpeserta=$r['no_peserta'];
$idinstruktur=$r['id_instruktur'];
$idjenis=$r['id_jenis_peserta'];
//pesertazz
$peserta=mysql_query("select * from tb_daftar_peserta where no_peserta='$idpeserta'");
$p=mysql_fetch_array($peserta);
$nama=$p['nama'];
//instruktur
$instruktur=mysql_query("select * from tb_instruktur where id_instruktur='$idinstruktur'");
$a=mysql_fetch_array($instruktur);
$namai=$a['nama'];
///jenis
$je=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta='$idjenis'");
$jenis=mysql_fetch_array($je);
$jeniss=$jenis['jenis_peserta'];
?>
<tr>
<td align="center"><?php echo $i;?></td>
<td><?php echo $r['nama'];?></td>
<td><?php echo $r['nama_kelas'];?></td>
<td><?php echo $namai;?></td>
<td><?php echo $jeniss;?></td>
</tr>
<?php

$i++;
}
?>
<?php

		$qry_2 = mysql_query("select * from tb_kelas,tb_peserta_kelas, tb_jenis_peserta,tb_instruktur, tb_daftar_peserta where tb_kelas.id_kelas=tb_peserta_kelas.id_kelas 
and tb_kelas.id_instruktur=tb_instruktur.id_instruktur
and tb_kelas.id_kelas =tb_peserta_kelas.id_kelas 
and tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta 
and tb_daftar_peserta.id_jenis_peserta=tb_jenis_peserta.id_jenis_peserta
and tb_kelas.id_kelas='$idkelas'");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=absen_peserta_print_pre1&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=absen_peserta_print_pre1&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
?>
<?php }?>