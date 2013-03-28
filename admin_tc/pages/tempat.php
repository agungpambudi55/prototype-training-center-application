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
$query_edit=mysql_query("select *from tb_tempat where id_tempat='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
?>
<div id="form">
<form method='post' name='form_edit' action='index.php?page=pel&pages=tempat'>
<ul>
		<input type='hidden' name='id' value="<?php echo $row_edit['id_tempat']?>"/>
    	<li>
        <label>Nama Tempat</label>
        <input type='text' value='<?php echo $row_edit['nama_tempat']; ?>' name='tempat' class='input' maxlength="40" required='required'/>
        <span class="notification">Masukkan Tempat Pelatihan</span>
       </li>
       <li>
        <label>Keterangan</label>
       <textarea name='ket' required='required'  class="textarea"/><?php echo $row_edit['ket'] ?></textarea>
       <p>
        <input type='submit' name='form_edit' value='Perbarui' class='button_a'>
		<a href='index.php?page=pel&pages=tempat' class="button_a">Cancel</a>
        </p>
        </li>
</ul>
</form>
</div>
<?php }else { ?>
<div id="form">

<form method='post' name='form_tambah' action='index.php?page=pel&pages=tempat'>
<ul>
    	<li>
        <label>Nama Tempat</label>
        <input type='text'  name='tempat' class='input' maxlength="40"   required='required'/>
   		<span class="notification">Masukkan Tempat Pelatihan</span>
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
@$tempat=ucwords($_POST['tempat']);
@$ket=ucwords($_POST['ket']);

if(@$_POST['form_tambah']){
$query_insert=mysql_query("insert into tb_tempat values ('','$tempat','$ket')");
	if($query_insert){
	echo "";
	}else{
		echo mysql_error();
	}
}else if(@$_POST['form_edit']){
$query_edit_data=mysql_query("UPDATE `tb_tempat` SET `nama_tempat` =  '$tempat', `ket` =  '$ket' WHERE  id_tempat = '".$_POST['id']."'");	
}else if(@$_GET['hapus']){
$query_hapus=mysql_query("delete from tb_tempat where id_tempat='".$_GET['hapus']."'");
	if(!$query_hapus){
		echo mysql_error();
	}
}

?>
<table class="table">
  <tr>
    <th align='center'width='35%' >Nama Tempat</th>
    <th align='center' width='60%'>Keterangan</th>
    <th align='center' width='5%'>Aksi</th>
  </tr>
<?php 
$batas = 15	;
@$halaman = $_GET['i']; 
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
$query=mysql_query("select *from tb_tempat order by nama_tempat asc LIMIT $posisi,$batas");
if (mysql_num_rows($query)==0){
echo "<tr><td align='center' colspan='10'><b>Kosong</b></td></tr>";}else{
while($row=mysql_fetch_array($query)){
  echo "<tr>
    <td>".$row['nama_tempat']."</td>
    <td>".$row['ket']."</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=tempat&id=".$row['id_tempat']."' class='update' title='Edit Tempat Pelatihan'></a>
    <a href='index.php?page=pel&pages=tempat&hapus=".$row['id_tempat']."' onclick='return konfirmasi_tempat(\"".$row['nama_tempat']."\")' class='delete' title='Hapus Tempat Pelatihan'></a>
	</td>
    </tr>";
}
$qry_2 = mysql_query("SELECT * FROM tb_tempat");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=pel&pages=tempat&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=pel&pages=tempat&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";

?>
</table>
    </div>
</div>
<?php }}?>