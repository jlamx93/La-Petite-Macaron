<?php


if (!empty($_FILES["file"]["type"]) && isset($_POST['submit'])) {
	$product_name = $_POST['prodname'];
	$product_description = $_POST['proddescription'];
	$product_price = $_POST['prodprice'];
	$product_category = $_POST['prodcat'];
	
require('config/db.php');
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 2000000)
		&& in_array($extension, $allowedExts))
		
	{
		if ($_FILES["file"]["error"] > 0)
		{
			
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else {
			
			$fileName = rand(0, 300000000) . rand(0, 300000000) . "." . $temp[1];
			if (file_exists("photos/" . $fileName))
			{
				echo $fileName . " already exists.";
				echo $fileName;
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "photos/" . $fileName);

	 $sql = "INSERT INTO product (img, name, description, price, category)
                            VALUES('" . $fileName . "','" . $product_name . "', '" . $product_description . "', '" . $product_price . "', '" . $product_category . "');";
                    $query_new_user_insert = $db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        echo "Your account has been created successfully.";
                    } else {
                        echo "Sorry, you failed. Please go back and try again.";
                    }
              
	
				
				header("Location: ../mac/menu.php");
    
    
    
				
			}  
		}
	}
}
?>