<?php
session_start(); 
if(isset($_GET['page'])){//will get variable from array pages
	$pages=array("products","cart");//the items in the array
	
	if(in_array($_GET['page'], $pages)) {
		
		$_page=$_GET['page'];
		
		}else{
			$_page="products"; 
			
			}
	}else{
		$_page="products"; 
		}
?>
<?php require($_page . ".php"); ?>