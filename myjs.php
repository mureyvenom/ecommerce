<script>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
    
var cart_number = <?php total_quantity(); ?>;

var order_id_session = "<?php echo $_SESSION['order_id'] ?>";

function cart_update(){

    if(order_id_session.length < 1){
        document.getElementById('controlled').innerHTML = '<div class="col-12">No items in cart</div>';
        return false;
    }

    document.getElementById("controlled").innerHTML = '<div class="col-12">Loading...</div>';

    $.post("ajax-cart-drop.php", {
         order_id_session:order_id_session
     })
    .done(function(data){
        document.getElementById("controlled").innerHTML = data;
    })

};

function removeCart(id){
    if(!id){
        alert("No cart ID");
        return false;
    }
    
    document.getElementById("clear"+id).innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>';
    
    $.post("ajax-remove.php", {
        cart_id:id
    }).done(function(data){
        subTotal();
        document.getElementById("clear"+id).innerHTML = '<i class="fa fa-times"></i>';
        cart_update();
        update_price();
        update_quantity();
    })
    
}
    
function subTotal(){
    document.getElementById("subtotal").innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>';
    $.post("ajax-sub-total.php", {
        order_id:order_id_session
    }).done(function(data){
        document.getElementById("subtotal").innerHTML = data;
    })
}
    
function resetCart(){
    $.post("ajax-cart-reset.php", {
        order_id:order_id_session
    }).done(function(data){
        document.getElementById("tbody").innerHTML = data;
    })
}
   
function minusCart(id){
    if(!id){
        alert("No cart ID");
        return false;
    }
    
    document.getElementById("clear"+id).innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>';
    
    $.post("ajax-minus-cart.php", {
        cart_id:id
    }).done(function(data){
        resetCart();
        cart_update();
        subTotal();
        document.getElementById("clear"+id).innerHTML = '<i class="fa fa-times"></i>';
        update_price();
        update_quantity();
    })
    
    
}
    
function plusCart(id){
    if(!id){
        alert("No cart ID");
        return false;
    }
    
    document.getElementById("clear"+id).innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>';
    
    $.post("ajax-plus-cart.php", {
        cart_id:id
    }).done(function(data){
        resetCart();
        cart_update();
        subTotal();
        document.getElementById("clear"+id).innerHTML = '<i class="fa fa-times"></i>';
        update_price();
        update_quantity();
    })
    
    
}

function update_price(){
    

    if(order_id_session.length < 1){
        document.getElementById('total').innerHTML = '0';
        return false;
    }

    document.getElementById("total").innerHTML = 'Loading...';

    $.post("ajax-cart-price.php", {
         order_id_session:order_id_session
     })
    .done(function(data){
        document.getElementById("total").innerHTML = data;
    })
};
    
function delete_product(del_id){
    var cart_id = $('#cart_id'+del_id).val();
    var pr_id = $('#pr_id'+del_id).val();
    
    document.getElementById("controlled").innerHTML = document.getElementById("controlled").innerHTML + '<div class="col-12" align="center"><div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div></div>';   
    
    if(del_id.toString().length < 1 && !cart_id){
        alert("No parameters sent");
        return false;
    }

    $.post("ajax-clear.php", {
        cart_id:cart_id,
        pr_id:pr_id
    }).done(function(data){
        if(data == "success"){
            toastr["info"]("Product successfully removed from cart", "Removed from cart");
            cart_update();
            update_price();
            update_quantity();
        }else{
            alert(data);
        }
    });
}

function update_quantity(){
    if(order_id_session.length < 1){
        $("#navbar .badge").html(parseInt(cart_number));
        $(".float-cart .badge").html(parseInt(cart_number));
        return false;
    }
    $.post("ajax-cart-quantity.php", {
         order_id_session:order_id_session
     })
    .done(function(data){
        cart_number = data;
        $("#navbar .badge").html(parseInt(cart_number));
        $(".float-cart .badge").html(parseInt(cart_number));
    })
}
    
function add_prod(){

    var quantity = $("#quantity").val();
    var product_id = $("#product_id").val();
    var product_price = $("#product_price").val();

    document.getElementById("add-prod").innerHTML = '<div class="spinner-border spinner-border-sm text-light" role="status"><span class="sr-only">Loading...</span></div>';

    if(!quantity){
        alert('No product details received');
        return false;
    }


     $.post("ajax-cart.php", {
         quantity:quantity, 
         product_id:product_id,
         product_price:product_price
     })
    .done(function(data) {

        if(data !== 'Error in insertion'){
            toastr["success"]("Product successfully added to cart", "Added to cart");
            order_id_session = data;
            
            cart_update();
            update_price();
            update_quantity();
            document.getElementById("quantity").value = 1;
            document.getElementById("add-prod").innerHTML = 'Add to cart';
                        
        }else{	
            alert(data);	
            toastr["error"]("Failed to add to cart", "Unable to add");
            document.getElementById("add-prod").innerHTML = 'Add to cart';
        }
    });


};
    
</script>
    