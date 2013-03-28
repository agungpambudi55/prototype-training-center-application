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
<script type="text/javascript" src="js/texteditor/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<div id="content">
<p class="backk"><a href="index.php?page=pel&pages=judul_view" class="back"></a></p>
<div id="form">
<?php
$update_id=$_REQUEST['update_id'];
$update="select * from tb_judul where id_judul='$update_id'";
$cek_mysql=mysql_query($update) or die (mysql_error());
$baris=mysql_fetch_array($cek_mysql);
$id_ju=$baris['0'];
$pe=$baris['1'];
$ju=$baris['2'];
$du=$baris['3'];
$ha=$baris['4'];
$min=$baris['5'];
$ket=$baris['6'];
$syarat=$baris['7'];
?>
<form method="post"   action="index.php?page=pel&pages=judul_update_proses">
<input type="hidden" name="id_ju" value="<?php echo $id_ju; ?>"/>
<ul>
    <li>
	<label>Pelatihan</label>
    <select class="option" name="pe" required="required">
      <option value=""></option>
	  <?PHP
      $sql1=mysql_query("select *from tb_detail_pelatihan");
      while($view=mysql_fetch_array($sql1)){
          if($pe==$view['id_details_pelatihan']){
      ?>
      <option value="<?php echo $view['id_details_pelatihan']; ?>" selected><?php echo $view['pelatihan']; ?></option>
      <?php
      }else{
      ?>
      <option value="<?php echo $view['id_details_pelatihan']; ?>"><?php echo $view['pelatihan']; ?></option>
      <?php
      }
      }
      ?>
      </select>
    <span class="notification">Masukkan Pelatihan</span>
    </li>
    <li>
	<label>Judul</label>
    <input class="input" name="ju" value="<?php echo"$ju"; ?>" type="text" maxlength="40"  required	/>
    <span class="notification">Masukkan Judul Pelatihan</span>
    </li>
    <li>
	<label>Peserta Min</label>
    <input class="input" name="min" type="text" value="<?php echo"$min"; ?>" maxlength="40" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Masukkan Peserta Min</span>
    </li>
    <li>
	<label>Durasi Jam</label>
    <input class="input" name="du" type="text" value="<?php echo"$du"; ?>" value="<?php echo"$du"; ?>" maxlength="30" required pattern="\-?\d+(\.\d{0,})?"/> Jam
    <span class="notification">Masukkan Durasi Jam</span>
    </li>
    <li>
	<label>Jumlah Hari</label>
    <input class="input" name="ha" type="text" value="<?php echo"$ha"; ?>" maxlength="30" required pattern="\-?\d+(\.\d{0,})?"/> Hari
    <span class="notification">Masukkan Jumlah Hari</span>
    </li>
    <li>
	<label>Deskripsi</label>
    <p style="margin:0px 0px 0px 132px; border:0px solid gray">
    <textarea  name="ket" cols="100" rows="10"><?php echo "$ket"; ?></textarea>
    </p>
    </li>
    <li>
	<label>Syarat Peserta</label>
    <p style="margin:0px 0px 0px 132px; border:0px solid gray">
    <textarea  name="syarat" cols="100" rows="10"><?php echo "$syarat"; ?></textarea>
    </p>
    </li>
    <li>
	<button type="submit" class="submit" >Perbarui</button>
    </li>
</ul>
</form>
</div>

</div>
<?php }?>