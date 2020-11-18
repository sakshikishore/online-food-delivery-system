<?php
define('host','localhost');
define('username','root');
define('password','');
define('database','dbtest');
 

$connection = mysqli_connect(host,username,password) or die("Cannot connect to the server");

 
$connect_db = mysqli_select_db($connection,database)or die("Cannot connect to database");

?>
