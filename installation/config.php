<?php

// hostname or ip of server
$servername='localhost';
// username and password
$dbusername='root';
$dbpassword='';
$link=mysql_connect ("$servername","$dbusername","$dbpassword")
or die ( " Not able to connect to server ");

if (mysql_create_db("hgjghjghjgh")) 
{
print ("Database created successfully <br>");
} 
else 
{
print ("Error creating database: <br><br>". mysql_error ());
}

?> 