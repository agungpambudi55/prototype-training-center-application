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

<link rel="stylesheet" type="text/css" href="style/jquery.ptTimeSelect2.css" />
<link rel="stylesheet" type="text/css" href="style/jquery.ptTimeSelect.css" />
<link rel="stylesheet" href="style/jquery.datepick.css" type="text/css" />
<script type="text/javascript">
$(function() 
{
$('#Datepicker1').datepick();
$('#Datepicker2').datepick();
});
</script>
<script type="text/javascript" src="js/jquery.ptTimeSelect.js"></script>
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
        $('#time1').ptTimeSelect({onBeforeShow: function(i){
			$('#time1-data').append('onBeforeShow(event) Input field: [' + $(i).attr('name') + "], value: [" + $(i).val() +"]<br>");},
            onClose: function(i) {$('#time1-data').append('onClose(event)Time selected: ' +  $(i).val() +"<br>");}}); 
        $('#time2').ptTimeSelect({onBeforeShow: function(i){
			$('#time2-data').append('onBeforeShow(event) Input field: [' + $(i).attr('name') + "], value: [" + $(i).val() +"]<br>");},
            onClose: function(i) {$('#time2-data').append('onClose(event)Time selected: ' +  $(i).val() +"<br>");}}); 
        }); 
</script>
<?php
$edit_id=$_REQUEST['edit_id'];
$rumus="select * from tb_jadwal_training where id_jadwal_training='$edit_id'";
$cek=mysql_query($rumus) or die (mysql_error());
$row=mysql_fetch_array($cek);
	$id_jadwal_training=$row['0'];
	$pelatihan=$row['1'];
	$id_judul=$row['2'];
	$tanggal1=$row['3'];
	$tanggal2=$row['4'];
	$jam_mulai=$row['5'];
	$jam_selesai=$row['6'];
	$ket=$row['7'];
?>
<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<div id="form">
<form action="index.php?page=pel&pages=jadwal_training_update_proses&idp=<?php echo $_REQUEST['idp'] ?>" method="post" name="formedit">
<input type="hidden" name="id_jadwal_training" value="<?php echo $id_jadwal_training; ?>"  />
<ul>
   <li>
	<label>Judul Pelatihan</label>
	<?php
    $result=mysql_query("select * from tb_jadwal_training");
    while($row = mysql_fetch_array($result))
    $query = mysql_query("select judul_training from tb_judul where id_judul = '$id_judul'");
    $judul_arr=mysql_fetch_array($query);
    @$id=$judul_arr['id_judul'];
    $judul=$judul_arr['judul_training'];
    ?>
    <input type="text" name="jugggh" value="<?php echo $judul; ?>" class="input" readonly required="required"/>
    <input type="hidden" name="ju" value="<?php echo $id_judul; ?>"/> 
    <span class="notification">Masukkan Judul Pelatihan</span>
    </li>
    <li>
    <label>Durasi Jam</label>
	  <?php
      $result=mysql_query("select * from tb_jadwal_training");
      while($row = mysql_fetch_array($result))
      $query1 = mysql_query("select durasi from tb_judul where id_judul = '$id_judul'");
      $c=mysql_fetch_array($query1);
      @$id=$c['id_judul'];
      $durasi=$c['durasi'];
      ?>
      <input type="text" name="jugggh" value="<?php echo $durasi; ?>" class="input" readonly required/>&nbsp;Jam
      <input type="hidden" name="du" value="<?php echo $id_judul; ?>"/>
    </li>
    <li>
    <label>Jumlah Hari</label>
    <?php
   $result=mysql_query("select * from tb_jadwal_training");
   while($row = mysql_fetch_array($result))
   	$query2 = mysql_query("select jmlh_hari from tb_judul where id_judul = '$id_judul'");
	$d=mysql_fetch_array($query2);
	@$id=$d['id_judul'];
	$jmlh=$d['jmlh_hari'];
   ?>
  <input type="text" name="jugggh" value="<?php echo $jmlh; ?>" class="input" readonly required/>&nbsp;Hari
  <input type="hidden" name="ha" value="<?php echo $id_judul; ?>"/>
    </li>
    <li>
	<label>Tanggal Pelatihan</label> 
    <input class="input" type="text" id="Datepicker1" value="<?php echo "$tanggal1";?>" name="tanggal1" required>
    <span class="notification">Masukkan Tanggal Mulai Pelatihan</span> &nbsp; Sd &nbsp;
    <input class="input" type="text" id="Datepicker2" value="<?php echo "$tanggal2";?>" name="tanggal2" required>
    <span class="notification">Masukkan Tanggal Selesai Pelatihan</span>
    </li>

  	<li>
	<label>Jam Pelatihan</label> 
    <input class="input" type="text" id="time1" value="<?php echo $jam_mulai; ?>" name="jam_mulai" required>
    <span class="notification">Masukkan Jam Mulai Pelatihan</span> &nbsp; Sd &nbsp;
    <input class="input" type="text" id="time2" value="<?php echo $jam_selesai; ?>" name="jam_selesai" required>
    <span class="notification">Masukkan Jam Selesai Pelatihan</span>
    </li>

    <li>
	<label>Sertifikat</label>
    <input class="input" value="<?php echo $ket;?>" name="ket" type="text" maxlength="20" required/>
    <span class="notification">Masukkan Sertifikat</span>
    </li>
   

    <p>
	<button type="submit" class="submit" name="formedit">Perbarui</button>
    
    </p>
</ul>
</form>
</div>

</div>
<?php
}
?>