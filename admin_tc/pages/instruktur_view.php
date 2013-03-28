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
<script type="text/javascript">
function konfirmasi_in(name)
{
if (confirm('Apakah anda ingin menghapus instruktur '+ name +' ?'))
{return true;}
else
{return false;}
}
</script>
<div class="title_page">
Instruktur</div>
<div id="content">
<form method="post">
<div style="border:0px solid gray; padding:10px 0px 15px 0px ">
<a href="index.php?page=instruktur_insert" class="button_a">Tambah Data</a>

<?php 
if(@$_POST['cari']=="")
{}
else
{echo "<a href='index.php?page=instruktur_view' class='button_a'>Lihat Semua</a>";}
?>
<input type="submit" value="" class="search_button" />
<input type="text" class="search" placeholder="Pencarian" name="cari" required/>
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
<table class="table">
  <tr>
			<th width="21%">Nama</th>
			<th width="8%">Nip</th>
            <th width="15%">Instansi</th>
            <th width="6%">Jabatan</th>
            <th width="8%">Tempat Lahir</th>
            <th width="10%">Tanggal Lahir</th>
            <th width="10%">Jenis Kelamin</th>
            <th width="10%">No Telepon</th>
            <th width="4%">Status</th>
			<th withh="5%" colspan="2">Aksi </th>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
	
	
$qry_1 = mysql_query("SELECT * FROM tb_instruktur order by nama asc LIMIT $posisi,$batas");
$no = $posisi+1;
if(mysql_num_rows($qry_1)==0)
{echo "<tr><td colspan='11' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>0</b></p>";}
else
{
while ($view=mysql_fetch_array($qry_1))
{ ?>
<tr>
    <td><?php echo $view['nama']; ?></td>
    <td align="center"><?php echo $view['NIP']; ?></td>
    <td><?php echo $view['instansi']; ?></td>
    <td><?php echo $view['jabatan']; ?></td>
    <td><?php echo $view['tempat_lahir']; ?></td>
    <td align="center"><?php echo $view['tgl_lahir']; ?></td>
    <td><?php echo $view['gender']; ?></td>
    <td align="center"><?php echo $view['tlp']; ?></td>
    <td><?php echo $view['status']; ?></td>
    <td align="center">
     <a href="index.php?page=instruktur_update&editinstruktur=<?php echo $view['id_instruktur']; ?>" class='update' title='Edit'></a>
    <a href="index.php?page=instruktur_proses&hapusinstruktur=<?php echo $view['id_instruktur']; ?>"   onclick="return konfirmasi_in('<?php echo $view['nama']; ?>')" class='delete' title='Hapus'></a>
    </td>
	
    
	 </tr>
     
    <?php
 
  $no++;
 
		}
		
		$qry_2 = mysql_query("SELECT * FROM tb_instruktur");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=instruktur_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=instruktur_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
}else
{
	
	
	
$qry_cari = mysql_query("SELECT * FROM tb_instruktur where nama LIKE '%$_POST[cari]%' order by nama asc ");
if(mysql_num_rows($qry_cari)==0)
{echo "<tr><td colspan='11' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>";}
else
{
while ($view=mysql_fetch_array($qry_cari))
{

?>
 <tr>
    
    <td><?php echo $view['nama']; ?></td>
    <td align="center"><?php echo $view['NIP']; ?></td>
    <td ><?php echo $view['instansi']; ?></td>
    <td ><?php echo $view['jabatan']; ?></td>
    <td ><?php echo $view['tempat_lahir']; ?></td>
    <td   align="center"><?php echo $view['tgl_lahir']; ?></td>
    <td ><?php echo $view['gender']; ?></td>
    <td  align="center"><?php echo $view['tlp']; ?></td>
    <td ><?php echo $view['status']; ?></td>
	<td align="center" ><a href="index.php?page=instruktur_update&editinstruktur=<?php echo $view['id_instruktur']; ?>" class='update'></a>
    <a href="index.php?page=instruktur_proses&hapusinstruktur=<?php echo $view['id_instruktur']; ?>"  class='delete' onclick="return konfirmasi_in('<?php echo $view['nama']; ?>')">
</a></td>
    
	 </tr>
     
<?php
}
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>
";
}



}
?>


</div>
<?php }?>