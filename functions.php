<?php
include('connect.php');
$xxnum = mysqli_num_rows(mysqli_query($connect,  "select * from cart where order_id = '".$_SESSION['order_id']."'"));

function mobile_category_dropdown(){
    include('connect.php');
    $query = "select * from categories order by name asc";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($i=0;$i<$nrun; $i++){
        $row = mysqli_fetch_assoc($run);
        echo '<a href="./categories?cid='.base64_encode($row['id']).'"><div class="drop-drop-link">'.$row['name'].'</div></a>';
        
    }
}

function category_dropdown(){
    include('connect.php');
    $query = "select * from categories order by name asc";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($i=0;$i<$nrun; $i++){
        $row = mysqli_fetch_assoc($run);
        echo '<a class="dropdown-item" href="./categories?cid='.base64_encode($row['id']).'">'.$row['name'].'</a>';
        
        $check = $nrun - 1;
        if($i == $check){
            echo '';
        }else{
            echo '<div class="dropdown-divider"></div>';
        }
    }
}

function latest_products(){
    include('connect.php');
    $query = "select * from products where status = 'active' order by id desc limit 12";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($a=0; $a<$nrun; $a++){
        
        $row = mysqli_fetch_assoc($run);
        echo '<div class="col-md-4 col-6">
            
                <div class="item" align="center">
                
                    <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>
                
                    <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>
                
                    <div class="price">&#8358;'.number_format($row['price']).'</div>
                
                    <div class="category"><a href="categories?cid='.base64_encode($row['category']).'">'.$row['category_name'].'</a></div>
                
                </div>
            
            </div>';
    }
}

function all_products(){
    include('connect.php');
    $query = "select * from products where status = 'active' order by id desc ";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($a=0; $a<$nrun; $a++){
        
        $row = mysqli_fetch_assoc($run);
        echo '<div class="col-md-4 col-6 items">
            
                <div class="item" align="center">
                
                    <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>
                
                    <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>
                
                    <div class="price">&#8358;'.number_format($row['price']).'</div>
                
                    <div class="category"><a href="categories?cid='.base64_encode($row['category']).'">'.$row['category_name'].'</div>
                    
                    <input type="hidden">
                
                </div>
            
            </div></a>';
    }
}

function sort_all_products($sort){
    include('connect.php');
	if($sort == "Price: Low to High"){
		$query = "select * from products where status = 'active' order by price asc ";
	}elseif($sort == "Price: High to Low"){
		$query = "select * from products where status = 'active' order by price desc ";
	}elseif($sort == "Alphabetically: A-Z"){
		$query = "select * from products where status = 'active' order by name asc ";
	}elseif($sort == "Alphabetically: Z-A"){
		$query = "select * from products where status = 'active' order by name desc ";
	}elseif($sort == "Date: Old to New"){
		$query = "select * from products where status = 'active' order by id asc ";
	}elseif($sort == "Date: New to Old"){
		$query = "select * from products where status = 'active' order by id desc ";
	}
    
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($a=0; $a<$nrun; $a++){
        
        $row = mysqli_fetch_assoc($run);
        echo '<div class="col-md-4 col-6 items">
            
                <div class="item" align="center">
                
                    <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>
                
                    <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>
                
                    <div class="price">&#8358;'.number_format($row['price']).'</div>
                
                    <div class="category"><a href="categories?cid='.base64_encode($row['category']).'">'.$row['category_name'].'</div>
                    
                    <input type="hidden">
                
                </div>
            
            </div></a>';
    }
}

function get_category_name($cid){
    include('connect.php');
    $query = "select * from categories where id = '$cid'";
    $run = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($run);
    
    echo $row['name'];
    
}

function pull_products($cid){
    include('connect.php');
    $query = "select * from products where category = '$cid' and status = 'active' order by id desc ";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($a=0; $a<$nrun; $a++){
        
        $row = mysqli_fetch_assoc($run);
        echo '<div class="col-md-4 col-6 items">
            
                <div class="item" align="center">
                
                    <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>
                
                    <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>
                
                    <div class="price">&#8358;'.number_format($row['price']).'</div>
                
                </div>
            
            </div>';
    }
}

function sort_pull_products($cid, $sort){
    include('connect.php');
	if($sort == "Price: Low to High"){
		$query = "select * from products where category = '$cid' and status = 'active' order by price asc ";
	}elseif($sort == "Price: High to Low"){
		$query = "select * from products where category = '$cid' and status = 'active' order by price desc ";
	}elseif($sort == "Alphabetically: A-Z"){
		$query = "select * from products where category = '$cid' and status = 'active' order by name asc ";
	}elseif($sort == "Alphabetically: Z-A"){
		$query = "select * from products where category = '$cid' and status = 'active' order by name desc ";
	}elseif($sort == "Date: Old to New"){
		$query = "select * from products where category = '$cid' and status = 'active' order by id asc ";
	}elseif($sort == "Date: New to Old"){
		$query = "select * from products where category = '$cid' and status = 'active' order by id desc ";
	}
	
	
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    for($a=0; $a<$nrun; $a++){
        
        $row = mysqli_fetch_assoc($run);
        echo '<div class="col-md-4 col-6 items">
            
                <div class="item" align="center">
                
                    <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>
                
                    <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>
                
                    <div class="price">&#8358;'.number_format($row['price']).'</div>
                
                </div>
            
            </div>';
    }
}

function product_details($pid){
    include('connect.php');
    $query = "select * from products where id = '$pid'";
    $run = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($run);
    
    echo '<div class="row">
        
            <div class="col-md-6" align="center">
            
                <div class="image-holder">
                
                    <img src="uploads/products/'.$row['image'].'" class="img-fluid">
                
                </div>
            
            </div>
            
            <div class="col-md-6">
            
                <div class="item-name">'.$row['name'].'</div>
                
                <div class="price">&#8358;'.number_format($row['price']).'</div>
                
                <div class="price">'.$row['description'].'</div>
                
                <input type="hidden" id="product_id" value="'.$row['id'].'">
                
                <input type="hidden" id="product_price" value="'.$row['price'].'">
                
                <div class="row">
                
                    <div class="col-md-6">
                    
                        <div class="holdquant">
                        
                            <div class="row">

                                <div class="col-4"><button type="button" id="minus" class="calc">-</button></div>

                                <div class="col-4"><input type="number" id="quantity" min="1" value="1" class="inputquant" name="quantity"></div>

                                <div class="col-4"><button id="plus" type="button" class="calc">+</button></div>

                            </div>
                        
                        </div>
                    
                    </div>
                
                    <div class="col-md-6"><button '; if($row['status'] !== 'active'){echo ' disabled';} echo' class="btn1" id="add-prod" onClick="add_prod()">Add to cart</button></div>
                
                </div>
            
            </div>
        
        </div>';
}

function cart_drop(){
    include('connect.php');
    $query = "select * from cart where order_id = '".$_SESSION['order_id']."'";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    if($nrun > 0){
        for($i=0;$i<$nrun; $i++){
            $row = mysqli_fetch_assoc($run);
            $prid = $row['product_id'];
            $img = mysqli_query($connect, "select * from products where id = '$prid'");
            $rimg = mysqli_fetch_assoc($img);
            $img_name = $rimg['image'];
            echo '<div class="col-12">

                    <div class="cart-content">

                        <div class="row">
                        
                        <input type="hidden" value="'.$row['id'].'" id="cart_id'.$i.'">
                        <input type="hidden" value="'.$prid.'" id="pr_id'.$i.'">

                            <div class="col-4" onClick="delete_product('.$i.')" align="center">

                                <div class="image-holder"><img src="./uploads/products/'.$img_name.'" class="img-fluid"></div>

                                <i class="fas fa-times"></i>

                            </div>

                            <div class="col-8">

                                <div class="item-name">'.$rimg['name'].'</div>

                                &#8358;'.number_format($row['price']).' x '.$row['quantity'].'

                            </div>

                        </div>

                    </div>

                </div>';
        }
    }else{
        echo '<div class="col-12">No items in cart</div>';
    }
}

function cart_total(){
    include('connect.php');
    $query = "select sum(price*quantity) from cart where order_id = '".$_SESSION['order_id']."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);	
    echo number_format($row['sum(price*quantity)']);
}

function total_quantity(){
    include('connect.php');
    $query = "select sum(quantity) from cart where order_id = '".$_SESSION['order_id']."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);	
    if (!$row['sum(quantity)']){
        echo 0;
    }else{
        echo $row['sum(quantity)'];
    }
}

function product_name($id){
    include('connect.php');
    $query = "select * from products where id = '$id'";
    $run = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($run);
    
    echo $row['name'];
    
}

function product_image($id){
    include('connect.php');
    $query = "select * from products where id = '$id'";
    $run = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($run);
    
    echo $row['image'];
    
}

function cart_subtotal(){
    include('connect.php');
    $query = "select sum(price*quantity) from cart where order_id = '".$_SESSION['order_id']."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);	
    echo number_format($row['sum(price*quantity)']);
}

function get_cart(){
    include('connect.php');
    $query = "select * from cart where order_id = '".$_SESSION['order_id']."'";
    $run = mysqli_query($connect, $query);
    $nrun = mysqli_num_rows($run);
    
    if($nrun > 0){
    
        for($i=0;$i<$nrun; $i++){
            $row = mysqli_fetch_assoc($run);
            $pid = $row['product_id'];
            echo '
            <tr>

                <td>

                    <div align="center" style="height: 100px;"><img src="uploads/products/'; product_image($pid); echo '" style="" class="img-fluid"></div>

                </td>

                <td>

                    <strong>'; product_name($pid); echo '</strong><br>

                </td>

                <td>

                    <div class="col-12">

                        <div class="row">

                            <div class="col-4"><button class="btn1" onClick="minusCart('.$row['id'].')" id="minus">-</button></div>

                            <div class="col-4"><input type="number" readonly min="1" value="'.$row['quantity'].'" id="quant"></div>

                            <div class="col-4"><button class="btn1" onClick="plusCart('.$row['id'].')"  id="plus">+</button></div>

                        </div>

                    </div>

                </td>

                <td>

                     &#8358;'.$row['price'].'

                </td>

                <td>

                     &#8358;'.$row['price'] * $row['quantity'].'

                </td>

                <td>

                    <button class="btn1" id="clear'.$row['id'].'" onClick="removeCart('.$row['id'].')"><i class="fa fa-times"></i></button>

                </td>

            </tr>';
        }
    }else{
        echo '<tr>No item in cart';
    }
}

function product_search($keyword){
    include('connect.php');
    if(!$keyword){
        $query = "select * from products where status = 'active' order by id desc";
    }else{
        $query = "select * from products where name like '%$keyword%' and status = 'active' order by id desc";
    }
    
    $result = mysqli_query($connect, $query);
    $num = mysqli_num_rows($result);
    
    echo '';
    if($num > 0){
        for($a=0; $a<$num; $a++){

            $row = mysqli_fetch_assoc($result);
            echo '
            
            <div class="col-md-4 col-6 items">

                    <div class="item" align="center">

                        <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>

                        <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>

                        <div class="price">&#8358;'.number_format($row['price']).'</div>

                        <div class="category"><a href="categories?cid='.base64_encode($row['category']).'">'.$row['category_name'].'</a></div>

                        <input type="hidden">

                    </div>

                </div>';
        }
    }else{
        echo '<div class="col-md-12"><h3>No products found with keyword "'.$keyword.'"</h3></div>';
    }
}

function sort_product_search($keyword, $sort){
    include('connect.php');
	
	if($sort){
		
		if($sort == "Price: Low to High" && !$keyword){
			$query = "select * from products where status = 'active' order by price asc ";
		}elseif($sort == "Price: High to Low" && !$keyword){
			$query = "select * from products where status = 'active' order by price desc ";
		}elseif($sort == "Alphabetically: A-Z" && !$keyword){
			$query = "select * from products where status = 'active' order by name asc ";
		}elseif($sort == "Alphabetically: Z-A" && !$keyword){
			$query = "select * from products where status = 'active' order by name desc ";
		}elseif($sort == "Date: Old to New" && !$keyword){
			$query = "select * from products where status = 'active' order by id asc ";
		}elseif($sort == "Date: New to Old" && !$keyword){
			$query = "select * from products where status = 'active' order by id desc ";
		}elseif($sort == "Alphabetically: A-Z" && $keyword){
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by name asc ";
		}elseif($sort == "Alphabetically: Z-A" && $keyword){
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by name desc ";
		}elseif($sort == "Date: Old to New" && $keyword){
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by id asc ";
		}elseif($sort == "Date: New to Old" && $keyword){
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by id desc ";
		}elseif($sort == "Price: Low to High" && $keyword){
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by price asc ";
		}elseif($sort == "Price: High to Low" && $keyword){
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by price desc ";
		}
			
	}else{
		
		if(!$keyword){
			$query = "select * from products where status = 'active' order by id desc";
		}else{
			$query = "select * from products where name like '%$keyword%' and status = 'active' order by id desc";
		}	
		
	}
        
    $result = mysqli_query($connect, $query);
    $num = mysqli_num_rows($result);
    
    echo '';
    if($num > 0){
        for($a=0; $a<$num; $a++){

            $row = mysqli_fetch_assoc($result);
            echo '
            
            <div class="col-md-4 col-6 items">

                    <div class="item" align="center">

                        <div class="image"><a href="product-details?pid='.base64_encode($row['id']).'"><img src="uploads/products/'.$row['image'].'" class="img-fluid"></a></div>

                        <div class="name"><a href="product-details?pid='.base64_encode($row['id']).'">'.$row['name'].'</a></div>

                        <div class="price">&#8358;'.number_format($row['price']).'</div>

                        <div class="category"><a href="categories?cid='.base64_encode($row['category']).'">'.$row['category_name'].'</a></div>

                        <input type="hidden">

                    </div>

                </div>';
        }
    }else{
        echo '<div class="col-md-12"><h3>No products found with keyword "'.$keyword.'"</h3></div>';
    }
}

function banner_images(){
    include('connect.php');
    $query = "select * from banner_images order by id asc";
    $run = mysqli_query($connect, $query);
    $num = mysqli_num_rows($run);
    $initial = mysqli_fetch_assoc($run);
    
    if($num > 0){
        echo '
        <div id="slider" class="slider">

            <div class="slider-item active" style="background-image: url(\'uploads/banners/'.$initial['name'].'\')">

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                            <h3>'.$initial['heading'].'</h3><br>
                            
                            '.$initial['caption'].'

                        </div>

                    </div>

                </div>

            </div>'; 
        
        for($i=1;$i<$num; $i++){
            $loopit = mysqli_fetch_assoc($run);
        
            echo '

            <div class="slider-item" style="background-image: url(\'uploads/banners/'.$loopit['name'].'\')">

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                            <h3>'.$loopit['heading'].'</h3><br>
                            
                            '.$loopit['caption'].'

                        </div>

                    </div>

                </div>

            </div>
            
            ' ;
        }
            
        echo '

            <!--

            <div class="slider-panel">

            <div class="slider-panel__navigation">

            <i class="fas fa-circle indicator active" data-slide-to="0"></i>

            <i class="far fa-circle indicator" data-slide-to="1"></i>

            <i class="far fa-circle indicator" data-slide-to="2"></i>

            <i class="far fa-circle indicator" data-slide-to="3"></i>

            <i class="far fa-circle indicator" data-slide-to="4"></i>

            </div>

            <div class="slider-panel__controls">

            <i class="far fa-arrow-alt-circle-left" id="previous"></i>

            <i class="far fa-pause-circle" id="pause-play"></i>

            <i class="far fa-arrow-alt-circle-right" id="next"></i>

            </div>

            </div>

            -->

        </div>
        
        <script src="dist/js/carmain.js"></script>
        
        ';
    }
}

function social_media(){
    include('connect.php');
    $twitter = mysqli_query($connect, "select * from social_media where name = 'twitter'"); 
    $tr = mysqli_fetch_assoc($twitter);
    $facebook = mysqli_query($connect, "select * from social_media where name = 'facebook'"); 
    $fr = mysqli_fetch_assoc($facebook);
    $instagram = mysqli_query($connect, "select * from social_media where name = 'instagram'"); 
    $ir = mysqli_fetch_assoc($instagram);
    
    echo '
    
                <div class="col-2"><a href="'.$ir['link'].'"><i class="fab fa-2x fa-instagram"></i></a> </div>
                
                <div class="col-2"><a href="'.$fr['link'].'"><i class="fab fa-2x fa-facebook"></i></a></div>
                
                <div class="col-2"><a href="'.$tr['link'].'"><i class="fab fa-2x fa-twitter"></i></a></div>
                ';
    
}

function contact_methods(){
    include('connect.php');
    $phone = mysqli_query($connect, "select * from social_media where name = 'phone'"); 
    $pr = mysqli_fetch_assoc($phone);
    $whatsapp = mysqli_query($connect, "select * from social_media where name = 'whatsapp'"); 
    $wr = mysqli_fetch_assoc($whatsapp);
    
    echo '
                
                <div class="col-2"><a href="https://api.whatsapp.com/send?phone='.$wr['link'].'&text="><i class="fab fa-2x fa-whatsapp"></i></a></div>
                
                <div class="col-2"><a href="tel:'.$pr['link'].'"><i class="fa fa-2x fa-phone"></i></a></div>
                ';
    
}

?>