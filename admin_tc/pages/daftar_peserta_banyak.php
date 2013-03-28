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

<form name="get_jumlah" method="post" action="index.php?page=peserta&pages=daftar_peserta_banyak_proses&id=<?php echo $_GET['jenis'] ?> " enctype="multipart/form-data">
<select class="option" name="jenis" onChange="self.location='index.php?page=peserta&pages=daftar_peserta_banyak&jenis='+this.value"  required="required">
	<option value="">Pilih Jenis Peserta</option>
    <?php
	$nilai=mysql_query("select * from tb_jenis_peserta order by jenis_peserta asc");
    while($resul=mysql_fetch_array($nilai))
	{
  	$id_jenis=$resul['id_jenis_peserta'];
  	$jenis_peserta=$resul['jenis_peserta'];
	if($jenis_peserta==$_GET['jenis']){
		
		 echo"<option value='$jenis_peserta' selected>$jenis_peserta</option>";	
		 	}else{?>         
    <option value="<?php echo $jenis_peserta; ?>"><?php echo $jenis_peserta; ?></option>
    <?php
	}
	}
	?>
    </select>
Add <input style="height:30px; text-align:center" type="text" required="required" name="jumlah" size="5px"> <input class="submit" type="submit" name="kirim" value="Go" >
<br> <br> 
</form>
</div>
<?php }?>