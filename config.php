<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "huhc";
$connect = mysqli_connect($host,$user,$pass,$dbname);
if(!$connect)
{
	echo "connection not established";
}
else
{
	#do nothing
}

 ?>