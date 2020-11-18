<?php

$conn = new mysqli('localhost', 'root', '', 'dbtest');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


   $branch=$_POST["restaurant"];
if($branch=="A")
{ 
    header("Location: t.php");
	
  }
else if($branch=="B")
   {
	   header("Location: t.php");
	   
     
   }
   else if($branch=="C")
   {
	    header("Location: t.php");
   }
   else if($branch=="D")
   {
	   header("Location: t.php");
   }
   else{
      header("Location: t.php");
	  
}
  
  ?>