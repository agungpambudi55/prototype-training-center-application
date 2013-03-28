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
$kls=$_REQUEST['nama_kelas'];
$query_kelas = mysql_query("select id_kelas from tb_kelas where nama_kelas = '$kls'");
$array_kelas = mysql_fetch_array($query_kelas);
$nama_kelas = $array_kelas['0'];

$totpes=mysql_query("
	SELECT DISTINCT tb_daftar_peserta.no_peserta FROM tb_daftar_peserta, tb_kelas, tb_peserta_kelas where 
	tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta and 
	tb_peserta_kelas.id_kelas=tb_kelas.id_kelas and 
	tb_kelas.id_kelas='$nama_kelas'
	");
$tot_peserta = mysql_num_rows($totpes);

$qry= "select * from tb_absen_peserta where id_kelas='$nama_kelas'";
$result = mysql_query($qry);
$total_jumlah = mysql_num_rows($result);



if ($tot_peserta=='0')
{
	echo "<script>alert ('Belum ada peserta');location.href = ('index.php?page=absen&pages=absen_peserta_view');</script>";
}
else
{if ($total_jumlah=='0')
{
		echo "<script>alert ('Belum diabsen');location.href = ('index.php?page=absen&pages=absen_peserta_view');</script>";
}
else
{
?>

<div id="content">
<form action="index.php?page=absen&pages=absen_peserta_delete" method="post">
<p class="backk"><a href="index.php?page=absen&pages=absen_peserta_view" class="back"></a></p>
<div style="margin:0;border:0px solid gray; padding:5px 0px 20px 0px; font-size:17px; color:#333333">
Nama Kelas : <?php echo $kls ?>
<p style="float:right; margin:-10px 0px; border:0px solid gray; padding:5px 0px 10px 0px; font-size:17px; color:#333333">
<?php echo "<a href='pages/absen_print_excel.php?print=$_REQUEST[nama_kelas]' class='excel'>Laporan Absen per Kelas</a>"; ?>&nbsp;&nbsp;&nbsp;
<input type="submit" value="Hapus Semua" onClick="return absen_kelas('<?php echo $kls; ?>')" class="button_a"/></p>
</div>
 <table  class="table">
		<tr>
			<th width="65%">Nama Peserta</th>
			<th width="10%">Status Absen</th>			
            <th width="10%">Tanggal Absen</th>
            <th width="5%">Aksi</th>
		</tr>

<?php }} ?>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
{
$qry= "SELECT * FROM tb_absen_peserta, tb_daftar_peserta WHERE tb_daftar_peserta.no_peserta = tb_absen_peserta.no_peserta AND id_kelas = '$nama_kelas' ORDER BY tb_daftar_peserta.nama LIMIT $posisi,$batas";
$result = mysql_query($qry);
$total_jumlah = mysql_num_rows($result);


while($brs=mysql_fetch_array($result))
{
$id_absen_peserta=$brs['0'];
$id_kelas=$brs['1'];
$no_peserta=$brs['2'];
$id_instruktur=$brs['3'];

$status_absen=$brs['4'];
$tanggal=tanggal($brs['5']);

$query_peserta = mysql_query("select nama from tb_daftar_peserta where no_peserta = '$no_peserta'");
$array_peserta = mysql_fetch_array($query_peserta);
$nama_peserta = $array_peserta['nama'];

$query_kelas = mysql_query("select nama_kelas from tb_kelas where id_kelas = '$id_kelas'");
$array_kelas = mysql_fetch_array($query_kelas);
$nama_kelas = $array_kelas['nama_kelas'];

$query_instruktur = mysql_query("select nama from tb_instruktur where id_instruktur = '$id_instruktur'");
$array_instruktur = mysql_fetch_array($query_instruktur);
$nama_instruktur=$array_instruktur['nama'];

echo "	  
	<tr>
	<td style='vertical-align: middle' > $nama_peserta</td>
    <td style='vertical-align: middle' align='center' >$status_absen</td>
	<td style='vertical-align: middle'  align='center' >$tanggal</td>
	<td align='center' >
	<a href='index.php?page=absen&pages=absen_peserta_update&id_absen_peserta=$id_absen_peserta' class='update' title='Edit'>

	</a>
	</td>
  </tr>";
}

$qry_2 = mysql_query("select *from tb_absen_peserta , tb_kelas where tb_kelas.id_kelas=tb_absen_peserta.id_kelas and tb_kelas.nama_kelas ='$kls' ORDER BY `tb_absen_peserta`.`no_peserta` ASC");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=absen&pages=absen_peserta_view_sortir&nama_kelas=$kls&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=absen&pages=absen_peserta_view_sortir&nama_kelas=$kls&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
?>



</table>

<input type="hidden" name="kelas_delete" value="<?php echo $id_kelas;?>" />
  <input type="hidden" name="instruktur_delete" value="<?php echo $id_instruktur;?>" />
  <input type="hidden" name="nama_kelas_update" value="<?php echo $nama_kelas;?>" />
</form>
<?php }?>