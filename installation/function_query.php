<?php
function restore_db($fileName){
$templine = '';
$lines = file($fileName);
$i=1;
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;
    $templine .= $line;
    if (substr(trim($line), -1, 1) == ';')
    {
        mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        //echo $templine."<br><br>";
		$templine = '';
    }
	$i++;
 }
}
?>