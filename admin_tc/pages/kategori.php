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
$query_edit=mysql_query("select *from tb_kategori_training where id_kategori_training='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
?>
<div id="form">
<form method='post' name='form_edit' action='index.php?page=pel&pages=kategori'>
<ul>
		<input type='hidden' name='id' value="<?php echo $row_edit['id_kategori_training']?>"/>
    	<li>
        <label>Nama Kategori</label>
        <input type='text' value='<?php echo $row_edit['kategori_training']; ?>' name='nama' class='input' maxlength="40" required='required'/>
        <span class="notification">Masukkan Nama Kategori</span>
       </li>
       <li>
        <label>Keterangan</label>
       <textarea name='ket' required='required'  class="textarea"/><?php echo $row_edit['ket'] ?></textarea>
       <p>
        <input type='submit' name='form_edit' value='Perbarui' class='button_a'>
		<a href='index.php?page=pel&pages=kategori' class="button_a">Cancel</a>
        </p>
        </li>
</ul>
</form>
</div>
<?php }else { ?>
<div id="form">

<form method='post' name='form_tambah' action='index.php?page=pel&pages=kategori'>
<ul>
    	<li>
        <label>Nama Kategori</label>
        <input type='text'  name='nama' class='input' maxlength="40"   required='required'/>
   		<span class="notification">Masukkan Nama Kategori</span>
       </li>
       <li>
        <label>Keterangan</label>
       <textarea name='ket'   required='required' class="textarea"/></textarea>
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
@$nama=ucwords($_POST['nama']);
@$ket=ucfirst($_POST['ket']);

if(@$_POST['form_tambah']){
$query_insert=mysql_query("insert into tb_kategori_training values ('','$nama','$ket')");
	if($query_insert){
	echo "";
	}else{
		echo mysql_error();
	}
}else if(@$_POST['form_edit']){
$query_edit_data=mysql_query("update tb_kategori_training set kategori_training='$nama',ket='$ket' where id_kategori_training = '".$_POST['id']."'");	
}else if(@$_GET['hapus']){
$query_hapus	=mysql_query("delete from tb_kategori_training where id_kategori_training='".$_GET['hapus']."'") or die (mysql_error());

	if(!$query_hapus){
		echo mysql_error();
	}
}
?>
<table class="table">
  <tr>
    <th align='center'width='30%' >Nama Kategori</th>
    <th align='center' width='65%'>Keterangan</th>
    <th align='center' width='5%'>Aksi</th>
  </tr>
<?php  
$query=mysql_query("select *from tb_kategori_training order by kategori_training asc");
if (mysql_num_rows($query)==0){
	echo "<tr><td align='center' colspan='5'><b>Kosong</b></td></tr>";}
else{
while($row=mysql_fetch_array($query)){
  echo "<tr>
    <td>".$row['kategori_training']."</td>
    <td>".$row['ket']."</td>";
echo "<td align='center'>
	<a href='index.php?page=pel&pages=kategori&id=".$row['id_kategori_training']."' class='update' title='Edit Kategori'></a>
    <a href='index.php?page=pel&pages=kategori&hapus=".$row['id_kategori_training']."' onclick='return konfirmasi_kategori(\"".$row['kategori_training']."\")' class='delete' title='Hapus Kategori'></a>
	</td>
  	</tr>";
}
}
?>
</table>
    </div>
</div>
<?php }?>