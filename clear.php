<?php
session_start();
include('connect.php');
require_once('fns.php');

$cart_id = base64_decode($_GET['acc']);
$product_id = base64_decode($_GET['pr']);
$callback = base64_decode($_GET['cb']);

if($cart_id)
{
	$query3 = "delete from cart where order_id = '".$_SESSION['order_id']."' and id = '$cart_id'";
}
else
{

	$query_cart = "select * from cart where order_id =  '".$_SESSION['order_id']."'";
	$result_cart = mysqli_query($connect, $query_cart);
	$num_cart = mysqli_num_rows($result_cart);
	for($i=0; $i<$num_cart; $i++)
	{
		$row_cart = mysqli_fetch_array($result_cart);
		$return = $row_cart['product_size']+1;
	}
	$query3 = "delete from cart where order_id = '".$_SESSION['order_id']."'";
}
$result3 = mysqli_query($connect, $query3);
if($callback)
{
	header("Location: ".$callback);
}
else
{
	header("Location: cart.php");
	
}
?>