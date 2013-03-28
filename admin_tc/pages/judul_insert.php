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
<form method="post"  name="formsimpan" action="index.php?page=pel&pages=judul_insert_proses">
<ul>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 120px; font-size:20px; font-weight:bold; color:#333333">Judul Pelatihan</p></li>
    <li>
	<label>Pelatihan</label>
    <select class="option" name="pelatihan" required="required">
      <option value=""></option>
		<?php
        $nilai=mysql_query("select *from tb_detail_pelatihan");
        while($a=mysql_fetch_array($nilai)){
        $id_pelatihan=$a['id_details_pelatihan'];
        $nama=$a['pelatihan'];
        ?>
        <option value="<?php echo $id_pelatihan; ?>"><?php echo $nama; ?></option>
        <?php
        }
        ?>
        </select> 
    <span class="notification">Masukkan Pelatihan</span>
    </li>
    <li>
	<label>Judul</label>
    <input class="input" name="ju" type="text" maxlength="40"  required	/>
    <span class="notification">Masukkan Judul Pelatihan</span>
    </li>
    <li>
	<label>Peserta Min</label>
    <input class="input" name="min" type="text"  maxlength="40" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Masukkan Peserta Min</span>
    </li>
    <li>
	<label>Durasi Jam</label>
    <input class="input" name="du" type="text"  maxlength="30" required pattern="\-?\d+(\.\d{0,})?"/> Jam
    <span class="notification">Masukkan Durasi Jam</span>
    </li>
    <li>
	<label>Jumlah Hari</label>
    <input class="input" name="ha" type="text"  maxlength="30" required pattern="\-?\d+(\.\d{0,})?"/> Hari
    <span class="notification">Masukkan Jumlah Hari</span>
    </li>
    <li>
	<label>Deskripsi</label>
    <p style="margin:0px 0px 0px 132px; border:0px solid gray">
    <textarea  name="ket" cols="100" rows="10"></textarea>
    </p>
    </li>
    <li>
	<label>Syarat Peserta</label>
    <p style="margin:0px 0px 0px 132px; border:0px solid gray">
    <textarea  name="syarat" cols="100" rows="10"></textarea>
    </p>
    </li>
    <li>
	<button type="submit" class="submit" name="formsimpan">Simpan</button>
    </li>
</ul>
</form>
</div>

</div>
<?php }?>