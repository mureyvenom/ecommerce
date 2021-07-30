<?php
session_start();
include('connect.php');

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$price = $_POST['product_price']; 
$date = date('Y-m-d');

$_SESSION['order_ip'];

if($_SESSION['order_ip']){
    $ip = $_SESSION['order_ip'];
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION['order_ip'] = $_SERVER['REMOTE_ADDR'];
}
$_SESSION['order_id'];
//check if order session exists
$check = mysqli_query($connect, "select * from client_order where ip  = '$ip' and date = '$date'");
if(mysqli_num_rows($check) > 0){
    $result2 = mysqli_query($connect, "select * from client_order where ip = '$ip' and date = '$date' order by id desc");
		$row = mysqli_fetch_assoc($result2);
		$_SESSION['order_id'] = $row['id'];
}else{
//create order session
	$query = "insert into client_order set ip = '$ip', date = '$date', reference_id = '$product_id'";
	$result = mysqli_query($connect, $query);
	if($result){
		$result2 = mysqli_query($connect, "select * from client_order where ip = '$ip' and date = '$date' order by id desc");
		$row = mysqli_fetch_assoc($result2);
		$_SESSION['order_id'] = $row['id'];
	}else{
        echo 'error landing';
        exit;
    }
    
}

//Once we are fine with the order session you can add item to cart
//check if product already exists in the cart. If it exists update the number of items else insert new entry
$check_prod = mysqli_query($connect, "select * from cart where product_id = '$product_id' and order_id = '".$_SESSION['order_id']."'");
if(mysqli_num_rows($check_prod) > 0){
    $query3 = "update cart set quantity = quantity+$quantity where order_id = '".$_SESSION['order_id']."'";
}else{
    $query3 = "insert into cart set product_id = '$product_id', order_id = '".$_SESSION['order_id']."', quantity = '$quantity',  price = '$price'";
}

$result3 = mysqli_query($connect, $query3);
if($result3){
	echo $_SESSION['order_id'];
    exit;
}
else
{
	echo 'Error in insertion';
	exit;	
}
?>