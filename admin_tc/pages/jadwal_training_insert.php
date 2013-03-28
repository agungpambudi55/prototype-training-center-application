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

<div id="content">
<p class="backk"><a href="index.php?page=pel&pages=jadwal_view" class="back"></a></p>
<div id="form">
<form action="index.php?page=pel&pages=jadwal_training_insert_proses" method="post" name="formjadwal">
<ul>
    <li>
	<label>Pelatihan</label>
    <select name="pelatihan" onChange="self.location='index.php?page=pel&pages=jadwal_training_insert&pelatihan='+this.value" class="option" required>
    <option value=""></option>
    <?php 
    $query_pelatihan=mysql_query("select *from tb_detail_pelatihan");
    while($row_pelatihan=mysql_fetch_array($query_pelatihan)){
    if($row_pelatihan['id_details_pelatihan']==$_GET['pelatihan']){
    echo "<option value='$row_pelatihan[id_details_pelatihan]' selected>$row_pelatihan[pelatihan]</option>";
    }else{
    ?>
    
    <option value="<?php echo $row_pelatihan['id_details_pelatihan']; ?>"><?php echo $row_pelatihan['pelatihan']; ?></option>
    <?php
    }
    }
    ?>
    </select>
    <span class="notification">Masukkan Pelatihan</span>
    </li>
    <li>
	<label>Judul Pelatihan</label>
    <select name="judul" onChange="self.location='index.php?page=pel&pages=jadwal_training_insert&pelatihan=<?PHP echo $_GET['pelatihan']; ?>&judul='+this.value" class="option" required="required">
    <option value=""></option>
    <?php
    $query_judul=mysql_query("select *from tb_judul where id_details_pelatihan=$_GET[pelatihan]");
    while($row_judul=mysql_fetch_array($query_judul)){
    //$query_cek=mysql_query("select *from tb_jadwal_training where id_judul = '$row_judul[id_judul]'");
    if($row_judul['id_judul']==$_GET['judul']){
    echo "<option value='$row_judul[id_judul]' selected>$row_judul[judul_training]</option>";
    }else{
    ?>
    <option value="<?php echo $row_judul['id_judul']; ?>"><?php echo $row_judul['judul_training']; ?></option>
    <?php
    }
    }
    ?>
    </select>  
    <span class="notification">Masukkan Judul Pelatihan</span>
    </li>
     <?php
	if(@$_GET['judul']){
    $query_durasi=mysql_query("select *from tb_judul where id_judul=$_GET[judul]");
	$row_durasi=mysql_fetch_array($query_durasi);
	echo "<li><label>Durasi Jam</label><input type='text' class='input' value='$row_durasi[durasi]' readonly='readonly' required >&nbsp; Jam</li>
	 	  <li><label>Jumlah Hari</label><input type='text' class='input' value='$row_durasi[jmlh_hari]' readonly='readonly' required>&nbsp; Hari</li>
  ";
	}else{}
	?>
    <li>
	<label>Tanggal Pelatihan</label> 
    <input class="input" type="text" id="Datepicker1" name="tanggal1" required="required">
    <span class="notification">Masukkan Tanggal Mulai Pelatihan</span> &nbsp; s/d &nbsp;
    <input class="input" type="text" id="Datepicker2" name="tanggal2" required="required">
    <span class="notification">Masukkan Tanggal Selesai Pelatihan</span>
    </li>

  	<li>
	<label>Jam Pelatihan</label> 
    <input class="input" type="text" id="time1" name="jam_mulai" required="required">
    <span class="notification">Masukkan Jam Mulai Pelatihan</span> &nbsp; s/d &nbsp;
    <input class="input" type="text" id="time2" name="jam_selesai" required="required">
    <span class="notification">Masukkan Jam Selesai Pelatihan</span>
    </li>

    <li>
	<label>Sertifikat</label>
    <input class="input" name="ket" type="text" maxlength="20" required/>
    <span class="notification">Masukkan Sertifikat</span>
    </li>
   

    <p>
	<button type="submit" class="submit" name="formjadwal">Simpan</button>
    </p>
</ul>
</form>
</div>

</div>
<?php
}
?>