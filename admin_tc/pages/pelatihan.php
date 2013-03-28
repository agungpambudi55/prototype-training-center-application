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
<?php
if(@$_GET['id']){
$query_edit=mysql_query("select *from tb_detail_pelatihan where id_details_pelatihan='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
$kategori_arr=$row_edit['id_kategori_training'];
?>
<div id="form">
<form method='post' name='form_edit' action='index.php?page=pel&pages=pelatihan'>
<ul>
		<input type='hidden' name='id' value="<?php echo $row_edit['id_details_pelatihan']?>"/>
        <li>
		<label>Kategori Pelatihan</label>
    	<select class="option" name="kategori" required="required">
    	<option value=""></option>
		<?php
        $sqlkategori=mysql_query("select * from tb_kategori_training");
        while($kategori=mysql_fetch_array($sqlkategori)){
        if($kategori_arr==$kategori['id_kategori_training']){
        ?>
        <option value="<?php echo $kategori['id_kategori_training']; ?>" selected><?php echo $kategori['kategori_training']; ?></option>
        <?php
        }else{
        ?>
        <option value="<?php echo $kategori['id_kategori_training']; ?>"><?php echo $kategori['kategori_training']; ?></option>
        <?php
        }
        }
        ?>
        </select>
    <span class="notification">Masukkan Kategori Pelatihan</span>
    </li>
    	<li>
        <label>Pelatihan</label>
        <input type='text' value='<?php echo $row_edit['pelatihan']; ?>' name='pelatihan' class='input' maxlength="40" required='required'/>
        <span class="notification">Masukkan Pelatihan</span>
       </li>
       <li>
        <label>Keterangan</label>
       <textarea name='ket' required='required'  class="textarea"/><?php echo $row_edit['ket'] ?></textarea>
       <p>
        <input type='submit' name='form_edit' value='Perbarui' class='button_a'>
		<a href='index.php?page=pel&pages=pelatihan' class="button_a" style="padding:10px 16px">Cancel</a>
        </p>
        </li>
</ul>
</form>
</div>
<?php }else { ?>
<div id="form">

<form method='post' name='form_tambah' action='index.php?page=pel&pages=pelatihan'>
<ul>
    	<li>
		<label>Kategori Pelatihan</label>
    	<select class="option" name="kategori" required="required">
    	<option value=""></option>
		<?php
        $nilai=mysql_query("select *from tb_kategori_training");
        $i=0;
        while($kategori_1=mysql_fetch_array($nilai)){
        $kategori_id=$kategori_1['id_kategori_training'];
        $nama=$kategori_1['kategori_training'];
        ?>
        <option value="<?php echo "$kategori_id"; ?>"><?php echo "$nama"; ?></option>
        <?php
        $i++;
        }
        ?>
        </select>
   		<span class="notification">Masukkan Kategori Pelatihan</span>
   		</li>
        <li>
        <label>Pelatihan</label>
        <input type='text' name='pelatihan' class='input' maxlength="40" required='required'/>
        <span class="notification">Masukkan Pelatihan</span>
       </li>
       <li>
        <label>Keterangan</label>
       <textarea name='ket' required='required'  class="textarea"/></textarea>
       <p>
        <input type='submit' name='form_tambah' value='Simpan' class='button_a'>
		<input type='reset' name='cancel' value='Bersihan' class='button_a'>
        </p>
        </li>
</ul>
</form>
</div>
<?php
}
@$kate=$_POST['kategori'];
@$pelatihan=ucwords($_POST['pelatihan']);
@$ket=ucfirst($_POST['ket']);

if(@$_POST['form_tambah']){
$query_insert=mysql_query("insert into tb_detail_pelatihan values ('','$kate','$pelatihan','$ket')");
	if($query_insert){
	echo "";
	}else{
		echo mysql_error();
	}
}else if(@$_POST['form_edit']){
$query_edit_data=mysql_query("UPDATE `tb_detail_pelatihan` SET `id_kategori_training` =  '$kate',`pelatihan` =  '$pelatihan',
`ket` =  '$ket' WHERE  `tb_detail_pelatihan`.`id_details_pelatihan` = '".$_POST['id']."'");	
}else if(@$_GET['hapus']){
$query_hapus=mysql_query("delete from tb_detail_pelatihan where id_details_pelatihan='".$_GET['hapus']."'");
	if(!$query_hapus){
		echo mysql_error();
	}
}
?>
<table class="table">
  <tr>
  	<th align='center'width='25%' >Pelatihan</th>
    <th align='center'width='25%' >Kategori Pelatihan</th>
    <th align='center' width='45%'>Keterangan</th>
    <th align='center' width='5%'>Aksi</th>
  </tr>
<?php  
$query=mysql_query("select *from tb_detail_pelatihan order by pelatihan asc");
if (mysql_num_rows($query)==0){
	echo "<tr><td align='center' colspan='5'><b>Kosong</b></td></tr>";}
else{
while($row=mysql_fetch_array($query)){
  echo "<tr>
 	<td>".$row['pelatihan']."</td> ";
	?>
    <td>
	<?php $kategori_2=mysql_query("select kategori_training from tb_kategori_training where id_kategori_training='".$row['id_kategori_training']."'");
	$tampil2=mysql_fetch_array($kategori_2);
	echo $tampil2['kategori_training'];
	?>
    </td>
	<?php 
	echo "
    <td>".$row['ket']."</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=pelatihan&id=".$row['id_details_pelatihan']."' class='update' title='Edit Pelatihan'></a>
    <a href='index.php?page=pel&pages=pelatihan&hapus=".$row['id_details_pelatihan']."' onclick='return konfirmasi_pelatihan(\"".$row['pelatihan']."\")' class='delete' title='Hapus Pelatihan'></a>
	</td>
    </tr>";
}

?>
</table>
    </div>
</div>
<?php }}?>