<?php include('includes/header.php'); ?>
  <body>


    <div class="container">
    <div class="box">
    <?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
        }
    }
}
?>
    <form class="form-signin" form method="post" action="index.php" name="loginform">
                <h3>Sign In</h3>
            <div class="form-group">
               <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
            </div>
            <div class="form-group">
             <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
            </div>
            <button type="submit"  formaction="index.php" name="login" value="Log in">Sign in</button>
          </form>
          <hr>
   <form method="post" action="register.php" name="registerform"
    form role="form" class="form-signin"> <h3>Sign Up</h3>
    <?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
			$text = ( '<div class="errorMessage">');
			$endText = ('</div>');
          echo  $text, $error,$endText;  }
		  ?>
    <hr>
    <?php
        }?>
<?php
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            $textGood = ( '<div class="goodMessage">');$endText = ('</div>');
			echo $textGood,$message,$endText;
		}
	}
        ?>
    <div class="form-group">
    <label for="exampleInputFname1"> First Name</label>
    <input class="form-control" placeholder="Enter First name"  name="first_name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputLname1">Last Name</label>
    <input type="text" name="last_name" class="form-control" id="exampleInputLname1" placeholder="Enter Last Name" required>
  </div>
  <div class="form-group">
   <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
    <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
  </div>
  <div class="form-group">
    <label for="login_input_email">User's email</label>
    <input id="login_input_email" class="form-control" type="email" name="user_email" required />
  </div>
  <div class="form-group">
  <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
  </div>
  <div class="form-group">
    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <input type="submit"  name="register" value="Register" /></form> </div>
  
	
	
	
        
  <?php

}
?>


     

    

     </div></div>

   <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script> 
      <script src="docs-assets/js/holder.js"></script>
  </body>
</html>


