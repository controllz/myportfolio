<?php  
$connect = mysqli_connect("localhost", "ja162783", "Vintage-30", "godesignpro");  
$sql = "INSERT INTO my_table(first_name, last_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 