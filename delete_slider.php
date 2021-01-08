<?php
	include ('connection.php');
	$id=$_GET['id'];
	$Query="DELETE SLIDER_IMG FROM slider_img where ID=".$id." ";

	if($connection->query($Query))
	{
		header('location:Home.php?message="Deleted Successfully"');
	}
	else
	{
		header('location:Home.php?message="Somthing went Wrong"');

	}
?>