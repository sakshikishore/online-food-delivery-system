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

<body>
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
      <!-- Panel of the ordered items in cart -->
      <div class="panel-heading">Your cart <?php if (@$items_number < 1){ echo" is empty"; }?></div>
      
    
      <!-- Table -->
		<table class="table"> 
        	<thead>
            	 <tr> <th>#</th> <th>item name</th> <th>quantity</th> <th>price</th><th>control</th> </tr> 
            </thead>
             
            <tbody> 
            <?php if (@$items_number >= 1){ // if order have one item or more loop in it and make a list of items in cart
				$n = 1;
				$total = 0;
				while($item = mysqli_fetch_array($cart_data)){
					
				 ?>
                <tr> <th scope="row"><?=$n?></th> <td><?=$item['item_name']?></td> <td><?=$item['quantity']?></td> <td><?=$item['price']?>$</td> <td><a href="c.php?do=delete&id=<?=$item['id']?>"><span class="btn btn-danger" >remove </span></a>   <a href="c.php?do=add_one&id=<?=$item['id']?>"><span class="btn btn-success" >+ </span></a> <a href="c.php?do=remove_one&id=<?=$item['id']?>"><span class="btn btn-warning" >- </span></a>  </td> </tr>
                <?php
				$n++;
				$total +=$item['price'];
				 }}?>
 
            </tbody> 
            <tfoot>
            	 <tr> <th>#</th> <th>total</th> <th></th> <th><?php echo(@$total)?$total:'0'; ?>$</th> <th></th></tr>
            </tfoot>
		</table>
        <div class="panel-body btn-group btn-group-justified">
        <div class="panel-footer" >
        	<div class="btn-group col-md-4" role="group">
              <a href="c.php?do=delete_all"><span class="btn btn-default col-md-8" >empty cart</span></a>
 
          </div>
          <div class="btn-group col-md-4" role="group">
          	<a href="sub.php"><span class="btn btn-default col-md-8" >submit order</span></a>
          </div>

          </div>
        
      </div>
    </div>
    <!-- Items and its forms where you can add new items -->
    <div class="row">
  
    <div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">BARFI </div>
  <div class="panel-body">
 <img src="img/barfi.jpeg" class="img-thumbnail img-responsive item_thumb"><br> 
     Description<span class='row'></span>
  </div>
  <div class="panel-footer"> <p class="item_price">$ 288</p>
  <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
 
  
      <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="item_name" value="barfi">
     <input type="hidden" name="item_price" value="288">  
    </form>  
     </div>
</div>
</div><!-- end object -->

 <div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">NAN</div>
  <div class="panel-body">
 <img src="img/nan.jpeg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 20</p>  
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
    <label>Qty: <input class="item_Quantity form-control" type="text" name="quantity" value="1"></label>
    <input type="hidden" name="item_number" value="2">
    <input type="hidden" name="item_name" value="nan">  
         <input type="hidden" name="item_price" value="20"> 
    </form>  
    </div>
</div>

</div><!-- end object -->
     <div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">CHILLI PANEER</div>
  <div class="panel-body">
  <img src="img/chillipaneer.jpeg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 148</p> 
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
  <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
      <input type="hidden" name="item_number" value="3">
    <input type="hidden" name="item_name" value="paneer">  
         <input type="hidden" name="item_price" value="148">    
    </form>  
  </div>
</div>
</div>
<div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">COKE</div>
  <div class="panel-body">
  <img src="img/coke.jpg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 40</p> 
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
  <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
      <input type="hidden" name="item_number" value="3">
    <input type="hidden" name="item_name" value="coke">  
         <input type="hidden" name="item_price" value="40">    
    </form>  
  </div>
</div>
</div>
</div>
<div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">PASTRY</div>
  <div class="panel-body">
  <img src="img/pastry.jpg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 48</p> 
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
  <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
      <input type="hidden" name="item_number" value="3">
    <input type="hidden" name="item_name" value="pastry">  
         <input type="hidden" name="item_price" value="48">    
    </form>  
  </div>
</div>
    	
	</div>
	<div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">IDLI</div>
  <div class="panel-body">
  <img src="img/idli.jpg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 100</p> 
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
  <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
      <input type="hidden" name="item_number" value="3">
    <input type="hidden" name="item_name" value="idli">  
         <input type="hidden" name="item_price" value="100">    
    </form>  
  </div>
</div>
</div>
<div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">DOSA</div>
  <div class="panel-body">
  <img src="img/dosa.jpeg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 148</p> 
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
  <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
      <input type="hidden" name="item_number" value="3">
    <input type="hidden" name="item_name" value="dosa">  
         <input type="hidden" name="item_price" value="148">    
    </form>  
  </div>
</div>
</div>
<div class="col-md-3 simpleCart_shelfItem">   
<div class="panel panel-default">
     <div class="panel-heading item_name">MOMO</div>
  <div class="panel-body">
  <img src="img/gulabjamun.jpg" class="img-thumbnail img-responsive item_thumb"><br>Description
  </div>
  <div class="panel-footer"><p class="item_price">$ 40</p> 
    <form method="post" action="?do=add" >
  <input type="submit" class='btn btn-danger btn-md item_add' value="ADD" >
  <label>Qty: <input class="item_Quantity form-control" type="text"  name="quantity" value="1"></label>
      <input type="hidden" name="item_number" value="3">
    <input type="hidden" name="item_name" value="MOMO">  
         <input type="hidden" name="item_price" value="40">    
    </form>  
  </div>
</div>
</div>


<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

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
<br><hr>
<footer class="container-fluid text-center">
  <p style="font-family:cursive">LIVE LIFE LONG..</p>
</footer>

</body>
</html>