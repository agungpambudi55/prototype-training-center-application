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
$qry=mysql_query("delete from tb_tamu order by id_tamu asc limit 10");
if($qry)
{echo "<script>location.href = ('index.php?page=buku_tamu_view&ref=del');</script>";}
else
{echo "<script>alert('Delete not success!');location.href=('index.php?page=buku_tamu_view');</script>";}
?>
<?php
}
?>