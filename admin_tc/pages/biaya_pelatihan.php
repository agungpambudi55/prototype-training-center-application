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

<script type="text/javascript">
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index.php?page=pel&pages=biaya_pelatihan&cat=' + val ;
}
</script>
<div id="content">
<?php
if(@$_GET['id']){
$query_edit=mysql_query("select *from tb_judul_jenis_peserta where id_judul_jenis_peserta='".$_GET['id']."'");	
$row_edit=mysql_fetch_array($query_edit);
?>
<div id="form">
<form method='post' name='form_edit' action='index.php?page=pel&pages=biaya_pelatihan'>
<ul>
		<input type='hidden' name='id' value="<?php echo $row_edit['id_judul_jenis_peserta']?>"/>
        <li>
		<label style="width:154px;">Judul Pelatihan</label>
		<?php
        $query = mysql_query("select judul_training from tb_judul where id_judul = '".$row_edit['id_judul']."'");
        $judul_arr=mysql_fetch_array($query);
        @$id=$judul_arr['id_judul'];
        $judul=$judul_arr['judul_training'];
        ?>
        <input type="text" name="jugggh" class="input" value="<?php echo $judul; ?>" readonly/>
        <input type="hidden" name="judul" value="<?php echo $row_edit['id_judul']; ?>"/>
    	</li>
    	<li>
        <label style="width:154px;">Jenis Peserta</label>
       	<select class="option" name="jenis" onChange="" required>
		<option value=""></option>
        <?php
		$jenis=mysql_query("select *from tb_jenis_peserta");
		while($jenis_arr=mysql_fetch_array($jenis)){
		if($row_edit['id_jenis_peserta']==$jenis_arr['id_jenis_peserta']){
		?>
        <option value="<?php echo $jenis_arr['id_jenis_peserta']; ?>" selected><?php echo $jenis_arr['jenis_peserta']; ?></option>
        <?php
		}else{
		?>
        <option value="<?php echo $jenis_arr['id_jenis_peserta']; ?>"><?php echo $jenis_arr['jenis_peserta']; ?></option>
        <?php
		}
		}
		?>
        </select>
        <span class="notification">Masukkan Jenis Peserta</span>
       </li>
       <li>
        <label>Biaya</label>
      Rp. <input type='text' class='input' name='biaya'  value="<?php echo $row_edit['biaya'] ?>" required/><span class="notification">Format bisa berupa : '150000' (tanpa titik)</span> 
       
       <p>
        <input type='submit' name='form_edit' value='Perbarui' class='button_a'>
		<a href='index.php?page=pel&pages=biaya_pelatihan' class="button_a" style="padding:10px 15px">Cancel</a>
        </p>
        </li>
</ul>
</form>
</div>
<?php }else { ?>
<div id="form">
<form method='post' name='form_tambah' action='index.php?page=pel&pages=biaya_pelatihan'>
<ul>
    	<li>
		<label style="width:154px;">Pelatihan</label>
		<?php
        @$cat=$_GET['cat'];
        $quer2=mysql_query("SELECT DISTINCT pelatihan,id_details_pelatihan FROM tb_detail_pelatihan order by pelatihan asc"); 
        if(isset($cat) and strlen($cat) > 0)
        {
        $quer=mysql_query("SELECT DISTINCT id_judul, judul_training FROM tb_judul where id_details_pelatihan='$cat' order by id_judul"); 
        }
        else{$quer=mysql_query("SELECT DISTINCT judul_training FROM tb_judul order by judul_training"); } 
        echo "<select class='option' name='cat' onchange=\"reload(this.form)\" required='required'><option value=''></option>";
        while($noticia2 = mysql_fetch_array($quer2)) 
        { 
        if($noticia2['id_details_pelatihan']==@$cat)
        {echo "<option selected value='$noticia2[id_details_pelatihan]'>$noticia2[pelatihan]</option>"."<BR>";}
        else{echo  "<option value='$noticia2[id_details_pelatihan]'>$noticia2[pelatihan]</option>";}
        }
        echo "</select>";
        ?>   
   		<span class="notification">Masukkan Pelatihan</span>
   		</li>
        <li>
        <label style="width:154px;">Judul Pelatihan</label>
		<?php
        echo "<select class='option' name='judul' required='required'><option value=''></option>";
        while($noticia = mysql_fetch_array($quer)) 
        { 
        echo  "<option value='$noticia[id_judul]'>$noticia[judul_training]</option>";
        }
        echo "</select>";
        ?>  
        <span class="notification">Masukkan Judul Pelatihan</span>
       </li>
       <li>
       <label style="width:154px;">Jenis Peserta</label>
       <select class="option" name='jenis' onchange='' required='required'>
        <option value=''></option>
        <?php
        $nilai=mysql_query("select *from tb_jenis_peserta");
        while($resul=mysql_fetch_array($nilai)){
        $id_jenis=$resul['id_jenis_peserta'];
        $jenis_peserta=$resul['jenis_peserta'];
        ?>
        <option value="<?php echo $id_jenis; ?>"><?php echo $jenis_peserta; ?></option>
        <?php
        }
        ?>
        </select>	
       <span class="notification">Masukkan Jenis Peserta</span>
       </li>
       <li>
       <label>Biaya</label>
      Rp. <input type='text' class='input' name='biaya' required /><span class="notification">Format bisa berupa : '150000' (tanpa titik)</span>
       <p>
        <input type='submit' name='form_tambah' value='Simpan' class='button_a'>
		<input type='reset' name='cancel' value='Bersihan' class='button_a'>
        </p>
        </li>
</ul>
</form>

<!--form cari-->
<div style="padding:0px 0px 30px 0px; border: 0px solid gray;">
<form method="post" name="form_cari" >
<input type="submit" value="" class="search_button" name="form_cari" />
<input type="text" class="search" placeholder="Pencarian" name="cari" required/>
</form>
<?php 
if (@$_POST['cari']){
	echo "<a href='index.php?page=pel&pages=biaya_pelatihan' class='button_a'>Lihat Semua</a>";}else{}
?>
</div>
</div>



<?php
}
@$judul_arr=$_POST['judul'];
@$jenis_arr=$_POST['jenis'];
@$biaya_arr=$_POST['biaya'];

if(@$_POST['form_tambah']){
$query_insert=mysql_query("insert into tb_judul_jenis_peserta values ('','$judul_arr','$jenis_arr','$biaya_arr')");
	if($query_insert){
	echo "";
	}else{
	echo mysql_error();
	}
}else if(@$_POST['form_edit']){
@$query_edit_data=mysql_query("update tb_judul_jenis_peserta set id_judul='$judul_arr', id_jenis_peserta='$jenis_arr', biaya='$biaya_arr' where id_judul_jenis_peserta='".$_POST['id']."'");	
}else if(@$_GET['hapus']){
$query_hapus=mysql_query("delete from tb_judul_jenis_peserta where id_judul_jenis_peserta='".$_GET['hapus']."'");
	if(!$query_hapus){
	echo mysql_error();
	}
}
?>
<table class="table">
  <tr>
  	<th align='center'width='45%' >Judul Pelatihan</th>
    <th align='center'width='30%' >Jenis Peserta</th>
    <th align='center' width='20%'>Biaya</th>
    <th align='center' width='5%'>Aksi</th>
  </tr>

<?php 
$batas = 15	;
@$halaman = $_GET['i']; 
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']==''){

$query="select * from tb_judul_jenis_peserta ORDER BY `tb_judul_jenis_peserta`.`id_judul` ASC LIMIT $posisi,$batas";
$cek_query=mysql_query($query);
while($baris=mysql_fetch_array($cek_query))
{
$id_jp=$baris['0'];
$id_ju=$baris['1'];
$id_je=$baris['2'];
$bi=$baris['3'];
$query1 = mysql_query("select judul_training from tb_judul where id_judul = '$id_ju'");
$b=mysql_fetch_array($query1);
$ju=$b['judul_training'];

///
$query2 = mysql_query("select jenis_peserta from tb_jenis_peserta where id_jenis_peserta = '$id_je'");
$c=mysql_fetch_array($query2);
$jp=$c['jenis_peserta'];
$uang = number_format($bi,0,'','.');

echo "<tr >
    <td>$ju</td>
    <td>$jp</td>
	<td align='justify'>Rp. $uang,00</td>
	<td align='center'>
	<a href='index.php?page=pel&pages=biaya_pelatihan&id=$id_jp' class='update' title='Edit Biaya'></a>
	<a href='index.php?page=pel&pages=biaya_pelatihan&hapus=$id_jp' onclick='return konfirmasi_biaya(\"".$ju."\")' class='delete' title='Hapus Biaya'></a>
	</td>
	</tr>";	
		
}
$qry_2 = mysql_query("SELECT * FROM tb_judul_jenis_peserta");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=pel&pages=biaya_pelatihan&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=pel&pages=biaya_pelatihan&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
?>
<?php
}
else
{
$query_cari	=mysql_query("SELECT *FROM tb_judul_jenis_peserta, tb_judul WHERE tb_judul.id_judul = tb_judul_jenis_peserta.id_judul AND tb_judul.judul_training LIKE '%".$_POST['cari']."%' ORDER BY tb_judul.judul_training ASC");
if(mysql_num_rows($query_cari)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($query_cari)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($query_cari))
{
$query_jenispeserta	=mysql_query("select *from tb_jenis_peserta where id_jenis_peserta =$arr_1[2]");
$row_jenis	=mysql_fetch_array($query_jenispeserta);
echo "
  <tr>
    <td>".$arr_1['6']."</td>
    <td>".$row_jenis['jenis_peserta']."</td>
    <td>".$arr_1['3']."</td>
    <td align='center'>
	<a href='index.php?page=pel&pages=biaya_pelatihan&id=$arr_1[id_judul_jenis_peserta]' class='update' title='Edit Biaya'></a>
	<a href='index.php?page=pel&pages=biaya_pelatihan&hapus=$arr_1[id_judul_jenis_peserta]' onclick='return konfirmasi_biaya(\"".$arr_1['6']."\")' class='delete' title='Hapus Biaya'></a>
	</td>
  </tr>
";
}
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($query_cari)."</b></p>
";
}

}
?>
</table>
    </div>
</div>
<?php }?>