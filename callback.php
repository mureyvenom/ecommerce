<?php

session_start();
require_once('connect.php');

$curl = curl_init();
$reference = $_GET['reference'];
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
	"Accept: application/json",
	"Content-Type: application/json",
	"User-Agent: Paystack-Developers-Hub",
	"Authorization: Bearer sk_test_64e8e050b4481d73119ff7f8c91b0316632cb4ac"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  die('API returned error: ' . $tranx->message);
}



if($tranx->data->status == 'success' ){
  
	$amount = $tranx->data->amount;
    $price = $amount / 100;
    $email = $tranx->data->customer->email;
	$order_id = $_SESSION['order'];
	$enc_id = base64_encode($order_id);
    
	$subject = "New order from website";
	$to = "info@domain.com.ng";
	$body = 'Hello Admin,' . "\n"
			."You have a new order from your website";
	
	$update_status = mysqli_query($connect, "update completed set payment_status = 'confirmed' and txref = '$reference' where order_id = '$order_id'");

	mail($to, $subject, $body, "noreply@domain.com.ng");

	header("location: invoice?order_id=".$enc_id);

	
}elseif('failed' == $tranx->data->status){
    echo 'Transaction Unsuccessful<br><br>';
    exit;
    
}


?>