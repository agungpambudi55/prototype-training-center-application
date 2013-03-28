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
function konfirmasi(name)
	{
	if (confirm('Yakin dihapus pengguna '+ name +' ?'))
	{return true;}
	else
	{return false;}
	}
</script>
<div class="title_page">
Pengguna
</div>
<div id="content">
<p style="margin:0px 0px 10px 0px; border:0px solid gray; padding:10px 0px"><a href="index.php?page=user_manajemen_insert" class="button_a">Tambah Pengguna</a></p>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>
    <th width="5%">No</th>
    <th width="50%">Nama Pengguna</th>
    <th width="20%" colspan="2">Jabatan</th>
    <th width="20%" colspan="2">Status</th>
    <th width="5%">Aksi</th>
  </tr>
<?php
	$query = mysql_query("SELECT * FROM tb_user WHERE `id_user` not like '1'  order by user_name asc;");
	if(mysql_num_rows($query)==0)
	{echo "<tr><td align='center' colspan='7'><b>Kosong</b></td></tr>";}
	else
	{
	$i = 1;
	while($user = mysql_fetch_array($query))
	{ 

		if($user['akses'] == "1")
		{
			$jabatan = "Administrator";
			$jab = "<a href='index.php?page=user_manajemen&act=turun&id_user=".$user['id_user']."' class='down'></a>";
		}
		else
		{
			$jabatan = "Operator";
			$jab = "<a href='index.php?page=user_manajemen&act=naik&id_user=".$user['id_user']."' class='up'></a>";
		}
			
		if($user['status'] == "1")
		{
			$status = "<font color='#009900'>Aktif</font>";
			$act = "<a href='index.php?page=user_manajemen&act=banned&id_user=".$user['id_user']."' class='off'></a>";
		}
		else if($user['status'] == "3")
		{
			$status = "<font color='#E10000'>Banned</font>";
			$act = "<a href='index.php?page=user_manajemen&act=confirm&id_user=".$user['id_user']."' class='on'></a>";
		}
		else
		{
			$status = "<font color='#FF6600'>Konformasi</font>";
			$act = "<a href='index.php?page=user_manajemen&act=confirm&id_user=".$user['id_user']."' class='ver'></a>";
		}
echo"		
			<tr>
			<td align='center'>$i</td>
			<td>$user[user_name]</td>
			<td width='10%' align='center'>$jabatan</td>
			<td width='10%' align='center'>$jab </td>
			<td width='10%' align='center'>$status </td>
			<td width='10%' align='center'>$act</td>
			<td align='center'>
			<a href='index.php?page=log_view&log=".$user['user_name']."'' class='log'></a>
			<a href='index.php?page=user_manajemen&i=".$user['id_user']."' onclick='return konfirmasi(\"".$user['user_name']."\")' class='delete'></a>
			</td>
			</tr>";
		$i++;
	}}
?>
</table>
</div>
<?php
if (@$_GET['i'])
{
$qry_user=mysql_query("select user_name from tb_user where id_user=$_GET[i]");
$arr_user=mysql_fetch_array($qry_user);
$qry_log=mysql_query("delete from tb_log where user_name='$arr_user[0]'");
$query_hapus=mysql_query("delete from tb_user where id_user='".$_GET['i']."'");
if(!$query_hapus && !$qry_log)
{echo mysql_error();} 
else 
{echo "<script>location.href = ('index.php?page=user_manajemen&ref=del&".$_GET['i']."');</script>";}
}



if(@$_GET['act'] == "confirm")
{
		mysql_query("UPDATE tb_user SET `status` = '1' WHERE id_user='".$_GET['id_user']."';");
		echo "<script>
	location.href = ('index.php?page=user_manajemen');
	</script>";
	}
	else if(@$_GET['act'] == "banned")
	{
		mysql_query("UPDATE tb_user SET `status` = '3' WHERE id_user='".$_GET['id_user']."';");
		echo "<script>
	location.href = ('index.php?page=user_manajemen');
	</script>";
	}
	else if(@$_GET['act'] == "naik")
	{
		mysql_query("UPDATE tb_user SET `akses` = '1' WHERE id_user='".$_GET['id_user']."';");
		echo "<script>
	location.href = ('index.php?page=user_manajemen');
	</script>";
	}
	else if(@$_GET['act'] == "turun")
	{
		mysql_query("UPDATE tb_user SET `akses` = '2' WHERE id_user='".$_GET['id_user']."';");
		echo "<script>
	location.href = ('index.php?page=user_manajemen');
	</script>";
	}
?>
<?php }?>