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
<div class="title_page">
Edit Slide
</div>
<div id="content">
<?php
$query_edit=mysql_query("select *from tb_aksesoris where id_aks='".$_GET['i']."'");	
$row_edit=mysql_fetch_array($query_edit);
?><br />
<a href="javascript:self.history.back();" class="back"></a><br /><br />
<div id="form">
<form method='post' name='form_edit' action="index.php?page=aksesoris_update_proses" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $row_edit['id_aks'] ?>'/>
<ul>
  <li>
	<label>Keterangan</label>
    <input type='text' value='<?php echo $row_edit['keterangan'] ?>' name='ket' class="input" required/>
    <span class="notification">Masukkan keterangan slide</span>
    </li>
    <li>
    <label>Gambar</label>
<img src='<?php echo $row_edit['photo']; ?>' style='width:219px;height:100px; border:1px solid gray; padding:1px'/>    
    </li>
    <li>
    <label>Ganti Gambar</label>
 <input type="file" name="upload" class="file"> 
 	</li>  
	<li>
 <input type='submit' name='form_edit' value='Perbarui' class='submit' style="margin:15px 0px 0px 0px">
    </li>
</ul>
</form>
</div>
</div>
<?php
}
?>