<?php

$conn = new mysqli('localhost', 'root', '', 'dbtest');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


   $branch=$_POST["location"];
if(($branch=="GANGTOK"))
{ 
    header("Location: gangtok.html");
	
  }
else if(($branch=="NAMCHI"))
   {
	   header("Location: namchi.html");
	   
     
   }
   else if($branch=="RAVANGLA")
   {
	    header("Location: ravangla.html");
   }
   
   else{
      header("Location: ravangla.html");
	  
}
  
  ?>