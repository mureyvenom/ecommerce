
<nav class="navbar navbar-expand-md sticky-top navbar-light" id="navbar">
<div class="container">
  <a class="navbar-brand" href="./">Logo Here</a>
  <button class="navbar-toggler" type="button" id="show-drop" data-target="#mobile-drop" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="./">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./all-products">All Items</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php category_dropdown(); ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Search</a>
      </li>
      <li class="nav-item">
        <p class="nav-link" id="show-cart" href="#">Cart <i class="fas fa-shopping-cart"></i><span class="badge"><?php total_quantity(); ?></span></p>
      </li>
<!--
-->
<!--
      <li class="nav-item">
        <a class="nav-link" href="#">Cart <i class="fa fa-shopping-cart"></i></a>
      </li>
-->
    </ul>
  </div>
</div>
</nav>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<!--
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
-->
      </div>
      <div class="modal-body">
        <div>
          
            <div class="col-12">
            
                <form class="" action="./presearch.php" method="post">
                
                    <div class="form-group">
                    
                        <input type="search" name="search" placeholder="Search through our catalogue" class="form-control">
                    
                    </div>
                
                    <div class="form-group">
                    
                        <button class="btn btn-primary" style="width: 100%;">Search</button>
                    
                    </div>
                
                </form>
            
            </div>
          
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="cart-drop">

    <div class="container">
    
        <div class="row">
        
            <div class="col-md-7"></div>
        
            <div class="col-md-5">
            
                <div class="cart-main">
                
                    <div class="col-12">
                    
                        <div class="row">
                        
                            <div class="col-6">
                            
                                <h3>Cart</h3>
                            
                            </div>
                        
                            <div class="col-6" align="right">
                            
                                <button class="closebtn"><i class="fas fa-times"></i></button>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    <div class="col-12">
                    
                        <div class="row">
                        
                            <div id="controlled" class="cart-content-hold">
                            
                                <?php cart_drop(); ?>
                                                        
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    <div class="col-12">Total ₦<span id="total"><?php cart_total(); ?></span></div>
                    
                    <div class="col-12">
                    
                        <div class="row">
                        
                            <div class="col-6"><a href="./cart"><button class="btn1">View Cart</button></a></div>
                        
                            <div class="col-6"><a href="./checkout"><button class="btn1">Checkout</button></a></div>
                        
                        </div>
                    
                    </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>

</div>

<div id="mobile-drop">

    <div class="container">
    
        <div class="row">
        
            <div class="col-12">
                
                <div align="right" style="100%;"><button id="close-drop" class="btn1"><i class="fas fa-times"></i></button></div>
            
                <div class="drop-hold" align="center">

                    <a href="./"><div class="drop-link">Home</div></a>

                    <a href="./all-products"><div class="drop-link">All Products</div></a>

                    <div class="drop-link" id="drop-parent">
                        Categories <i class="fas fa-caret-down"></i>

                        <?php mobile_category_dropdown(); ?>
                    </div>                  

                    <a href="#" data-toggle="modal" data-target="#exampleModal"><div class="drop-link">Search</div></a>

                    <a href="#"><div id="multi-drop" class="drop-link">Cart</div></a>

                </div>
            
            </div>
        
        </div>
    
    </div>

</div>

<div class="float-cart" align="center">

    <i class="fas fa-shopping-cart"></i><span class="badge"><?php total_quantity(); ?></span>

</div>

<script>
    $( function () {
        $( window ).scroll( function () {
            var scroll = $( window ).scrollTop();
            if ( scroll >= 120 ) {
                $( "#navbar" ).addClass( 'scrolled' );
            } else {
                $( "#navbar" ).removeClass( "scrolled" );
            }
        } );


    } );
</script>

<script>

    $('#show-drop').click(function(){
        $('#mobile-drop').slideToggle(200);
    });

    $('#close-drop').click(function(){
        $('#mobile-drop').slideToggle(200);
    });

</script>

<script>

    $('#drop-parent').click(function(){
        $('.drop-drop-link').toggle(200);
    })

</script>


<script>
    
    var cartstatus = sessionStorage.getItem("cartstatus")
    
    $(document).ready(function(){
        
        console.log(cartstatus);
        if(cartstatus == "open"){
            $('#cart-drop').slideDown(220)
        }
    });
    
    $(document).mouseup(function(e) {
        var outside = $(".cart-main");
        var showcart = $("#showcart");

        // if the target of the click isn't the outside nor a descendant of the outside
        if (!outside.is(e.target) && !showcart.is(e.target) && outside.has(e.target).length === 0 && showcart.has(e.target).length === 0) {
            $('#cart-drop').slideUp(220);
            sessionStorage.setItem("cartstatus", "closed");
        }
    });

    $('#show-cart').click(function(){
        
        if(document.querySelector('#cart-drop').style.display !== 'block'){
            $('#cart-drop').slideDown(220); 
            sessionStorage.setItem("cartstatus", "open");
        }
    
    });

    $('.float-cart').click(function(){
        
        if(document.querySelector('#cart-drop').style.display !== 'block'){
            $('#cart-drop').slideDown(220); 
            sessionStorage.setItem("cartstatus", "open");
        }
    
    });

    $('#multi-drop').click(function(){
        
        $('#mobile-drop').slideToggle(200);
        
        if(document.querySelector('#cart-drop').style.display !== 'block'){
            $('#cart-drop').slideDown(220); 
            sessionStorage.setItem("cartstatus", "open");
        }
    
    });
    
    $('.closebtn').click(function(){
        
        $('#cart-drop').slideUp(220);
            sessionStorage.setItem("cartstatus", "closed");
    });
    

</script>