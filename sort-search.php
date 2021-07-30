<?php
session_start();
require_once('connect.php');

$sort = mysqli_real_escape_string($connect, $_POST['sort']);
$search = mysqli_real_escape_string($connect, $_POST['search']);

if(!$sort && !$cid){
	$error = "No parameters to sort products by";
	include('all-products.php');
	exit;
}

header('location: search-sort?search='.$search.'&sort='.base64_encode($sort));

exit;


?>