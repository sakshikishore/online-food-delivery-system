<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <!-- compatitbility meta -->
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <!--  Mobile meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Simple shopping cart - Discussdesk</title>

   <!--[if lt IE 9]>
 <script src="js/html5shiv.min.js"></script> 
<script src="js/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
 
	<div class="container" >
        <?php if(@$msg){ ?>
		<div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only"></span>
          <?=$msg?>
        </div>
		
	<?php 	} ?>
    <div class="panel panel-default">
    <form method="post" action="" >
      <!-- Panel of the ordered items in cart -->
      <div class="panel-heading">Your order </div>
      
    
      <!-- Table -->
		<table class="table"> 
        	<thead>
            	 <tr> <th>#</th> <th>item name</th> <th>quantity</th> <th>price</th></tr> 
            </thead>
             
            <tbody> 
            <?php if ($items_number >= 1){ // if order have one item or more loop in it and make a list of items in cart
				$n = 1;
				$total = 0;
				while($item = mysqli_fetch_array($cart_data)){
					
				 ?>
                <tr> <th scope="row"><?=$n?></th> <td><?=$item['item_name']?></td> <td><?=$item['quantity']?></td> <td><?=$item['price']?>$</td> </tr>
                <?php
				$n++;
				$total +=$item['price'];
				 }}?>
 
            </tbody> 
            <tfoot>
            	 <tr> <th>#</th> <th>total</th> <th></th> <th><?php echo(@$total)?$total:'0'; ?>$</th> </tr>
            </tfoot>
		</table>
        <div class="panel-heading">Please fill you order detail</div>
        
        <table class="table"> 
<!--        	<thead>
            	 <tr> <th>#</th> <th>item name</th> <th>quantity</th> <th>price</th></tr> 
            </thead>   -->
             
            <tbody> 

                <tr> <th scope="row">Name</td> <td><input type="text"  name="ship_name" placeholder="name"></td>  </tr>
                <tr> <th scope="row">Email</td> <td><input type="email"  name="email" placeholder="email"></td>  </tr>
                <tr> <th scope="row">Phone</td> <td><input type="text"  name="phone" placeholder="phone"></td>  </tr>
                <tr> <th scope="row">State</td> <td><input type="text"  name="ship_state" placeholder="ship_state"></td>  </tr>
                <tr> <th scope="row">City</td> <td><input type="text"  name="ship_city" placeholder="ship_city"></td>  </tr>
                <tr> <th scope="row">Street</td> <td><input type="text"  name="ship_street" placeholder="ship_street"></td>  </tr>
              </tbody> 
            
		</table>
        <div class="panel-body btn-group btn-group-justified">
        <div class="panel-footer" >
        	<div class="btn-group col-md-4" role="group">
            
              <a href="c.php"><span class="btn btn-default col-md-8" >items page</span></a>
 
          </div>
          <div class="btn-group col-md-4" role="group">
          <button type="submit" name="save_order" class="btn btn-default col-md-8"  >submit order</button>
          	
          </div>

          </div>
          </div>
          </form>
        
      </div>
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