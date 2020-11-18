<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
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
		<li><a href="#" style="font-family: cursive"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>
<div class="container">

 <div id="login-form ">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-7 col-sm-10">
        
         <div class="form-group">
             <h2 class="">Sign Up.</h2>
            </div>
        
         
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" style="padding:8px" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" style="padding:8px" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" style="padding:8px" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            <br>
           
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            
            <br>
            <div class="form-group">
             <a href="login.php">Sign in Here...</a>
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


