<?php
	include ('connection.php');
	$product_id=$_GET['id'];
	$Query="DELETE FROM product_data where PRODUCT_ID=".$product_id." ";

	if($connection->query($Query))
	{
		header('location:Home.php?message="Product Deleted Successfully"');
	}
	else
	{
		header('location:Home.php?message="Somthing went wrong"');

	}
?>