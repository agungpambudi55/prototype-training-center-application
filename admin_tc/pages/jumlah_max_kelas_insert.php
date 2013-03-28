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
<div class="title_page">
Kelas Maksimal
</div>
<div id="content">
<table border="0" width="350px">
<form method="post" action="index.php?page=jumlah_max_kelas_proses_insert" name="jmlkelas">
<tr>
<td width="40%">Jumlah Kelas</td>
<td width="60%"><input type="text" name="jumlahkelas" class="input"  required pattern="\-?\d+(\.\d{0,})?"/>    <span class="notification">Masukkan Jumlah Maksimal Kelas</span></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" name="jmlkelas" value="Simpan" class="button_a" style="margin:10px 0px 10px -2px"/>
<input type="reset" value="Bersihkan" class="button_a" style="margin:10px 0px 10px 5px">
</td>
</tr>
</form>
</table>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
<tr>
	<th width="5%">No</th>
    <th width="91%">Jumlah Kelas</th>
    <th width="4%">Aksi</th>
</tr>
<?php
$query	=mysql_query("select * from tb_jumlah_peserta  ORDER BY jumlah_max ASC");
$no=1;
while($row=mysql_fetch_array($query)){
?>
<tr>
	<td align="center"><?php echo $no; ?></td>
    <td><?php echo $row['jumlah_max']; ?></td>
    <td align="center"><a href="index.php?page=jumlah_max_kelas_proses_insert&hapusjumlah=<?php echo $row['id_jumlah_max']; ?>" class="delete"></a></tr>
</tr>
<?php
$no++;
}
?>
</table>
</td>
<?php }?>