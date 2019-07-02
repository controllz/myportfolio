<?php  
 $connect = mysqli_connect("localhost", "ja162783", "Vintage-30", "godesignpro");  
 $output = '';  
 $sql = "SELECT * FROM jobs ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="11.11%">Id</th>  
                     <th width="11.11%">Date Applied</th>  
                     <th width="11.11">Position</th>  
																					<th width="11.11%">Company</th>  
                     <th width="11.11%">Location</th>  
																					<th width="11.11%">Status</th>  
                     <th width="11.11%">Application Viewed</th>  
																					<th width="11.11%">Scheduled Interview</th>   
                     <th width="11.11%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  //if($rows > 10)
	  //{
		  //$delete_records = $rows - 10;
		 // $delete_sql = "DELETE FROM jobs LIMIT $delete_records";
		  //mysqli_query($connect, $delete_sql);
	 // }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
																
                     <td>'.$row["id"].'</td>  
                     <td class="date" data-id1="'.$row["id"].'" 
																					contenteditable>'.$row["date"].'</td>  
																					
                     <td class="position" data-id2="'.$row["id"].'" contenteditable>'.$row["position"].'</td>  
																					
																					<td class="company" data-id3="'.$row["id"].'" contenteditable>'.$row["company"].'</td>
																																										
																					<td class="location" data-id4="'.$row["id"].'" contenteditable>'.$row["location"].'</td>  
																					
																					<td class="status" data-id5="'.$row["id"].'" 
																					contenteditable>'.$row["status"].'</td>  
																					
																					<td class="viewed" data-id6="'.$row["id"].'" 
																					contenteditable>'.$row["viewed"].'</td>  
																					
																					<td class="interviewed" data-id7="'.$row["id"].'" contenteditable>'.$row["interviewed"].'</td>  
																					
                     <td><button type="button" name="delete_btn" data-id8="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="date" contenteditable></td>  
                <td id="position" contenteditable></td>  
																<td id="company" contenteditable></td>  
                <td id="location" contenteditable></td>  
                <td id="status" contenteditable></td>  
                <td id="viewed" contenteditable></td>  
                <td id="interviewed" contenteditable></td>  

                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
                <td id="date" contenteditable></td>  
                <td id="position" contenteditable></td>  
																<td id="company" contenteditable></td>  
                <td id="location" contenteditable></td>  
                <td id="status" contenteditable></td>  
                <td id="viewed" contenteditable></td>  
                <td id="interviewed" contenteditable></td>  					
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>