<?php

$conn = new mysqli('localhost', 'root', '', 'dbtest');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


   $branch=$_POST["restaurant"];
if($branch=="A")
{ 
    header("Location: b.php");
	
  }
else if($branch=="B")
   {
	   header("Location: b.php");
	   
     
   }
   else if($branch=="C")
   {
	    header("Location: b.php");
   }
   else if($branch=="D")
   {
	   header("Location:foodies.php");
   }
   else{
      header("Location: b.php");
	  
}
  
  ?>