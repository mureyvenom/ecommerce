<?php
session_start();
require_once('connect.php');

$sort = mysqli_real_escape_string($connect, $_POST['sort']);

if(!$sort){
	$error = "No parameters to sort products by";
	include('all-products.php');
	exit;
}


header('location: sort-all-products?sort='.base64_encode($sort));

exit;



?>