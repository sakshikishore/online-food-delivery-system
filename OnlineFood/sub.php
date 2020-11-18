<?php
session_start();
include('config.php');
if(isset($_POST['save_order'])){
	if(empty($_POST['ship_name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['ship_state']) || empty($_POST['ship_city']) ||  empty($_POST['ship_street'])){
		$msg = "Please ,complete order data ";
	}else{
		$ship_name = mysql_real_escape_string($_POST['ship_name']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$ship_state = mysql_real_escape_string($_POST['ship_state']);
		$ship_city = mysql_real_escape_string($_POST['ship_city']);
		$ship_street = mysql_real_escape_string($_POST['ship_street']);
												
			
		$order_id = mysql_real_escape_string($_SESSION['order_id']) ;
		$sql_get_save_order = "UPDATE orders set ship_name='$ship_name',email='$email',phone='$phone',ship_state='$ship_state',ship_city='$ship_city',ship_street='$ship_street' where id = $order_id ";
		$save_order = mysqli_query($connection,$sql_get_save_order)or die(mysqli_error($connection));
		if($save_order){
			header("Location:new.php");
		}else{
			$msg = "Cannot save your order, please try again !"	;
		}
		
		
	}
}

if(isset($_SESSION['order_id'])){
	// getting the saved items in the existing order
	$order_id = mysql_real_escape_string($_SESSION['order_id']) ;
	$sql_get_order_items = "select * from order_items where order_id =$order_id ";
	$cart_data = mysqli_query($connection,$sql_get_order_items)or die(mysqli_error($connection));
	$items_number = mysqli_num_rows($cart_data);
	
}else{
	header("Location:APD.php");
	} 
if($items_number < 1){
	die( "You didn't add any utems to your order ! <br />
	Go to  <a href='c.php'>items page </a>");
	}
	include("subtemp.php");
?>

    