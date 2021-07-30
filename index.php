<?php
session_start();
require_once('connect.php');
include('functions.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<title>Shop</title>
    
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

</head>

<body class="wow fadeIn">
    
<?php include('inc/header.php'); ?>
    
<?php banner_images(); ?>
    
<div id="products">

    <div class="container">
    
        <div class="row">
            
            <div class="col-12" align="center"><h3>Latest Items</h3><p></p><br></div>
            
            <?php latest_products(); ?>
        
        </div>
    
    </div>
    
</div>

    
<?php include('inc/footer.php'); ?>
    
</body>
</html>