<?php  
	$connect = mysqli_connect("localhost", "ja162783", "Vintage-30", "godesignpro");
	$sql = "DELETE FROM jobs WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>