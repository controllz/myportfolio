<?php  
 $connect = mysqli_connect("localhost", "ja162783", "Vintage-30", "godesignpro");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE tbl_sample SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 
 ?>