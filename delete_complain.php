<?php
	include('connection.php');
	$complian_id = $_GET['id'];
	$Query = "DELETE FROM complains WHERE ID=".$complian_id." ";
	if($connection->query($Query))
	{
		header('Location:Complains.php?message="Deleted Successfully"');
	}
	else
	{
		header('Location:Home.php?message="Something Went Wrong"');
	}
?>