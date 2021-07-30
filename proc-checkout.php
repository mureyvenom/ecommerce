<?php
session_start();
require_once('connect.php');

$firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$tel = mysqli_real_escape_string($connect, $_POST['tel']);
$address = mysqli_real_escape_string($connect, $_POST['address']);
$city = mysqli_real_escape_string($connect, $_POST['city']);
$state = mysqli_real_escape_string($connect, $_POST['state']);
$amount = mysqli_real_escape_string($connect, $_POST['final']);
$_SESSION['entry_time'] = date('Y-m-d H:i:s');
$date = date("Ymd");
$time = date("his");
$d = strtoupper(substr($email, 0, 5));
$order_id = $d.$date.$time;
$payamount = $amount * 100;
$shipping = mysqli_real_escape_string($connect, $_POST['checkprice']);
$coupon = mysqli_real_escape_string($connect, $_POST['coupon']);
$_SESSION['coupon_code'] = $coupon;
$pre_discount = $amount;
$_SESSION['order'] = $order_id;

if(!$firstname && !$lastname && !$email && !$tel && !$address && !$city && !$state && !$amount){
	$error = "All customer details are required";
	include('checkout.php');
	exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$error = "Invalid email entered, enter a valid email and try again";
	include('checkout.php');
	exit;
}
$check_coupon = mysqli_query($connect, "select * from coupons where code = '$coupon' order by id desc limit 1");
$ncoupon = mysqli_num_rows($check_coupon);

if($ncoupon > 0){
	$rcoupon = mysqli_fetch_assoc($check_coupon);
	$exp_date = $rcoupon['exp_date'];
	$percent_off = $rcoupon['percent_off'];
	$percent = $percent_off/100;
	$units = $rcoupon['units'];
	
	if(date("Y-m-d") > $exp_date){
		
	}else{
		if(is_null($units)){
			$sub_amount = $amount*$percent;
			$amount = $amount - $sub_amount;
		}else{
			if($units > 0){
				$sub_amount = $amount*$percent;
				$amount = $amount - $sub_amount;
			}else{
				
			}
		}
	}
	
}

$query = "insert into completed set
		  date = '".$_SESSION['entry_time']."',
		  firstname = '$firstname',
		  lastname = '$lastname',
		  email = '$email',
		  phone = '$tel',
		  address = '$address',
		  order_id = '$order_id',
		  city = '$city',
		  state = '$state',
          country = 'Nigeria',
		  amount = '$amount',
		  status = 'pending',
          payment_status = 'pending',
          shipping_fee = '$shipping',
          txref = '$txref',
		  coupon_discount = '$percent_off',
		  pre_discount = '$pre_discount'";

$result = mysqli_query($connect, $query);


if($result){
	$sel_id = $_SESSION['order_id'];
	$select = mysqli_query($connect, "select * from cart where order_id = '$sel_id'");
	$nselect = mysqli_num_rows($select);
	
	function itemplace($id,$col){
		include('connect.php'); 
		$query = "select * from products where id = '$id'";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result);
		return $row[$col];
	}
	
	for($si=0; $si<$nselect; $si++){
        $selrow = mysqli_fetch_assoc($select);
	    $prodname = itemplace($selrow['product_id'], 'name');
        $prodquantity = $selrow['quantity'];
        $prodprice = $selrow['price'];
        $prodsize = $selrow['product_size'];
        $prodcolor = $selrow['color'];
        $prodid = $selrow['product_id'];
            
		$sales = "insert into sales set
			order_date = '".$_SESSION['entry_time']."',
			item_bought = '$prodname',
			size = '$prodsize',
			color = '$prodcolor',
			amount = '$prodprice',
			quantity = '$prodquantity',
			order_id = '$order_id',
			product_id = '$prodid'";
	
		$salesentry = mysqli_query($connect, $sales);
	
    }
	
}

$enc_id = base64_encode($order_id);

if(!is_null($units)){
	mysqli_query($connect, "update coupons set units = units-1 where code = '$coupon' order by id desc limit 1");
}

include('initialize.php');




?>