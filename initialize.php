<?php 


$curl = curl_init();


$callback_url = 'https://domain.com.ng/callback.php'; 

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$payamount,//amount that paystack will process
    'email'=>$email,//email of customer that paystack will tie to the transaction
    'callback_url'=>$callback_url// callback url that will receive response
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_64e8e050b4481d73119ff7f8c91b0316632cb4ac", 
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);
header('Location: ' . $tranx['data']['authorization_url']);
if(!$tranx->status){
  print_r('API returned error: ' . $tranx['message']);
}

?>
