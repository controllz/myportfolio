<?php  
   $connect = mysqli_connect("localhost",
							 "ja162783", 
							 "Vintage-30", 
							 "godesignpro");  
   $output = '';  
   $sql = "SELECT * FROM my_table ORDER BY id ASC";  
   $result = mysqli_query($connect, $sql);  
   $output .= '  
        <div id="table">  
             <table class="table table-bordered">  
                  <tr>  
                        
                       <th width="40%">First Name</th>  
                       <th width="40%">Last Name</th>  
                       <th width="10%">Add/Delete</th>  
   
                  </tr>';  
   if(mysqli_num_rows($result) > 0)  
   {  
        while($row = mysqli_fetch_array($result))  
        {  
             $output .= '  
                  <tr>  
                       
                       <td class="first_name" data-id1="'.$row["id"].'">'.$row["first_name"].'</td> 
   				 
                       <td class="last_name" data-id2="'.$row["id"].'">'.$row["last_name"].'</td>  
   				 
                       <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td> 
   				 
                  </tr>  
             ';  
        }  
        
     
   
    
   
   }
   $output .= '  
   	   <tr>  
                   
   			
                  <td id="first_name" contenteditable></td>  
                  <td id="last_name" contenteditable></td>  
                  <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
             </tr>  
        ';  
     
   $output .= '</table>  
        </div>'; 
   echo $output;  
   ?>