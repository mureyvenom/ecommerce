<?php include('./myjs.php'); ?>
<div id="footer">

    <div class="container">
    
        <div class="row">
        
            <div class="col-md-4">
                
                <h4>Follow Us</h4><br>
                
                <div class="row">
                
                    <?php social_media(); ?>
                
                </div>
            
            </div>
            
            <div class="col-md-4">
            
                <h4>Quick Links</h4>
                
                <div><a href="./">Home</a></div>
                
                <div><a href="#" data-toggle="modal" data-target="#exampleModal">Search</a></div>
            
            </div>
			
			<div class="col-md-4">
			
				<h4>Contact Us</h4>
				
				<div class="row">
				
					<?php contact_methods() ?>
				
				</div>
			
			</div>
        
        </div>
        
        <div class="row">
        
            <div class="copyright">
            
                <div class="col-12" align="center">© <?php echo date("Y"); ?> Shop name</div>
            
            </div>
        
        </div>
    
    </div>

</div>

