<?php 
session_start();
include('functions.php');

$search = $_GET['search'];
$sort = base64_decode($_GET['sort']);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<title>Shop | Product Search</title>
    
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="dist/css/bootstrap.css">

<link href="dist/font-awesome/css/all.css" rel="stylesheet" type="text/css">

<link rel="icon" href="images/favicon.ico" />

<link href="dist/css/animate.css" rel="stylesheet">

<link href="dist/css/owl.carousel.css" rel="stylesheet">

<link href="dist/css/owl.theme.default.min.css" rel="stylesheet">

<link href="dist/css/toastr.css" rel="stylesheet">

<link href="dist/css/jquery.paginate.css" rel="stylesheet">
    
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
        
<div id="products">

    <div class="container">
		
		<div class="row"><div class="col-12" align="center"><h3>Product Search "<?php echo $search ?>"</h3><p></p><br><br><br><br></div></div>
		
		<div class="row">
			
			<div class="col-md-1"></div>
		
			<div class="col-md-10">
				
				<?php if($error){ ?><p><div class="alert alert-danger"><?php echo $error ?></div></p><?php } ?>
			
				<form method="post" action="sort-search.php">
				
					<div class="row">
					
						<div class="col-md-3 form-group">
						
							<select class="formfield" name="sort" required>
							
								<option value="">No sorting</option>
								
								<option>Price: Low to High</option>
								
								<option>Price: High to Low</option>
								
								<option>Alphabetically: A-Z</option>
								
								<option>Alphabetically: Z-A</option>
								
								<option>Date: Old to New</option>
								
								<option>Date: New to Old</option>
							
							</select>
							
							<input type="hidden" value="<?php echo $search; ?>" name="search">
						
						</div>
						
						<div class="col-md-2 form-group">
						
							<button type="submit" class="btn1">Sort</button>
						
						</div>
					
					</div>
				
				</form>
			
			</div>
			
			<div class="col-md-1"></div>
		
		</div>
    
        <div class="row" id="page">
            
            <?php sort_product_search($search, $sort); ?>
        
        </div>
    
    </div>
    
</div>
	
<script src="dist/js/jquery.paginate.js"></script>

<script>

	$('#page').paginate({
		scope: $('.items'), // targets all item elements

		perPage:                12,
		
		// boolean: scroll to top of the container if a user clicks on a pagination link     
		autoScroll:             true,            

		// defines where the pagination will be displayed    
		paginatePosition:       ['bottom'],     

		// Pagination selectors
		containerTag:           'nav',
		paginationTag:          'ul',
		itemTag:                'li',
		linkTag:                'a',

		// Determines whether or not the plugin makes use of hash locations
		useHashLocation:        true           

	});
	
</script>
    
<?php include('inc/footer.php'); ?>
    
</body>
</html>