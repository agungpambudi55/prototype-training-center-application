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
<script type="text/javascript">
function Check(){
         allCheckList = document.getElementById("formCheck").elements;
         jumlahCheckList = allCheckList.length;
         if(document.getElementById("tombolCheck").value == "All"){
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = true;
            }
            document.getElementById("tombolCheck").value = "Un All";
         }else{
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = false;
         }
            document.getElementById("tombolCheck").value = "All";
         }
}
</script>
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() 
{
$('#Datepicker').datepick();
});
</script>
<script type="text/javascript">
function reload(form)
{
var val=form.kelas.options[form.kelas.options.selectedIndex].value;
self.location='index.php?page=absen&pages=absen_peserta_insert&kelas=' + val ;
}
</script>

<div id="content">
<p class="backk"><a href="index.php?page=absen&pages=absen_peserta_view" class="back"></a></p>
<div id="form">
<form id="formCheck" method="post" action="index.php?page=absen_peserta_insert_proses">

<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="15%">Nama Kelas</td>
    <td width="85%">
    
    
<?php
@$kelas=$_GET['kelas'];
$quer2=mysql_query("SELECT DISTINCT nama_kelas, id_kelas FROM tb_kelas order by nama_kelas"); 
if(isset($kelas) and strlen($kelas) > 0)
{
	$quer=mysql_query("	SELECT DISTINCT tb_daftar_peserta.nama, tb_daftar_peserta.id_jenis_peserta,tb_daftar_peserta.no_peserta, tb_daftar_peserta.email, tb_daftar_peserta.nrp FROM tb_daftar_peserta, tb_kelas, tb_peserta_kelas where 
	tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta and 
	tb_peserta_kelas.id_kelas=tb_kelas.id_kelas and 
	tb_kelas.id_kelas='$kelas' order by nama asc
	");
	 
}
else
{
	$quer=mysql_query("
	SELECT DISTINCT tb_daftar_peserta.nama, tb_daftar_peserta.no_peserta FROM tb_daftar_peserta, tb_kelas, tb_peserta_kelas where 
	tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta and 
	tb_peserta_kelas.id_kelas=tb_kelas.id_kelas and 
	tb_kelas.id_kelas='' order by nama asc
	"); 
} 
echo "<select name='kelas' onchange=\"reload(this.form)\" class='option' style='width:473px'>
	  <option value=''>Pilih Kelas</option>";
	while($noticia2 = mysql_fetch_array($quer2)) 
	{ 
		if($noticia2['id_kelas']==@$kelas)
		{echo "<option selected value='$noticia2[id_kelas]'>$noticia2[nama_kelas]</option>"."<BR>";}
		else
		{echo  "<option value='$noticia2[id_kelas]'>$noticia2[nama_kelas]</option>";}
	}
echo "</select><br>";
?>
    
    
    </td>
  </tr>

  
  <?php if($kelas=='')
  {}
  else
  {
	   $sql=mysql_query("SELECT * FROM `tb_kelas`, tb_jadwal_training where tb_kelas.id_jadwal_training=tb_jadwal_training.id_jadwal_training and tb_kelas.id_kelas=$kelas");
	$tgl=mysql_fetch_array($sql);
	$tgl1=$tgl['tgl1'];
	$tgl2=$tgl['tgl2'];
	?>
		<tr>
  	<td>Tanggal Pelatihan</td>
  
    <td><input type="text" value="<?php echo $tgl1; ?>" style="text-align:center" readonly="readonly" class="input" />&nbsp;s/d&nbsp;<input type="text" value="<?php echo $tgl2; ?>" readonly="readonly" class="input" style="text-align:center" /> 
	</td>
  </tr>
	  
      <tr>
  	<td>Tanggal</td>

    <td>    <input type="text" id="Datepicker" name="tanggal" class="input" required="required"></td>
  </tr>
      <?php
	  echo "
    <tr>
    <td>Nama Instruktur</td>
<td>";
	    $qry_nm_instruktur=mysql_query("select tb_instruktur.id_instruktur, tb_instruktur.nama from tb_instruktur, tb_kelas where tb_instruktur.id_instruktur=tb_kelas.id_instruktur and id_kelas='$kelas'");
	$nm_instruktur=mysql_fetch_array($qry_nm_instruktur);
	echo "<input type='hidden' name='instruktur' value='$nm_instruktur[0]'><input style='margin:0' class='input' type='text' readonly='readonly' value='$nm_instruktur[1]' />
    </td>
  </tr>";

  }?>
 <tr>
    <td colspan="2">
    
    <?php 
if ($kelas=='')
{}
else
{
?>

<?php	
echo "

<table border='0' class='table' width='100%' cellpadding='0' cellspacing='0'  font-size:15px; font-family:'Times New Roman', Times, serif;>
<thead>
<tr>
	<th width='2%' align='center' style='vertical-align:middle'>No</th>
    <th width='50%' align='center' style='vertical-align:middle'>Peserta</th>
	<th width='28%' align='center' style='vertical-align:middle'>Status</th>
	<th width='7%' align='center'><input type='button' id='tombolCheck' onClick='Check();' value='All'></th>
  </tr>
  </thead>
<form>";
$n=1;
while($noticia=mysql_fetch_array($quer))
{	
$jenis=$noticia['id_jenis_peserta'];
	$select=mysql_query("select *from tb_jenis_peserta where id_jenis_peserta='$jenis'");
	$view=mysql_fetch_array($select);
	$je=$view['jenis_peserta'];

	echo"
	<tr>
		<td style='vertical-align:middle' align='center'>$n</td>
		<td style='vertical-align:middle' style='padding-left:5px'>
		 $noticia[nama]
		</td>
		<td style='vertical-align:middle' align='center'>";?>
        <input type="hidden" name="nopeserta[]" value="<?php echo $noticia['no_peserta']; ?>"/>
        
		<input type='radio' name='status[<?php echo $noticia['no_peserta']; ?>]' value='Sakit' class="radio"/>Sakit
		<input type='radio' name='status[<?php echo $noticia['no_peserta']; ?>]' value='Izin' class="radio" />Izin
         <input type='radio' name='status[<?php echo $noticia['no_peserta']; ?>]' value='Tanpa Keterangan' class="radio" />Tanpa keterangan	
        <td style='vertical-align:middle' align='center'>
		<input type='radio'  name='status[<?php echo $noticia['no_peserta']; ?>]' value='Hadir' class="radio"/>Hadir
        </td>
		<?php echo "
		</td>
	</tr>

		";
$n++;
}
echo "</table>";
}
?>
<br /><br />
 <button class="button_a" ><img src='images/save.png' width='20' height='20' style="icon:inherit; margin-bottom:3px;vertical-align:middle;" /><font style="padding:4.5px 1px 9px 7px; vertical-align:middle;">Simpan</font></button>

</div>
</div>
</div>
</form>
<?php }?>