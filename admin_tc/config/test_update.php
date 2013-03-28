<?php
include('connect.php');
$id= $_GET['id'];
$target = "../images/peserta/";
$a=date('Y-m-d-H-i-s');
$filename = $target .$id. '.jpg';
$result = file_put_contents( $filename, file_get_contents('php://input') );
if (!$result) 
{
print "ERROR: Failed to write data to $filename, check permissions\n";
exit();
}
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;
print "$url\n";
?>
