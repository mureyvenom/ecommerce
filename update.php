<?php
session_start();
include('connect.php');


$init_quantity = $_GET['init_quantity'];
$product_id = $_GET['product_id']; 
$quantity = $_GET['quantity'];
$cart_id = $_GET['cart_id']; 
$type = $_GET['type']; 
$url = $_GET['url']; 

if($init_quantity >= 0)
{
	
	if($type == 'add')
	{
		$quantity = $init_quantity+1;	
	}
	else
	{
		$quantity = $init_quantity-1;
	}


	//Once we are fine with the order session you can add item to cart
	$query3 = "update cart set quantity = '$quantity' where id = '$cart_id'";
	$result3 = mysqli_query($connect, $query3);
}

	$message = 'Operation Successful. Click OK to Continue';
	header("Location: $url");
	echo "<script type='text/javascript'>alert('$message');</script>";
?>