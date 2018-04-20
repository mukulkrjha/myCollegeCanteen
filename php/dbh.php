<?php

$server="localhost";
$user="root";
$password="password123";
$database="dbms-project";

$conn = mysqli_connect($server,$user,$password,$database);

if(!$conn)
{
	die("Could Not Connect To The DataBase");
}


?>