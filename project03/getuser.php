<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="my_styles.css" />
   </head>
   <body>
      <?php
         $q = intval($_GET['q']);
         
         $con = mysqli_connect("localhost", "ja162783", "Vintage-30", "godesignpro");
         if (!$con) {
             die('Could not connect: ' . mysqli_error($con));
         }
         
         mysqli_select_db($con,"ajax_demo");
         $sql="SELECT * FROM user2 WHERE id = '".$q."'";
         $result = mysqli_query($con,$sql);
         
         echo "<table>
         <tr>
         <th>Where?</th>
         <th>When?</th>
         <th>What time?</th>
         <th>Do I need a helmet?</th>
         
         </tr>";
         while($row = mysqli_fetch_array($result)) {
             echo "<tr>";
             echo "<td>" . $row['park'] . "</td>";
             echo "<td>" . $row['date'] . "</td>";
             echo "<td>" . $row['time'] . "</td>";
             echo "<td>" . $row['helmet'] . "</td>";
             echo "</tr>";
         }
         echo "</table>";
         mysqli_close($con);
         ?>
   </body>
</html>