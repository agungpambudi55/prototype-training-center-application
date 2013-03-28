<?php
$qry=mysql_query("delete from tb_tamu where id_tamu=$_GET[i]");
if($qry)
{echo "<script>location.href = ('index.php?page=buku_tamu_view&ref=del');</script>";}
else
{echo "<script>alert('Delete not success!');location.href=('index.php?page=buku_tamu_view');</script>";}
?>