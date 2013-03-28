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

<div id="form">
<form method="post" name="formdaftar" enctype="multipart/form-data" action="index.php?page=peserta&pages=daftar_peserta_proses_insert&image=<?php echo @$_GET['image'];?>">
<ul>
	<li><p style="background:url(style/images/progress1.png) no-repeat; padding:25px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 120px; font-size:20px; font-weight:bold; color:#333333">Data Peserta</p></li>
    <li>
    <?php
	if(@$_GET['image']){
	?>
	<label style=" padding:80px 0px 0px 0px; border:0px solid gray">Foto</label>    
    <img src="images/peserta/<?php echo $_GET['image'].".jpg"; ?>" height="250px" width="220px" style="border:1px solid gray; margin:0px 0px 0px 0px"/>
    <br />
    <input type="button" onclick="location.href=('index.php?page=kamera')" class="button_a" value="Edit Foto" style="margin:2px 0px 1px 132px"/>
    <?php
	}else{
	?>
	<label style=" padding:0px 0px 0px 0px; border:0px solid gray">Foto</label>
    <input type="button" onclick="location.href=('index.php?page=kamera')" class="button_a" value="Kamera" />
    <input name="upload" type="file" size="7.5" style="height:37px"/>
    <?php } ?>
    </li>    
    <li>
	<label>Nama</label>
    <input class="input" name="nama" type="text" maxlength="40" required/>
    <span class="notification">Masukkan Nama Peserta</span>
    </li>
    <li>
	<label>Jenis Peserta</label>
    <select class="option" name="jenis" required="required">
      <option value="" id="x_kos"></option>
    <?php
	$nilai=mysql_query("select * from tb_jenis_peserta order by jenis_peserta asc");
    while($resul=mysql_fetch_array($nilai))
	{
  	$id_jenis=$resul['id_jenis_peserta'];
  	$jenis_peserta=$resul['jenis_peserta'];
	if($jenis_peserta=='Mahasiswa Non Pens')
	{echo "<option value='$id_jenis' id='x_mnp'>$jenis_peserta</option>";}
	elseif($jenis_peserta=='Mahasiswa Pens')
	{echo "<option value='$id_jenis' id='x_mp'>$jenis_peserta</option>";}
	else
	{echo "<option value='$id_jenis' id='x_u' >$jenis_peserta</option>";}
	}
	?>
	</select>    
    <span class="notification">Masukkan Jenis Peserta</span>
    </li>
    <li id="nrp">
	<label>NRP</label>
    <input class="input" name="no_induk" type="text" maxlength="40"/>
    <span class="notification">Masukkan NRP Peserta</span>
    </li>
    <li>
	<label>Email</label>
    <input class="input" name="email" type="email"  maxlength="40" required/>
    <span class="notification">Masukkan Email Peserta</span>
    </li>
    <li>
	<label>Instansi</label>
    <input class="input" name="instansi" type="text"  maxlength="30" required/>
    <span class="notification">Masukkan Instansi Peserta</span>
    </li>
    <li>
	<label>Jabatan</label>
    <input class="input" name="jabatan" type="text"  maxlength="30" required/>
    <span class="notification">Masukkan Instansi Peserta</span>
    </li>
    <li>
	<label>Tempat Lahir</label>
    <input class="input" name="tempatlahir" type="text" maxlength="20" required/>
    <span class="notification">Masukkan Tempat Lahir Peserta</span>
    </li>
    <li>
	<label>Tanggal Lahir</label>
    <input class="input" type="text" id="Datepicker" name="tanggal" required="required">
    <span class="notification">Masukkan Tanggal Lahir Peserta</span>
    </li>
    <li>
	<label>Kelamin</label>
    <input class="radio" type="radio" name="kelamin" value="laki-laki"  required="required"/>Laki - Laki<br />
    <input class="radio" type="radio" name="kelamin" value="perempuan" required="required"/>Perempuan
    </li>
    <li>
	<label>No. Telpon</label>
    <input class="input" name="telepon" type="text" maxlength="20" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Masukkan No. Telpon Peserta</span>
    </li>
    <li>
	<a href="index.php?page=peserta&pages=daftar_peserta_view_peserta" class="button_a" style="padding:8px 12px">Kembali</a>&nbsp;&nbsp;<button type="submit" class="submit" name="formdaftar">Lanjut</button>
    </li>
</ul>
</form>
</div>

</div>
<script type="text/javascript">
$("#nrp").hide();
$("#x_mp").click(function(){$("#nrp").show();})
$("#x_mnp").click(function(){$("#nrp").show();})
$("#x_kos").click(function(){$("#nrp").hide();})
$("#x_u").click(function(){$("#nrp").hide();})
</script>
<?php }?>