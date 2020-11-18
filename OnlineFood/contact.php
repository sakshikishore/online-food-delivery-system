
<html>
<head>
<title>Registration</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
 

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
        <li><a href="#" style="font-family: cursive">Contact</a></li>
		<li><a href="logout.php?logout" style="font-family: cursive"><span class="glyphicon glyphicon-log-out"></span> BACK</a></li>
      </ul>
    </div>
  </div>
</nav><div class="container">
<br><br><h4><i><u>STAFF CONTACT DETAILS</u></i></h4>
<table class="table table-striped">
	   
			<tr>
				<th>Staff-id </th>
				<th> staff-name</th>
				<th>staff-contactno.</th>
				<th>location</th>
				<th>contact-no.</th>				
			</tr>
			<?php
				$conn=mysqli_connect("localhost","root","","dbtest");
				$que=mysqli_query($conn,"SELECT * from staff");
				while($row=mysqli_fetch_row($que))
				{
					$a=$row[0];
					$b=$row[1];
					$c=$row[2];
					$d=$row[3];
					$e=$row[4];
				
			?>
			<tr>
				<td class="primary"><?php echo $a; ?></td>
				<td class="info"><?php echo $b; ?></td>
				<td class="suceess"><?php echo $c; ?></td>
				<td class="danger"><?php echo $d; ?></td>
				<td class="warning"-><?php echo $e; ?></td>
			</tr>
				<?php }?>
		
			
		</table></div></br></br></br></br>
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