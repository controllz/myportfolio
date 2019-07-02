<?php  
$connect = mysqli_connect("localhost", "ja162783", "Vintage-30", "godesignpro");
$sql = "INSERT INTO jobs(date, position, company, location, status, viewed, interviewed) VALUES('".$_POST["date"]."', '".$_POST["position"]."', '".$_POST["company"]."', '".$_POST["location"]."', '".$_POST["status"]."', '".$_POST["viewed"]."', '".$_POST["interviewed"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>