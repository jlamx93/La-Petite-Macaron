<?php
require('config/db.php');//require the database configuration
		$myConnection = mysql_connect(DB_HOST,DB_USER,DB_PASS);
		$myDatabase = mysql_select_db(DB_NAME);
		//if submitted add another to quantity
		if(isset($_POST['submit'])){
			foreach ($_POST['quantity'] as $key => $val){
				
				if($val == 0){
					unset($_SESSION['cart'][$key]);
				
					}else{
						$_SESSION['cart'][$key]['quantity']=$val;
				}
			}
			
			
			}
			//end of adding
	if(isset($_GET['action']) && $_GET['action']=='add'){//adding and add function
		
		$id=intval($_GET['id']);//get the product id
		
		if(isset($_SESSION['cart'][$id])){//setting the session for the cart with the product id
			$_SESSION['cart'][$id]['quantity']++;//session cart wit hthe product id and quantity
		
		}else{
		
			$sql_s="SELECT * FROM product
			WHERE product_id = {$id}";//making product_id from database into a variable $id
			$ques=mysql_query($sql_s)or die('SQL Error :: '.mysql_error());
			
				if(mysql_num_rows($ques) != 0){
				
				$row_s  =mysql_fetch_array($ques);
				
				$_SESSION['cart'][$row_s['product_id']]=array(
					"quantity" =>1,
					"price" => $row_s['price']
				);
				}else{
				
				$message="This product is it's invalid!";
				}
			
		}
	}

include('views/includes/header.php'); 
?>
<body>

  <?php

 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .=$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }

?>

    <div class="container">

        <div class="row">
<div class="box">
           <?php include('views/includes/shopNav.php');?>
		
            <div class="col-md-9">

                <div class="row carousel-holder">
				<?php 
	if(isset($message)){
		echo "<h2>$message</h2>";
		}
		?>
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/macarons1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/macarons1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/macarons1.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="row">
<?php 
	
	$products = mysql_query("SELECT * FROM product ORDER BY product_id ASC");if(!$products){
	die("Database connection failed: ".mysql_error());
	}
	
	while($row=mysql_fetch_assoc($products)){
	$product_id = $row['product_id'];
	$product_path = $row['img'];
	$product_name = $row['name'];
	$product_description = $row['description'];
	$product_price = $row['price'];
	$product_cat =  $row['category'];

	
	if( "/mac/menu.php?".$product_cat == $_SERVER["REQUEST_URI"] && $product_cat == 'new'){//checking if the url is equal to the category for filtering
	?>
 
                
<form action="menu.php?<?php echo $product_cat; ?>"  method="post">
                    <div class="col-sm-5 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="photos/<?php echo $product_path; ?>" >
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $product_price; ?></h4>
                                <h4><?php echo $product_name; ?></h4>
                                <p><?php echo $product_description; ?></p>
                                <p class="pull-right">1 per order|Qty: <input type="text" name="quantity[<?php echo $row['product_id']; ?>]" size="2" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'];?>" /> <button type="submit" name="submit" class="btn btn-success">Add to cart</button></p> 
                                
                            </div>
                         
                        </div>
                    </div></form>
                   
             
                    <?php }else if( "/mac/menu.php?".$product_cat == $_SERVER["REQUEST_URI"] && $product_cat == 'fruit'){
	?>
 
                
<form action="menu.php?<?php echo $product_cat?>"  method="post">
                    <div class="col-sm-5 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="photos/<?php echo $product_path; ?>" >
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $product_price; ?></h4>
                                <h4><?php echo $product_name; ?></h4>
                                <p><?php echo $product_description; ?></p>
                                <p class="pull-right">1 per order|Qty: <input type="text" name="quantity[<?php echo $row['product_id']; ?>]" size="2" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'];?>" /> <button type="submit" name="submit" class="btn btn-success">Add to cart</button></p> 
                                
                            </div>
                         
                        </div>
                    </div></form>
                   
             
                    <?php }else if( "/mac/menu.php?".$product_cat == $_SERVER["REQUEST_URI"] && $product_cat == 'special'){
	?>
 
                
<form action="menu.php?<?php echo $product_cat?>"  method="post">
                    <div class="col-sm-5 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="photos/<?php echo $product_path; ?>" >
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $product_price; ?></h4>
                                <h4><?php echo $product_name; ?></h4>
                                <p><?php echo $product_description; ?></p>
                                <p class="pull-right">1 per order|Qty: <input type="text" name="quantity[<?php echo $row['product_id']; ?>]" size="2" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'];?>" /> <button type="submit" name="submit" class="btn btn-success">Add to cart</button></p> 
                                
                            </div>
                         
                        </div>
                    </div></form>
                   
             
                    <?php }else if( "/mac/menu.php?page=products" == $_SERVER["REQUEST_URI"] || "/mac/menu.php" == $_SERVER["REQUEST_URI"] ){
	?>
 
                
<form action="menu.php?page=products"  method="post">
                    <div class="col-sm-5 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="photos/<?php echo $product_path; ?>" >
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $product_price; ?></h4>
                                <h4><?php echo $product_name; ?></h4>
                                <p><?php echo $product_description; ?></p>
                                <p class="pull-right">1 per order|Qty: <input type="text" name="quantity[<?php echo $row['product_id']; ?>]" size="2" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'];?>" /> <button type="submit" name="submit" class="btn btn-success">Add to cart</button></p> 
                                
                            </div>
                         
                        </div>
                    </div></form>
                   
             
                    <?php }//close If statement
					?>
                    
					<?php
	}//close while loop?>
                    
</div>
    </div>
    <!-- /.container -->
</div></div></div>

        <hr>
<?php include('views/includes/footer.php'); ?>
            

    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
