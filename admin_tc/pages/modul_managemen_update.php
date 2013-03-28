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
<?php
$query_edit=mysql_query("select *from tb_modul where link like '".$_GET['keyword']."%'");	
$row_edit=mysql_fetch_array($query_edit);
if($row_edit['hak_akses'] == "1,")
	{
		$ad = "checked";
		$op = "";
	}
	else if($row_edit['hak_akses'] == ",2")
	{
		$ad = "";
		$op = "checked";
	}
	else if($row_edit['hak_akses'] == "1,2")
	{
		$ad = "checked";
		$op = "checked";
	}
	else
	{
		$ad = "";
		$op = "";
	}
?>
<div class="title_page">
Modul Hak Akses
</div>
<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>

<div id="form">
<ul>
<form method="post" name="form_managemen" id="formCheck" action="index.php?page=modul_managemen_update_proses&keyword=<?php echo $_GET['keyword']; ?>">

	<li><label>Nama Modul</label>
    <input type="text" value="<?php echo $_GET['nama']; ?>" class="input" readonly />
    </li>
    <li>
    <label>Hak Akses</label>
	<p><input type="checkbox" value="1" name="administrator" <?php echo $ad; ?> style="margin-top:12px"> Administrator
    <input type="checkbox"  value="2" name="operator" <?php echo $op; ?> style="margin-top:12px"> Operator</p>
	</li>
	<LI>
    <input type="submit" value="Perbarui" class="button_a">
    </LI>
</form>
</ul>
</div>
</div>
<?php
}
?>