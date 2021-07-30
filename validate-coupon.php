<?php
session_start();
require_once('connect.php');

$code = mysqli_real_escape_string($connect, $_POST['code']);

if(!$code){
	echo "No code found";
	exit;
}

$check = mysqli_query($connect, "select * from coupons where code = '$code' order by id desc limit 1");
$row = mysqli_fetch_assoc($check);

$exp_date = $row['exp_date'];
$units = $row['units'];

if(date("Y-m-d") > $exp_date){
	$data = array("percent"=>$row['percent_off'], "units"=>$row['units'], "status"=>"failed", "message"=>"This coupon has expired");
	echo json_encode($data);
	exit;
}

if(is_null($units)){	
	$data = array("percent"=>$row['percent_off'], "units"=>$row['units'], "status"=>"success", "message"=>"Coupon Valid, please note that this coupon will only count when payment is successful and can be revoked if the available amount is exhausted");
	echo json_encode($data);
	exit;
}else{
	if($units < 1){
		$data = array("percent"=>$row['percent_off'], "units"=>$row['units'], "status"=>"failed", "message"=>"This coupon has been used up");
		echo json_encode($data);
		exit;
	}else{
		$data = array("percent"=>$row['percent_off'], "units"=>$row['units'], "status"=>"success", "message"=>"Coupon Valid, please note that this coupon will only count when payment is successful and can be revoked if the available amount is exhausted");
		echo json_encode($data);
		exit;
	}
}




?>