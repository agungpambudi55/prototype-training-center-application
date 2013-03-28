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
$query_edit=mysql_query("select *from tb_jenis_peserta where id_jenis_peserta='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
?>
<div id="form">
<form method='post' name='form_edit' action='index.php?page=pel&pages=jenis_peserta'>
<ul>
		<input type='hidden' name='id' value="<?php echo $row_edit['id_jenis_peserta']?>"/>
    	<li>
        <label>Jenis Peserta</label>
        <input type='text' value='<?php echo $row_edit['jenis_peserta']; ?>' name='nama' class='input' maxlength="40" required='required'/>
        <span class="notification">Masukkan Jenis Peserta</span>
       </li>
       <li>
        <label>Keterangan</label>
       <textarea name='ket' required='required'  class="textarea"/><?php echo $row_edit['ket'] ?></textarea>
       <p>
        <input type='submit' name='form_edit' value='Perbarui' class='button_a'>
		<a href='index.php?page=pel&pages=jenis_peserta' class="button_a" style="padding:10px 15px">Cancel</a>
        </p>
        </li>
</ul>
</form>
</div>
<?php }else { ?>
<div id="form">

<form method='post' name='form_tambah' action='index.php?page=pel&pages=jenis_peserta'>
<ul>
    	<li>
        <label>Jenis Peserta</label>
        <input type='text'  name='nama' class='input' maxlength="40"   required='required'/>
   		<span class="notification">Masukkan Jenis Peserta</span>
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
$query_insert=mysql_query("insert into tb_jenis_peserta values ('','$nama','$ket')");
	if($query_insert){
	echo "";
	}else{
		echo mysql_error();
	}
}else if(@$_POST['form_edit']){
@$query_edit_data=mysql_query("update tb_jenis_peserta set jenis_peserta='$nama',ket='$ket' where id_jenis_peserta = '".$_POST['id']."'");	
}else if(@$_GET['hapus']){
$query_hapus=mysql_query("delete from tb_jenis_peserta where id_jenis_peserta='".$_GET['hapus']."'");
	if(!$query_hapus){
		echo mysql_error();
	}
}

?>
<table class="table">
  <tr>
    <th align='center'width='40%' >Jenis Peserta</th>
    <th align='center' width='55%'>Keterangan</th>
    <th align='center' width='5%'>Aksi</th>
  </tr>
<?php  
$query=mysql_query("select *from tb_jenis_peserta order by jenis_peserta asc ");
if (mysql_num_rows($query)==0){
	echo "<tr><td align='center' colspan='5'><b>Kosong</b></td></tr>";}
else{
while($row=mysql_fetch_array($query)){
  echo "<tr>
    <td>".$row['jenis_peserta']."</td>
    <td>".$row['ket']."</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=jenis_peserta&id=".$row['id_jenis_peserta']."' class='update' title='Edit Jenis Peserta'></a>
    <a href='index.php?page=pel&pages=jenis_peserta&hapus=".$row['id_jenis_peserta']."' onclick='return konfirmasi_jenispeserta(\"".$row['jenis_peserta']."\")' class='delete' title='Hapus Jenis Peserta'></a>
	</td>
    </tr>";
}

?>
</table>
    </div>
</div>
<?php }}?>