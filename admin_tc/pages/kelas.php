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
Kelas</div>
<html>
<head>
<script type="text/javascript">	
//ajax request	
var ajaxRequest;
function getAjax()  //mengecek apakah web browser support AJAX atau tidak
{
try
{
		// Opera 8.0+, Firefox, Safari
ajaxRequest = new XMLHttpRequest();
}catch (e){
// Internet Explorer Browsers
try{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e){
try{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}catch (e){
// Something went wrong
alert("Your browser broke!");
return false;
}
}
}
}	
function validasi (keyEvent) //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
{
keyEvent = (keyEvent) ? keyEvent: window.event;
input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
if (input.value) //jika input dimasukkan, masuk ke fungsi cekEmail
{
cekEmail("pages/kelas_cek_nama.php?input=" + input.value); //mengirim inputan ke file cek.php
}
}
function cekEmail(fileCek) //fungsi untuk menampilkan hasil validasi
{
getAjax();
ajaxRequest.open("GET",fileCek);
ajaxRequest.onreadystatechange = function()
{
document.getElementById("hasil").innerHTML = ajaxRequest.responseText;
}
ajaxRequest.send(null);
}

//end ajax request
</script>
<style>
.button_form{margin:0; padding:8px 13px;  text-decoration:none; color:#FFFFFF; background:#63B0FE; font-size:13px; border:0px solid gray;}
.button_form:hover{ background:#7DC8FF}
</style>
</head>
<body>

<div id="content">
<?php
if(@$_GET['id']){
$query_edit=mysql_query("select *from tb_kelas where id_kelas='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
?>
<div id="form">
<form method='post' name='form_edit' action='index.php?page=kelas'>
<ul>
		<input type='hidden' name='id' value='<?php echo $row_edit['id_kelas'] ?>'/>
    	<li>
        <label>Tahun</label>
        <input type='text' value='<?php echo $row_edit['tahun']; ?>' name='tahun' class='input' maxlength="40"   required='required'/>
         <span class="notification">Masukkan Tahun </span>
       </li>
       <li>
        <label>Nama Kelas</label>
        <input type='text' onkeyup='validasi(event)' name='nama_kelas' value='<?php echo $row_edit['nama_kelas']; ?>' class='input' maxlength="40" required='required'/>
        <span class="notification">Masukkan Nama Kelas</span>
        <p id="hasil" style="top:-100px"></p>
       <p>
        <input type='submit' name='form_edit' value='Perbarui' class='button_form'>
		<a href='index.php?page=kelas' class="button_a">Cancel</a>
        </p>
        </li>
</ul>
        </form>

<?php
	}
	  @$tahun	=$_POST['tahun'];
	  @$namakelas=ucwords($_POST['nama_kelas']);
	  	if(@$_POST['form_edit'])
			{
	  		$querycek=mysql_query("select *from tb_kelas where nama_kelas='$namakelas'");
	  		$cek=mysql_fetch_array($querycek);
	  			if($cek)
				{
		  		echo "<script> alert('Nama Kelas Sudah Dipakai'); location.href=('javascript:self.history.back();'); </script>";
		  		}
	  else
	  		$query_edit_data=mysql_query("update tb_kelas set nama_kelas='$namakelas', tahun='$tahun' where id_kelas = '".$_POST['id']."'");
			if ($query_edit_data)
			echo "<script> location.href=('index.php?page=kelas&ref=edt&".$_POST['id']."'); </script>";
	  		}
	  else if(@$_GET['hapus'])
	  		{
	  		$query_hapus=mysql_query("delete from tb_kelas where id_kelas='".$_GET['hapus']."'");
			$query_hapus1=mysql_query("delete from tb_peserta_kelas where id_kelas='".$_GET['hapus']."'");
		  		if(!$query_hapus & !$query_hapus1)
		  		echo mysql_error();
		  	else echo "<script> location.href=('index.php?page=kelas&ref=del&".$_POST['hapus']."'); </script>";
	  }
?>
<form method="post">
<div style="border:0px solid gray; padding:10px 0px 30px 0px; margin-bottom:3px">
<?php 
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{}
else
{echo "<a href='index.php?page=kelas' class='button_a'>Lihat Semua</a>";}
?>
<input type="submit" value="" class="search_button" />
      <select class="search_option" name="cari_sortir" required>
      <option value=""></option>
      <option value="tb_kelas.tahun">Tahun</option>
      <option value="tb_kelas.nama_kelas">Nama Kelas</option>
      <option value="tb_detail_pelatihan.pelatihan">Nama Pelatihan</option>
	  </select>
<input type="text" class="search" placeholder="Pencarian" name="cari" required/>
</div>
</form>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="edt")
	{echo "<div class='notifhijau'>Data berhasil diperbarui! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>
    <th align='center'width='65%' >Nama Kelas</th>
    <th align='center' width='30%'>Tahun</th>
    <th align='center'  width='5%'>Aksi</th>
  </tr>
<?php  
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
	
$query=mysql_query("select *from tb_kelas order by id_kelas desc LIMIT $posisi,$batas");
if (mysql_num_rows($query)==0){
	echo "<tr><td align='center' colspan='5'><b>Kosong</b></td></tr>";}
else{
while($row=mysql_fetch_array($query)){
  echo "
  	<tr>
    <td><a href='index.php?page=kelas_pembagian_view1&kelas=".$row['id_kelas']."' class='link1'>".$row['nama_kelas']."</a></td>
    <td align='center'>".$row['tahun']."</td>";
echo "
	<td align='center'>
	<a href='index.php?page=kelas&id=".$row['id_kelas']."' class='update' title='Edit Kelas'></a>
	<a href='index.php?page=kelas&hapus=".$row['id_kelas']."' onclick='return konfirmasi_kelas(\"".$row['nama_kelas']."\")' class='delete' title='Hapus Kelas'></a>
</td>
  </tr>";
}
}





$qry_2 = mysql_query("select * from tb_kelas");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=kelas&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=kelas&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}else{
	
 
$qry_cari = mysql_query("SELECT *FROM tb_kelas , tb_jadwal_training, tb_detail_pelatihan where tb_jadwal_training.id_jadwal_training =tb_kelas.id_jadwal_training 
and tb_detail_pelatihan.id_details_pelatihan=tb_jadwal_training.id_details_pelatihan 
and $_POST[cari_sortir] LIKE '%$_POST[cari]%' order by id_kelas desc ");
if(mysql_num_rows($qry_cari)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($qry_cari))
{
echo "
  	<tr>
    <td><a href='index.php?page=kelas_pembagian_view1&kelas=".$arr_1['id_kelas']."' class='link1'>".$arr_1['nama_kelas']."</a></td>
    <td align='center'>".$arr_1['tahun']."</td>";
echo "
	<td align='center'>
	<a href='index.php?page=kelas&id=".$arr_1['id_kelas']."' class='update' title='Edit Kelas'></a>
	<a href='index.php?page=kelas&hapus=".$arr_1['id_kelas']."' onclick='return konfirmasi_kelas(\"".$arr_1['nama_kelas']."\")' class='delete' title='Hapus Kelas'></a>
</td>
  </tr>";
}}
}

?>

</table>
    </div>
</div>
</body>
</html>
<?php }?>