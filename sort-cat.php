<?php
session_start();
require_once('connect.php');

$sort = mysqli_real_escape_string($connect, $_POST['sort']);
$cid = mysqli_real_escape_string($connect, $_POST['cid']);

if(!$sort && !$cid){
	$error = "No parameters to sort products by";
	include('all-products.php');
	exit;
}

header('location: sort-categories?cid='.base64_encode($cid).'&sort='.base64_encode($sort));

exit;


?>