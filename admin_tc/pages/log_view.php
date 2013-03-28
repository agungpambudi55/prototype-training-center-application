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
<div class="title_page" >
Log Pengguna
</div> 
<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<?php
$query=mysql_query("SELECT * FROM tb_log where user_name='".$_GET['log']."'");
$arr_query=mysql_fetch_array($query);
echo "<p>Nama Pengguna&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style='text-transform:capitalize'>$_GET[log]</b></p>";
?>
<br />
<a href="index.php?page=log_view<?php echo "&log=$_GET[log]&i=$_GET[log]"; ?>" class="button_a">Hapus log</a>
<br /><br />
<table class="table">
			<th width="50%">Tanggal</th>
			<th width="50%" >Waktu</th>
        </tr>
<?php
if(mysql_num_rows($query)==0)
{echo "<tr><td align='center' colspan='2'><b>Kosong</b></td></tr>";}
else
{
while($view=mysql_fetch_array($query)){
echo "    <tr>
            <td>$view[tgl]</td>
            <td>$view[time]</td>
    </tr>";
}
}
?>
</table>
<?php
if (isset($_GET['i']))
{
$qry_log=mysql_query("delete from tb_log where user_name='$_GET[log]'");
if(!$qry_log)
{echo mysql_error();} 
else 
{
	echo "<script>
	location.href = ('index.php?page=user_manajemen');
	</script>";
}
}
?>
</div>
<?php }?>