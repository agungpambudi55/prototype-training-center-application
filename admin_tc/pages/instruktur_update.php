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
<?php
if(isset($_REQUEST['editinstruktur'])){
	$sql3=mysql_query("select *from tb_instruktur where id_instruktur='".$_REQUEST['editinstruktur']."'");
	$baris=mysql_fetch_array($sql3);
?>
<style>
#det ul{ margin:0; padding:0; list-style:none; border:0px solid gray; height:500px; overflow:hidden}
#det ul li{ border:0px solid gray; height:250px; float:left;}
#det ul li ul{ border:0px solid gray;}
#det ul li ul li{ border:0px solid gray; float:none; height:15px; padding:7px 0px 20px 40px; font-size:14px; font-weight:bold}
#det ul li ul li p{ border:0px solid gray; margin:-17px 0px 10px 120px; font-weight:normal}
.photo{ border:1px solid #999; width:200px; height:229px; margin:0; padding:8px 0px 0px 0px; font-size:14px; color:#FFF; background:#63B0FE}
</style>
<div class="title_page">
Instruktur
</div>

<div id="content">
<p style="margin:0; padding:10px 0px; border:0px solid gray"><a href="javascript:self.history.back();" class="back"></a></p>
<div id="det">
<ul>
	<li style=" width:205px">
    <p class="photo" align="center">
    <b>Photo Profil</b><br>
<?php
if(empty($baris['foto'])){
echo "<img src='style/images/no_image.png' style='height:200px; width:200px; border-top:1px solid #CCC;border-bottom:1px solid #CCC; margin:8px 0px 0px 0px' />";
}else{
echo "<img src='images/instruktur/".$baris['foto']."' style='height:200px; width:200px; border-top:1px solid #CCC;border-bottom:1px solid #CCC; margin:8px 0px 0px 0px' />";
} 
?>
</p>
<form method="post"  action="index.php?page=instruktur_proses" enctype="multipart/form-data" name="editforminstruktur">
<input type="file" name="upload" style="margin-top:10px; margin-bottom:10px;"/><br>
	<input type="submit" value="Perbarui" class="submit" style="margin-top:10px;" name="editforminstruktur"/><input type="button" onclick="location.href=('index.php?page=kamera_update_instruktur&editinstruktur=<?php echo $_GET['editinstruktur']; ?>')" class="submit" value="Kamera" />
</li>
 <input type="hidden" name="idinstruktur" value="<?php echo $baris['id_instruktur'];?>" />
	<li style=" width:780px;">
<ul>
    <li>
	<label>Nama</label>
    <p>
    <input class="input" name="namainstruktur" type="text" maxlength="40" value="<?php echo $baris['nama']; ?>" required/>
    <span class="notification">Masukkan Nama Instruktur</span>
    </p>
    </li>
    <li>
    <label>NIP</label>
	<p>
    <input class="input"  value="<?php echo $baris['NIP']; ?>"  name="nip" type="text" maxlength="40" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Masukkan NIP Instruktur</span>
    </p>
    </li>
    <li>
    <label>Instansi</label>
	<p>
    <input class="input" name="instansi"  value="<?php echo $baris['instansi']; ?> " type="text" maxlength="40"  required	/>
    <span class="notification">Masukkan Instansi Instruktur</span>
    </p>
    </li>
    <li>
	<label>Jabatan</label>
    <p>
    <input class="input" name="jabatan" value="<?php echo $baris['jabatan']; ?>"   maxlength="40" required/>
    <span class="notification">Masukkan Jabatan Instruktur</span>
    </p>
    </li>
    <li>
	<label>Tempat Lahir</label>
    <p>
    <input class="input" name="tempatlahir" type="text"  value="<?php echo $baris['tempat_lahir']; ?>"  maxlength="30" required/>
    <span class="notification">Masukkan Tempat Lahir Instruktur</span>
    </p>
    </li>
    <li>
	<label>Tanggal Lahir</label>
    <p>
    <input class="input" type="text"  id="Datepicker" value="<?php echo $baris['tgl_lahir']?>" name="tanggal" required>
    <span class="notification">Masukkan Tanggal Lahir Instruktur</span>
    </p>
    </li>
    <li>
	<label>Jenis Kelamin</label>
    <p>
  <?php if($baris['gender']=='laki-laki'){ ?>
	<input type="radio" name="kelamin" value="laki-laki" checked="checked"/> 
      Laki-Laki 
        <input type="radio" name="kelamin" value="perempuan"/>
    Perempuan
	<?php }else{ ?>
	<input type="radio" name="kelamin" value="laki-laki"/> Laki-Laki 
     <input type="radio" name="kelamin" value="perempuan"  checked="checked"/> Perempuan
	<?php }?>	
    </p>
    </li>
    <li>
	<label>No. Telpon</label>
    <p>
    <input class="input" name="notelepon" type="text" maxlength="20" value="<?php echo $baris['tlp']; ?>" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Masukkan No. Telpon Instruktur</span>
    </p>
    </li>
    <li>
	<label>Status</label>
    <p>
	<?php if($baris['status']=='aktif'){
	?>
	<input type="radio" name="status" value="aktif" checked="checked"/> Aktif <input type="radio" name="status" value="pasif"/>Pasif
	<?php
	}else{
	?>
	<input type="radio" name="status" value="aktif"/> Aktif <input type="radio" name="status" value="pasif" checked="checked"/>Pasif
	<?php }
	?>	    <span class="notification">Masukkan Status Instruktur</span>
    </p>
    </li>
    <li>
	<label>Keterangan</label>
    <p>
    <textarea class="textarea" name="ket" required/><?php echo $baris['ket']; ?></textarea>
    <span class="notification">Masukkan Keterangan Instruktur</span>
    </p>
    </li>
   </li>
</ul>
</ul>
<?php
}

?></form>
</div>
<?php
}
?>