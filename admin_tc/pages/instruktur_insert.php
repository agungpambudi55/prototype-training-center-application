
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
<div class="title_page">
Instruktur
</div>

<div id="content">
<p class="backk"><a href="index.php?page=instruktur_view" class="back"></a></p>
<div id="form">
<form method="post"  action="index.php?page=instruktur_insert_proses&image=<?php echo @$_GET['image'];?>" enctype="multipart/form-data" name="forminstruktur">
<ul>
	
    <li>

    <?php
	if(@$_GET['image']){
	?>
	<label style=" padding:80px 0px 0px 0px; border:0px solid gray">Foto</label>
    <img src="images/instruktur/<?php echo $_GET['image']; ?>.jpg" height="250px" width="220px" style="border:1px solid gray; margin:0px 0px 0px 0px"/>
    <br /><input type="button" onclick="location.href=('index.php?page=kamera_instruktur')" class="button_a" value="Edit Foto" style="margin:2px 0px 1px 132px"/>
	<?php }else{ ?>
	<label style=" padding:0px 0px 0px 0px; border:0px solid gray">Foto</label>
    <input type="button" onclick="location.href=('index.php?page=kamera_instruktur')" class="button_a" value="Kamera" />
    <input name="upload" type="file" required="required" size="7.5" style="height:37px"/>
    <?php } ?>
    </li>
    <li>
	<label>Nama</label>
    <input class="input" name="namainstruktur" type="text" maxlength="40" required/>
    <span class="notification">Masukkan Nama Instruktur</span>
    </li>
    <li>
    <label>NIP</label>
	 <input class="input"  name="nip" type="text" maxlength="40" required pattern="\-?\d+(\.\d{0,})?"/>
     <span class="notification">Masukkan NIP Instruktur</span>
    </li>
    <li>
	<label>Instansi</label>
    <input class="input" name="instansi" type="text" maxlength="40"  required	/>
    <span class="notification">Masukkan Instansi Instruktur</span>
    </li>
    <li>
	<label>Jabatan</label>
    <input class="input" name="jabatan"   maxlength="40" required/>
    <span class="notification">Masukkan Jabatan Instruktur</span>
    </li>
    <li>
	<label>Tempat Lahir</label>
    <input class="input" name="tempatlahir" type="text"  maxlength="30" required/>
    <span class="notification">Masukkan Tempat Lahir Instruktur</span>
    </li>
  
    <li>
	<label>Tanggal Lahir</label>
    <input class="input" type="text" id="Datepicker" name="tanggal" required="required">
    <span class="notification">Masukkan Tanggal Lahir Instruktur</span>
    </li>
    <li>
	<label>Jenis Kelamin</label>
    <input class="radio" type="radio" name="kelamin" value="laki-laki"  required="required"/>Laki - Laki<br />
    <input class="radio" type="radio" name="kelamin" value="perempuan" required="required"/>Perempuan
    </li>
    <li>
	<label>No. Telpon</label>
    <input class="input" name="notelepon" type="text" maxlength="20" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Masukkan No. Telpon Instruktur</span>
    </li>
    <li>
	<label>Status</label>
  <input class="radio" type="radio" name="status" value="aktif"/> Aktif<br>
   <input class="radio" type="radio" name="status" value="pasif"/>Pasif
    <span class="notification">Masukkan Status Instruktur</span>
    </li>
     <li>
	<label>Keterangan</label>
    <textarea class="textarea" name="ket" required="required"/></textarea>
    <span class="notification">Masukkan Keterangan Instruktur</span>
    </li>

    <li>
<br />
<input type="submit" class="button_a" name="forminstruktur" value="Simpan">
</li>
</ul>
</form>
</div>

</div>
<?php
}
?>