<?php
session_start();
	if(isset($_GET['action']) && $_GET['action']=="add"){
		$id=intval($_GET['id']);
		
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']++;
		
		}else{
			$sql_s="SELECT * FROM product
			where product_id=['$id']";
			$query_s=mysql_query($sql_s);
			
			if(mysql_num_rows($query_s)!=0){
				
				
				}else{
				
				$message="This product is it's invalid!";
			}
			
	}
?>
<?php include('views/includes/header.php'); 
		 require('config/db.php'); ?>
<body>
<?php 
	if(isset($message)){
		echo "<h2>$message</h2>";
		}
		?>
   

    <div class="container">

        <div class="row">

                    <?php include('views/includes/shopNav.php'); ?>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="img/strawberry.jpg" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#">Strawberry Macaron</a>
                        </h4>
                        <p>Made from the freshest strawberry. </p>
                        <p>Want to make these reviews work? Check out <strong><a href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this building a review system tutorial</a></strong> over at maxoffsky.com!</p>
                        <p>Deliciously fluffy and soft, these cookies will made anyone's day.</p> <a href="menu.php?page=products&action=add&id=<?php echo $row['product_id']; ?>" class="btn btn-success">Add to cart</a> <p class="pull-right">3 reviews</p>
                    </div>
                   
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

      <?php include('views/includes/footer.php'); ?>
    <!-- /.container -->

    <!-- JavaScript -->
   	
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
