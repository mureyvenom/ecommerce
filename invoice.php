<?php
session_start();
require_once('connect.php');
$order_id = base64_decode($_GET['order_id']);

$get_details = mysqli_query($connect, "select * from completed where order_id = '$order_id'");
$ndetails = mysqli_num_rows($get_details);

if($ndetails < 1){
	echo "Invalid Order ID";
	exit;
}

if(!$_GET['order_id']){
	echo "No Order ID";
	exit;
}

$row = mysqli_fetch_assoc($get_details);

$order_date = $row['date'];
$coupon_discount = $row['coupon_discount'];
$delivery_address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$country = $row['country'];
$order_total = $row['amount'];
$shipping_fee = $row['shipping_fee'];

$get_items = mysqli_query($connect, "select * from sales where order_id = '$order_id'");
$nitems = mysqli_num_rows($get_items);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<title>Shop Invoice</title>
    
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="dist/css/bootstrap.css">

<link href="dist/font-awesome/css/all.css" rel="stylesheet" type="text/css">

<link rel="icon" href="images/favicon.ico" />

<link href="dist/css/animate.css" rel="stylesheet">

<link href="dist/css/owl.carousel.css" rel="stylesheet">

<link href="dist/css/owl.theme.default.min.css" rel="stylesheet">

<link href="dist/css/toastr.css" rel="stylesheet">
    
<script src="dist/js/jquery.3.4.1.min.js"></script>
    
<script src="dist/js/popper.js" type="text/javascript"></script>
    
<script src="dist/js/bootstrap.js" type="text/javascript"></script>

<script src="dist/js/owl.carousel.js"></script>

<script src="dist/js/toastr.js"></script>
    
<!-- Main Stylesheet -->

<link href="dist/style.css" rel="stylesheet" type="text/css" media="all">
    
<script src="dist/js/wow.min.js"></script>
<script>
new WOW().init();
</script>
	
<style>

	#invoice {
		padding-top: 100px;
		padding-bottom: 100px;
	}
	
	.label-head {
		color: #fff;
		background-color: #222;
	}
	
	.label-body {
		border: 1px solid #222;
		color: #222;
	}
	
</style>

</head>

<body>
	
<div id="invoice">

	<div class="container">
	
		<div class="row">
		
			<div class="col-12" style="padding-bottom: 60px;">
			
				<h3>Logo Here</h3>
			
			</div>
		
		</div>
		
		<div class="row" style="padding-bottom: 100px;">
		
			<div class="col-2">
			
				<h4>DELIVERY ADDRESS</h4><p></p>
				
				<?php echo $delivery_address ?>,<br>
				<?php echo $city ?>,<br>
				<?php echo $state ?>,<br>
				<?php echo $country ?>
			
			</div>
			
			<div class="col-7"></div>
			
			
			<div class="col-3" align="center">
							
				<div class="row">
				
					<div class="col-12 label-head">DATE:</div>
				
					<div class="col-12 label-body"><?php echo $order_date ?></div>
				
				</div><p></p>
				
				<div class="row">
				
					<div class="col-12 label-head">ORDER ID</div>
				
					<div class="col-12 label-body"><?php echo $order_id ?></div>
				
				</div><p></p>
				
				<div class="row">
				
					<div class="col-12 label-head">COUPON DISCOUNT</div>
				
					<div class="col-12 label-body"><?php if($coupon_discount){ echo $coupon_discount.'%'; }else{ echo 0 .'%'; } ?></div>
				
				</div>
			
			</div>
		
		</div>
		
		<div class="row">
			
			<div class="col-md-1"></div>
		
			<div class="col-md-10">
			
				<h3>Items </h3>
				
				<div class="table-responsive">
				
					<table class="table table-bordered">
					
						<thead>
						
							<tr>
							
								<th>Name</th>
							
								<th>Quantity</th>
							
								<th>Unit Price</th>
							
								<th>Total</th>
							
							</tr>
						
						</thead>
						
						<tbody>
							
							<?php 
							
							for($i=0;$i<$nitems; $i++){
								$irow = mysqli_fetch_assoc($get_items);
							
							?>
						
							<tr>
							
								<td><?php echo $irow['item_bought']; ?></td>
							
								<td><?php echo $irow['quantity']; ?></td>
							
								<td><?php echo $irow['amount']; ?></td>
							
								<td><?php echo $irow['quantity'] * $irow['amount']; ?></td>
							
							</tr>
							
							<?php } ?>
							
							<tr>
							
								<td></td>
							
								<td></td>
							
								<td></td>
							
								<td></td>
							
							</tr>
							
							<tr style="font-size:14px;">
							
								<td>SHIPPING FEE</td>
							
								<td></td>
							
								<td></td>
							
								<td><?php echo $shipping_fee; ?></td>
							
							</tr>
							
							<tr style="font-size:14px;">
							
								<td>COUPON DISCOUNT</td>
							
								<td></td>
							
								<td></td>
							
								<td><?php if($coupon_discount){ echo $coupon_discount.'%'; }else{ echo 0 .'%'; } ?></td>
							
							</tr>
							
							<tr style="font-size:14px;">
							
								<td>TOTAL PAID</td>
							
								<td></td>
							
								<td></td>
							
								<td><?php echo $order_total; ?></td>
							
							</tr>
						
						</tbody>
					
					</table>
				
				</div>
			
			</div>
			
			<div class="col-md-1"></div>
		
		</div>
		
	
	</div>
	
</div>
	
</body>
</html>