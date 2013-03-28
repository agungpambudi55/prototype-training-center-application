
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

<div id="content">
<form method="post" action="absen_instruktur_insert_proses.php">
<div style="border:0px solid gray; padding:10px 0px 15px 0px ">
<a href="index.php?page=absen&pages=absen_instruktur_insert" class="button_a">Tambah Data</a>

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
			<th width="30%" >Nama Instruktur </th>
			<th width="30%">Kelas Instruktur </th>
			<th width="25%">Tanggal Absen</th>
			<th width="10%">Status Absen</th>			
            <th withh="5%">Aksi </th>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}

	
	
$qry_1 = mysql_query("select * from tb_absen_instruktur LIMIT $posisi,$batas");
$no = $posisi+1;
if(mysql_num_rows($qry_1)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>0</b></p>";}
else
{
while ($baris=mysql_fetch_array($qry_1))
{
$id=$baris['0'];
$nama=$baris['1'];
$kelas=$baris['2'];
$st=$baris['3'];
$tgl=$baris['4'];
$tgl1=tanggal($tgl);
$query1 = mysql_query("select * from tb_instruktur where id_instruktur = '$nama'");
$b=mysql_fetch_array($query1);

$name=$b['nama'];

$query2 = mysql_query("select nama_kelas from tb_kelas where id_kelas = '$kelas'");
$a=mysql_fetch_array($query2);
$kls=$a['nama_kelas'];


echo "
  <tr>
    <td>$name</td>
    <td>$kls</td>
     <td align='center'>$tgl1</td>  
	 <td align='center'>$st</td>

 
    <td align='center'>
   
    <a href='index.php?page=absen&pages=absen_instruktur_update&update_id=$id' class='update' title='Edit'></a>
    <a href='index.php?page=absen&pages=absen_instruktur_delete&hapus_id=$id' class='delete' title='Hapus' onclick='return ins(\"".$name."\")'></a>
    </td>
  </tr>
";
$no++;
}
$qry_2 = mysql_query("select * from tb_absen_instruktur");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=absen&pages=absen_instruktur_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=absen&pages=absen_instruktur_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}

?>


</div>
<?php }?>