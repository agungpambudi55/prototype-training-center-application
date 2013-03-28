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
<style>
#det ul{ margin:0; padding:0; list-style:none; border:0px solid gray; height:570px; overflow:hidden}
#det ul li{ border:0px solid gray; height:570px; float:left;}
#det ul li ul{ border:0px solid gray;}
#det ul li ul li{ border:0px solid gray; float:none; height:15px; padding:7px 0px 20px 40px; font-size:14px; font-weight:bold}
#det ul li ul li p{ border:0px solid gray; margin:-17px 0px 10px 120px; font-weight:normal}
.photo{ border:1px solid #999; width:218px; height:229px; margin:0; padding:8px 0px 0px 0px; font-size:14px; color:#FFF; background:#63B0FE}
</style>
<div id="content">

<?php
if(isset($_REQUEST['editpeserta'])){
	$sql3=mysql_query("select *from tb_daftar_peserta where no_peserta='".$_REQUEST['editpeserta']."'");
	$baris=mysql_fetch_array($sql3);
    }
?>

<p style="margin:0; padding:10px 0px; border:0px solid gray"><a href="javascript:self.history.back();" class="back"></a></p>
<div id="form">
<form method="post" name="editformdaftar" enctype="multipart/form-data" action="index.php?page=peserta&pages=daftar_peserta_proses_daftar">
<input type="hidden" name="idpeserta" value="<?php echo $baris['no_peserta']; ?>"/>
<div id="det">
<ul>
	<li style=" width:220px">
    <p class="photo" align="center">
    <b>Photo Profil</b><br>
<?php
if(empty($baris['gambar'])){
echo "<img src='style/images/no_image.png' style='height:200px; width:218px; border-top:1px solid #CCC;border-bottom:1px solid #CCC; margin:8px 0px 0px 0px' />";
}else{
echo "<img src='images/peserta/".$baris['gambar']."' style='height:200px; width:218px; border-top:1px solid #CCC;border-bottom:1px solid #CCC; margin:8px 0px 0px 0px' />";
} 
?>
</p>

	<input type="file" name="upload" style="margin-top:10px; margin-bottom:10px;"/><br>
	<input type="submit" value="Perbarui" class="button_a" name="editformdaftar"/>&nbsp;&nbsp;
     <input type="button" onclick="location.href=('index.php?page=peserta&pages=kamera_update&editpeserta=<?php echo $_REQUEST['editpeserta'] ?>');" class="button_a" value="Kamera" />
</li>
	<li style=" width:780px;">
    <ul>             	
        <li>Nama
        <p>
        <input type="text" class="input" name="nama" value="<?php echo $baris['nama']; ?>" required/><span class="notification">Masukkan Nama Peserta</span>
        </p>
        </li>                  
        <li>Jenis Peserta
        <p>
        <select name="jenis" onChange="" class="option" required="required">
        <option value="" id="x_kos"></option>
        <?php
        $as=$baris['id_jenis_peserta'];
        $nilai=mysql_query("select *from tb_jenis_peserta");
        while($resul=mysql_fetch_array($nilai)){
        $id_jenis=$resul['id_jenis_peserta'];
        $jenis_peserta=$resul['jenis_peserta'];
        if($as==$id_jenis)
		{if($jenis_peserta=='Mahasiswa Non Pens')
		{echo "<option value='$id_jenis' id='x_mnp' selected>$jenis_peserta</option>";}
		elseif($jenis_peserta=='Mahasiswa Pens')
		{echo "<option value='$id_jenis' id='x_mp' selected>$jenis_peserta</option>";}
		else
		{echo "<option value='$id_jenis' id='x_u' selected>$jenis_peserta</option>";}	
		}
		else
		{if($jenis_peserta=='Mahasiswa Non Pens')
		{echo "<option value='$id_jenis' id='x_mnp'>$jenis_peserta</option>";}
		elseif($jenis_peserta=='Mahasiswa Pens')
		{echo "<option value='$id_jenis' id='x_mp'>$jenis_peserta</option>";}
		else
		{echo "<option value='$id_jenis' id='x_u' >$jenis_peserta</option>";}	
		}
		}
        ?>
        </select>
        <span class="notification">Masukkan Jenis Peserta</span></p>
        </li>
        <li id="nrp">
        NRP
        <p>
        <input class="input" name="no_induk" type="text" maxlength="40" value="<?php echo $baris['nrp']; ?>" />
        <span class="notification">Masukkan NRP Peserta</span></p>
        </li>
        <li>
        Email
        <p>
        <input class="input" name="email" type="email" maxlength="40" required value="<?php echo $baris['email']; ?>" />
        <span class="notification">Masukkan email Peserta</span></p>
        </li>
        <li>
        Instansi Peserta
        <p> 
        <input type="text" name="instansi" class="input" value="<?php echo $baris['instansi_peserta']; ?>" required/><span class="notification">Masukkan Instansi Peserta</span>
        </p>
        </li>
        <li>
        Jabatan
        <p>
        <input type="text" name="jabatan" class="input" value="<?php echo $baris['jabatan']; ?>" required/><span class="notification">Masukkan Jabatan Peserta</span></p>
        </li>
        <li>
        Tempat Lahir<p> 
        <input type="text" class="input" name="tempatlahir" value="<?php echo $baris['tempat_lahir']; ?>" required/><span class="notification">Masukkan Tempat Peserta</span></p>
        </li>
        <li>
        Tanggal Lahir<p> 
        <input type="text" class="input" id="Datepicker" value="<?php echo $baris['tgl_lahir']?>" name="tanggal" required/><span class="notification">Masukkan Tangaal Lahir Peserta</span></p>
        </li>
        <li>
        Kelamin<p>
        <?php if($baris['gender']=='laki-laki'){ ?>
        <input type="radio" class="radio" name="kelamin" value="laki-laki" checked="checked" required/>Laki-Laki<br />
        <input class="radio" type="radio" name="kelamin" value="perempuan" required/>Perempuan
        
        <?php
        }else{
        ?>
        <input type="radio" class="radio" name="kelamin" value="laki-laki" required/>Laki-Laki<br/>
        <input type="radio" name="kelamin" class="radio" value="perempuan" checked="checked" required/>Perempuan
        <?php } ?></p>
        </li>
        <li>
        No Telpon<p>
        <input type="text" class="input" name="telepon" value="<?php echo $baris['tlp']; ?>" required pattern="\-?\d+(\.\d{0,})?"/><span class="notification">Masukkan No. Telpon Peserta</span></p>
        </li>
 </ul>
 </div>
</form>

</div>
<script type="text/javascript">
$("#x_mp").click(function(){$("#nrp").show();})
$("#x_mnp").click(function(){$("#nrp").show();})
$("#x_u").click(function(){$("#nrp").hide();})
$("#x_kos").click(function(){$("#nrp").hide();})
</script>
<?php
$query_jenis_p=mysql_query("select *from tb_jenis_peserta where id_jenis_peserta='".$baris['id_jenis_peserta']."'");
$row_jenis=mysql_fetch_array($query_jenis_p);
if($row_jenis['jenis_peserta']=='umum' or $row_jenis['jenis_peserta'] =='Umum'){
?>
<script>
$(document).ready(function()
{
$("#nrp").hide();
});
</script>
<?php } ?>
<?php
}
?>