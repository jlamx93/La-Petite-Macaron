<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Le Petite Macaron</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Add custom CSS here -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../mac/css/business-casual.css" rel="stylesheet">
<link href="../mac/css/shop-homepage.css" rel="stylesheet">
<link href="../mac/css/shop-item.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../mac/js/bootstrap.min.js"></script>
</head>

<body>
<div class="brandBg">
  <div class="brand"><div class="logo"><img src="../mac/img/logoMac.png" class="logoMac"/><div class="logotext">
  <?php 
 if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
 
 echo "<p style='display:inline'> ". 'Hello' . " " . ucfirst($_SESSION['first_name']) . "</p>" . " ";
 	 	if ($_SESSION['admin'] == "imamthebest") 
		{
 		 echo '<a  data-title=" Share" class="fa fa" data-toggle="modal" data-target="#products" style="cursor:pointer">Product</a>';
 		 }
		 
  }else{}
  ?></div>
  
 </div>
  </div>
</div>
<div class="modal fade" id="products" >
      <div class="modal-dialog">
	    <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	            <h4 class="modal-title" id="Heading">Products</h4>
	          </div>
	          <div class="modal-body">
                <form class="form-signin" method="post" action="workimage.php" enctype="multipart/form-data">
				Browse:<input type="file" name="file">
            <div class="form-group">
               <label>Name</label>
    <input id="login_input_username" class="login_input" type="text" name="prodname"/>
            </div>
            <div class="form-group">
             <label>Description</label>
    <textarea id="login_input_text" class="login_input" type="textarea" name="proddescription" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
             <label >Price</label>
    <input id="login_input_password" class="login_input" type="text" name="prodprice" autocomplete="off" />
            </div>
             <div class="form-group">
             <label >Category</label>
    <input id="login_input_password" class="login_input" type="text" name="prodcat" autocomplete="off" />
            </div>
            <button type="submit" name="submit">Add Product</button>
          </form>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div></div></div>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="includes/index.html">Le Petite Macaron</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a> </li>
        <li><a href="about.php">About</a> </li>
        <li><a href="menu.php">Menu</a> </li>
        <li><a href="contact.php">Contact</a> </li>
        <li> <?php
  if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
 
 echo '<a href="index.php?logout">Logout</a>';
  }else{
	  echo '<a href="register.php">Sign In</a>';
	}
  ?></li>
  <li><a href="menu.php?page=cart" ><i class="fa fa-shopping-cart"></i>(<?php
  if(isset($_SESSION['cart'])){
   $sum = 0;
		 foreach($_SESSION['cart']as $value) {
			 $sum += $value['quantity'];
  
}//end of foreach
 echo $sum;
}else{
		
		}
?>)</a>

   <?php
 
  
  

	
  ?> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>

