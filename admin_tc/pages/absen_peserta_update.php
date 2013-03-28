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
<form method="post" action="index.php?page=absen_peserta_update_proses">
<!--content-->

<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<?php
$x=$_REQUEST['id_absen_peserta'];
@$nama_kelas_update=$_POST['nama_kelas_update'];
$abc=mysql_query("select * from tb_absen_peserta where id_absen_peserta=$x");?>
<input type="hidden" name="update_id" value="<?php echo $x;?>" />
<input type="hidden" name="update_nm_kls" value="<?php echo $nama_kelas_update;?>" />
<?php
$abc=mysql_fetch_array($abc);
$id_absen_peserta=$abc['0'];
$id_nama=$abc['2'];
$status=$abc['4'];	
$query_peserta = mysql_query("select nama from tb_daftar_peserta where no_peserta = '$id_nama'");
$array_peserta = mysql_fetch_array($query_peserta);
$nama_peserta = $array_peserta['nama'];

?>

<table width="600" border="0">
  <tr>
    <td width="20%">Nama Peserta</td>
    <td width="80%"><input type="text" value="<?php echo $nama_peserta ?>" readonly="readonly" class="input"/>	</td>
  </tr>
  <tr>
    <td>Status absen</td>
    <td><input type="text" value="<?php echo $status ?>" readonly="readonly"  class="input" /></td>
  </tr>
  <tr>
    <td height="40">Revisi</td>
    <td>
    <?php
if ($status=='Hadir')
{
echo "
<input type='radio' name='status[]' value='Hadir' class='radio' checked='checked'/>Hadir	
<input type='radio' name='status[]' value='Sakit' class='radio'/>Sakit
<input type='radio' name='status[]' value='Izin' class='radio' />Izin
<input type='radio' name='status[]' value='Tanpa Keterangan' class='radio' />Tanpa Keterangan
";
}
elseif ($status=='Sakit')
{
echo "
<input type='radio' name='status[]' value='Hadir' class='radio'/>Hadir	
<input type='radio' name='status[]' value='Sakit' class='radio' checked='checked'/>Sakit
<input type='radio' name='status[]' value='Izin' class='radio' />Izin
<input type='radio' name='status[]' value='Tanpa Keterangan' class='radio' />Tanpa Keterangan
";
}
elseif ($status=='Izin')
{
echo "
<input type='radio' name='status[]' value='Hadir' class='radio'/>Hadir	
<input type='radio' name='status[]' value='Sakit' class='radio'/>Sakit
<input type='radio' name='status[]' value='Izin' class='radio' checked='checked'/>Izin
<input type='radio' name='status[]' value='Tanpa Keterangan' class='radio' />Tanpa Keterangan
";
}
else
{
echo "
<input type='radio' name='status[]' value='Hadir' class='radio'/>Hadir	
<input type='radio' name='status[]' value='Sakit' class='radio'/>Sakit
<input type='radio' name='status[]' value='Izin' class='radio'/>Izin
<input type='radio' name='status[]' value='Tanpa Keterangan' class='radio' checked='checked' />Tanpa Keterangan
";
}

?>  
 </td>
  </tr>
  <tr><td colspan="2"><input type="submit" value="Perbarui" class="button_a" /></td></tr>
</table>

</div>
</form></div>
<?php }?>