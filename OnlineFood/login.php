<?php
 ob_start();
 session_start();
 require_once 'connection.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
  if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }

  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration</title>
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
		<li><a href="login.php" style="font-family: cursive"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>
<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['localhost']); ?>" autocomplete="off">
    
     <div class="col-md-7 col-sm-10">
        
         <div class="form-group">
             <h2 class="">Sign In.</h2>
            </div>
        
         
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" style="padding:8px" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" style="padding:8px" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
			
            
            <br>
            
            <div class="form-group" style="color:black">
             <button style="background-color:pink;padding:5px" type="submit" class="btn btn-success" name="btn-login">Sign In</button>
            </div>
            
            
            <br>
            <div class="form-group">
             <a href="register.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
    </div> 

</div>
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


