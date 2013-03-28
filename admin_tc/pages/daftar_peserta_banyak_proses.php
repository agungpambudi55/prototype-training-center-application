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
<link rel="stylesheet" href="style/jquery.datepick.css" type="text/css" />
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() 
{
$('.Datepicker').datepick();
});
</script>
<?php
$idjenis=$_REQUEST['id'];
$id_jumlah_orang=$_REQUEST['jumlah'];
if($id_jumlah_orang=='1'){
	echo "<script>javascript:self.history.back()</script>";}else{
if ($idjenis != '') {
	
 ?>
 <div id="content">					
<div style="margin:0px;">
<form name="get_jumlah" method="post" action="index.php?page=peserta&amp;pages=daftar_peserta_banyak_proses&amp;id=<?php echo $_GET['jenis'] ?> ">
<select class="option" name="jenis" onChange="self.location='index.php?page=peserta&pages=daftar_peserta_banyak&jenis='+this.value"  required="required">
<option value="">Pilih Jenis Peserta</option>
    <?php
	$nilai=mysql_query("select * from tb_jenis_peserta order by jenis_peserta asc");
    while($resul=mysql_fetch_array($nilai)){
	
  	$id_jenis=$resul['id_jenis_peserta'];
  	$jenis_peserta=$resul['jenis_peserta'];
	if ($jenis_peserta==$idjenis) {
		echo  "<option value='$jenis_peserta' selected='selected'>$jenis_peserta</option>";
	}else {
	?>
    <option value="<?php echo $jenis_peserta; ?>"><?php echo $jenis_peserta; ?></option>
 <?php } 
	}?>
    </select>
Add <input style="height:30px; text-align:center" type="text" value="<?php echo $id_jumlah_orang;?>"  name="jumlah" size="5px"> <input class="submit" type="submit" name="kirim" value="Go" >
<br> <br> 
</form>

</div>
<form action="index.php?page=peserta&amp;pages=daftar_peserta_banyak_proses1" method="post" name="form_banyak">
<?php 

if (isset($_POST['jumlah'])) {
$cek_jenis=mysql_query("select * from tb_jenis_peserta where jenis_peserta='".$_REQUEST['id']."'");
$view_cek=mysql_fetch_array($cek_jenis);
	
echo "
<input type='hidden' name='jumlah' value='".$_POST['jumlah']."'>

Instansi : <input type='text' name='instansi' size='35px' class='input' required><span class='notification'>Masukkan Instansi Peserta</span><br><br>
				<table border='1' class='table'>
				<th>Nama</th>";
				
				if ($_REQUEST['id']=='Mahasiswa Pens' || $_REQUEST['id']=='Mahasiswa Non Pens') {
					echo "<th>NRP</th>";
				}
				else {
				}
					echo "
	
					<th>Email</th>
					<th>Jabatan</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Telepon</th>";
					
				}
				for ($i = 0; $i < $id_jumlah_orang; $i++)
				{
					
				echo "<tr><td align='center'><input type='text' name='nama[$i]' required size='15px' required='required' /></td>";
				if ($_REQUEST['id']=='Mahasiswa Pens' || $_REQUEST['id']=='Mahasiswa Non Pens') {
					echo "<td align='center'><input type='text' name='nrp[$i]' size='15px' required='required' /></td>";
				}else {
				}
					
					echo "
					
					<input type='hidden' name='jenispeserta[$i]' value=$view_cek[id_jenis_peserta]>
					<td align='center'><input type='email' name='email[$i]' required='required' size='15px'/></td>
					<td align='center'><input type='text' name='jabatan[$i]' required='required' size='15px'/></td>
					
					<td align='center'><input type='text' name='tempat_lahir[$i]' required='required' size='15px'/></td>
					<td align='center'><input type='text' name='tgl_lahir[$i]' class='Datepicker' required='required'  size='15px'/></td>
					<td align='center'><input type='radio' name='jenis[$i]'  required='required' value='laki-laki'/>Laki-laki 
					<input type='radio' name='jenis[$i]' value='perempuan'/>Perempuan</td>
					<td align='center'><input type='text' name='telepon[$i]' required pattern='\-?\d+(\.\d{0,})?' size='15px'/></td>
					
					<tr>
					";
	}
}
else {
	echo "<script>location.href =(\"index.php?page=peserta&pages=daftar_peserta_banyak\");</script>";
}?>
<?php echo "<tr><td colspan='8'><input class='submit' type='submit' name='form_banyak' value='Next' ></td></tr>";
?>
</form></div></table>
<?php }
}?>