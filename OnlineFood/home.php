<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>


<body style="background-color:#eeeeee">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="margin-left:30%">
	   <i style="font-family: cursive;color:#ffffff;font-size:20px">ONLINE FOOD DELIVERY SYSTEM</i>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="index.php" style="font-family: cursive">Home</a></li>
        <li><a href="contact.php" style="font-family: cursive">Contact</a></li>
		<li><a href="logout.php?logout" style="font-family: cursive"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
              
			  <form method="post" action="a.php">
			  <br><br><br>
			  <div class="container">
<div class="form-inline">
<div class="input-group"><br><br>
<label for="ju">LOCATION</label>
<select name="location" id="ju" class="form-control">
                   <option name="location" value="GANGTOK">gangtok</option>
				   <option name="location" value="NAMCHI">namchi</option>
				   <option name="location" value="RAVANGLA">ravangla</option>
				   </select><br><br></div></div><br>
				   <input type="submit" value="click me"></div>
				   
				  </form><br><br><br>
				   
				   <div class="container text-center">    
  <h3 style="font-family:cursive">STAY HEALTHY</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="./images/5.jpg"  style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <img src="./images/4.jpeg"  style="width:100%" alt="Image">
        </div>
    <div class="col-sm-4">
      <img src="./images/2.jpeg"  style="width:100%" alt="Image">
      </div>
    </div>
  </div>
</div><br><hr>
<footer class="container-fluid text-center">
  <p style="font-family:cursive">LIVE LIFE LONG..</p>
</footer>
		   

</body>
</html>
<?php ob_end_flush(); ?>


