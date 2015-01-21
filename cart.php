<?php
include("views/includes/header.php"); 
require('config/db.php');//require the database configuration
		$myConnection = mysql_connect(DB_HOST,DB_USER,DB_PASS);
		$myDatabase = mysql_select_db(DB_NAME);
		if(isset($_POST['submit'])){
			foreach ($_POST['quantity'] as $key => $val){
				
				if($val == 0){
					unset($_SESSION['cart'][$key]);
				
					}else{
						$_SESSION['cart'][$key]['quantity']=$val;
				}
			}
			
			
			}
		
		
		
		?>
        <style type="text/css">
		tr{
			width:150px;
			
			}
			th{
				padding:10px;
				background-color:pink;
				}
        
        
        </style>
        <body>
        <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
<h2 class="intro-text text-center">View Cart</h2>
</div>
<?php
$products = mysql_query("SELECT * FROM product ORDER BY product_id ASC");if(!$products){
	die("Database connection failed: ".mysql_error());
	}

	$row=mysql_fetch_assoc($products);
	$product_id = $row['product_id'];
	$product_path = $row['img'];
	$product_name = $row['name'];
	$product_description = $row['description'];
	$product_price = $row['price'];
	?>
 <div class="col-md-4">
                    <img src='photos/<?php echo $product_path; ?>'>
                </div><?php  ?>
                <div class="col-md-6">
               
       
<form method="post" action="menu.php?page=cart">
<table>
<tr>
	<th>Name</th>
	<th>Quantity</th>
	<th>Price</th>
	<th>Subtotal</th>
</tr>
<?php
 if($_SESSION['cart'] > 0){
	$sql= "SELECT * FROM product WHERE product_id IN(";
	
	foreach($_SESSION['cart'] as $id => $value ) {
		$sql.=$id. ",";
		
	}
	$sql=substr($sql, 0 , -1). ") ORDER BY name ASC";
	$query=mysql_query($sql)or die('SQL Error :: '.mysql_error());
	$totalprice=0;
	$cartnow =0; 
	while($row=mysql_fetch_array($query)){
		$subtotal=$_SESSION['cart'][$row['product_id']]['quantity'] * $row['price'];
		$totalprice+=$subtotal;
		 ?>
         <tr>
         <td><?php echo $row['name']; ?></td>
         <td><input type="text" name="quantity[<?php echo $row['product_id']; ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'];?>" /></td>
         <td><?php echo "$".$row['price']?></td>
         <td><?php echo "$".$_SESSION['cart'][$row['product_id']]['quantity']*$row['price']?></td>
         </tr>
         
         <?php   
			
		 }
		 ?>
         <tr>
         <td>Total Price: <?php echo "$".$totalprice;}else{
			 echo "There's nothing to checkout";}?></td>
         </tr>
</table>
<br />
<button type="submit" name="submit">Update Cart</button>
<?php  ;
?>
</form></div>
<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="jlamx93@yahoo.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="item_name" value="Macarons">
<input type="hidden" name="amount" value="<?php echo $totalprice;?>">
<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>

</div></div></div>
<?php include("views/includes/footer.php"); ?>
</body>