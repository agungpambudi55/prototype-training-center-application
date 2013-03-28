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
$('#Datepicker').datepick();
});
</script>
<div id="content">
<p class="backk"><a href="index.php?page=absen&pages=absen_instruktur_view" class="back"></a></p>
<div id="form">
<form method="post" action="index.php?page=absen_instruktur_insert_proses">

<ul >
	<input type="hidden" name="id_in" />
    <li>
	<label>Kelas Intruktur</label>
   <select name="kelas" onChange="self.location='index.php?page=absen&pages=absen_instruktur_insert&kelas='+this.value" class="option"  required>
    <option value=""></option>
    <?php
	$sql=mysql_query("select * from tb_kelas");
	while($tampil=mysql_fetch_array($sql)){
	if($tampil['id_kelas']==$_GET['kelas']){
	 echo"<option value='$tampil[id_kelas]' selected>$tampil[nama_kelas]</option>";	
	}else{
			?>         
    <option value="<?php echo $tampil['id_kelas']; ?>"><?php echo $tampil['nama_kelas']; ?></option>
    <?php
	}
	}
	?>
    </select>
    </li>
    <li>
	<label>Nama Instruktur</label>
	<select name="instruktur" required="required" class="option"
    onChange="self.location='index.php?page=absen&pages=absen_instruktur_insert&kelas=<?php echo $_GET['kelas']; ?>&instruktur='+this.value">
    <option value=""></option>    	
		<?php
		$query=mysql_query("select *from tb_kelas,tb_instruktur where tb_kelas.id_kelas=$_GET[kelas] and 			tb_kelas.id_instruktur=tb_instruktur.id_instruktur");
		while($row=mysql_fetch_array($query)){
		if($row['id_instruktur']==$_GET['instruktur']){
				echo "<option value='$row[id_instruktur]' selected>$row[nama]</option>";
				}else{
		?>
        <option value="<?php echo $row['id_instruktur']; ?>"><?php echo $row['nama']; ?></option>
        <?php
				}
			}
		?>
    </select>
</li>

  <?php
  if(@$_GET['instruktur']){
  $query_tgl=mysql_query("SELECT * FROM tb_kelas,tb_jadwal_training WHERE tb_kelas.id_jadwal_training = tb_jadwal_training.id_jadwal_training and tb_kelas.id_kelas='".$_GET['kelas']."' and tb_kelas.id_instruktur='".$_GET['instruktur']."'");
  $row_tgl=mysql_fetch_array($query_tgl);

    echo "<li><label>Tanggal Pelatihan</label><input type='text'  value='$row_tgl[tgl1] - $row_tgl[tgl2]' readonly required class='input'></li>";
	}else{}
  ?>
	
    <li>
    <label>Tanggal Absen</label>
  <input type="text" id="Datepicker" name="tanggal" class="input"  required>
   <span class="notification">Masukkan Tanggal Absensi</span>
   </li>
   <li> <label>Status Absen</label><p style="border:0px solid gray; margin:6px 0px 0px 132px; padding:0;">
  <input type='radio' name='status' value='Hadir' class='radio' checked='checked'/>Hadir	
	<input type='radio' name='status' value='Sakit' class='radio'/>Sakit
	<input type='radio' name='status' value='Izin' class='radio' />Izin
	<input type='radio' name='status' value='Tanpa Keterangan' class='radio' />Tanpa Keterangan</p></li>
<li></li><li></li><li></li><li></li>
<li><input type="submit" class="button_a" value="Simpan" name="formsimpan"></li></ul>
  
</form></div></div>
<?php }?>