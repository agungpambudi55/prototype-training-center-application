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
if($update_id=$_REQUEST['update_id']) {
$update="select * from tb_absen_instruktur where id_absen_instruktur='$update_id'";
$cek_mysql=mysql_query($update) or die (mysql_error());
$baris=mysql_fetch_array($cek_mysql);
$id_absen=$baris['0'];
$nama=$baris['1'];
$kelas=$baris['2'];
$status=$baris['3'];
$query = mysql_query("select nama from tb_instruktur where id_instruktur = '$nama'");
$array = mysql_fetch_array($query);
$nama_instruktur = $array['nama'];
}
?>
<form method="post" action="index.php?page=absen_instruktur_update_proses">

<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>

<div id="form">

<input type="hidden" name="id_absen" value="<?php echo $id_absen; ?>"/>

<table width="570" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="207">Nama Instruktur</td>
    
    <td width="920"><input type="text" value="<?php echo $nama_instruktur ?>" name="nama" readonly="readonly" class="input" required="required"/></td>
  </tr>
   <tr>
    <td>Status Absen</td>    
    <td><input type="text" value="<?php echo $status ; ?>" readonly="readonly" class="input" required="required" /></td>
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
<tr>
<td colspan="2"><br /><input type="submit" value="Perbarui" class="button_a"/>
</td></tr>    
 </form>  
  </table>
</body>
</html>
</div>
</div>
<?php }?>