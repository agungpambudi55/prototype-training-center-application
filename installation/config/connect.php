<?php
$host		=	"localhost";
$user		=	"root";
$pw			=	"";
$db			=	"db_collais";
$conn		=	mysql_connect($host,$user,$pw);
if($conn)
{
	//print("Connection Ok");
}
else
{
	//print("Connection Failed");
}
$selectdb	=	mysql_select_db($db, $conn);
if($selectdb)
{
	//print("Connection to $database Ok");
}
else
{
	//print("Connection to $database Failed");
}
?>