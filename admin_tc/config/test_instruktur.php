<?php
include('connect.php');
$query=mysql_query("select max(id_instruktur) as id_instruktur from tb_instruktur");
$row=mysql_fetch_array($query);
$idmax=$row['id_instruktur'] + 1;
$target = "../images/instruktur/";
$a=date('Y-m-d-H-i-s');
$filename = $target .$idmax. '.jpg';
$result = file_put_contents( $filename, file_get_contents('php://input') );
if (!$result) 
{
print "ERROR: Failed to write data to $filename, check permissions\n";
exit();
}
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;
print "$url\n";
?>
