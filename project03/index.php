<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>SK8 YOUR ST8</title>
      <meta name="author" content="Jason Butts" />
      <meta name="description" content="pagePiling.js plugin by Jason Butts." />
      <!-- change v keywords v after deciding site content-->
      <meta name="desription" content="Responsive, object oriented web design and development.">
				<meta name="keywords" content="web design, web development, orlando, Florida, ucf, html, coding, css, php, javascript, ajax, json, jason butts">
      <meta name="Resource-type" content="Document" />
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,700" />
      <link rel="stylesheet" type="text/css" href="jquery.pagepiling.css" />
      <link rel="stylesheet" type="text/css" href="examples.css" />
      <link rel="stylesheet" type="text/css" href="my_styles.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
      <script type="text/javascript" src="jquery.pagepiling.min.js"></script>
      <!-- ONY ANY AJAX EVENT-->
      <script>
         $(document).ready(function(){
             $(document).ajaxStart(function(){
                 $("#wait").css("display", "block");
             });
             $(document).ajaxComplete(function(){
                 $("#wait").css("display", "none");
             });
             $("button").click(function(){
                 $("#txt").html("demo_ajax_load.asp");
             });
         });
      </script>
      <!--END ONY ANY AJAX EVENT-->
      <!--PAGE PILER SCRIPT-->
      <script type="text/javascript">
         $(document).ready(function() {
            	$('#pagepiling').pagepiling({
            		menu: '#menu',
            		anchors: ['page1', 'page2', 'page3', 'page4'],
         	    sectionsColor: ['#bfda00', '#2c2c2c', '#2c2c2c', '#2c2c2c'],
         	    navigation: {
         	    	'position': 'right',
         	   		'tooltips': ['Home', 'Event Info', 'Sign Up', 'Roster']
         	   	},
         	   	afterRender: function(){
         			//playing the video
         			$('video').get(0).play();
         		}
         	});
            });
           
      </script>
      <!--END PAGE PILER SCRIPT-->
      <!-- PARK SORT SCRIPT-->
      <script>
         function showUser(str) {
             if (str == "") {
                 document.getElementById("txtHint").innerHTML = "";
                 return;
             } else { 
                 if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                 } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                 }
                 xmlhttp.onreadystatechange = function() {
                     if (this.readyState == 4 && this.status == 200) {
                         document.getElementById("txtHint").innerHTML = this.responseText;
                     }
                 };
                 xmlhttp.open("GET","getuser.php?q="+str,true);
                 xmlhttp.send();
             }
         }
         
         	
      </script>
      <!--END PARK SORT SCRIPT-->
   </head>
   <body>
      <div id="menu">
         <ul id="menu">
            <li data-menuanchor="page1" class="active"><a href="#page1">Home</a></li>
            <li data-menuanchor="page2"><a href="#page2">Event Info</a></li>
            <li data-menuanchor="page3"><a href="#page3">Sign up</a></li>
            <li data-menuanchor="page4"><a href="#page4">Skaters</a></li>
<a href="http://www.godesignpro.com">Back to GODESIGNPRO</a>
         </ul>
      </div>
      <!--loading div-->
      <!--end loading div-->
      <div id="pagepiling">
         <div class="section" id="section1">
            <video autoplay loop id="myVideo">
               <source src="imgs/city.mp4" type="video/mp4">
               <source src="imgs/city.webm" type="video/webm">
            </video>
			 
			
			 
			 
			 
            <div class="layer">
               <h1>:[SK8yourST8.com</h1>
            </div>
         </div>
         <div class="section" id="section2">
            <!--PARK SORT-->
            <div class="intro">
               <h1>:[Choose your park</h1>
               <div id="forms">
                  <p>
                  <form>
                     <select name="users" onchange="showUser(this.value)">
                        <option value="">Select a park:</option>
                        <option value="1">Downey Skatepark</option>
                        <option value="2">Metro</option>
                        <option value="3">Riverside Park</option>
                        <option value="4">The Skatepark of Tampa</option>
                        <option value="5">The Badlands</option>
                     </select>
                  </form>
                  <br>
                  <div id="txtHint">
                     <h3 align="center">CHOOSE THE PARK YOU WANT TO SKATE FOR EVENT INFO </h3>
                  </div>
                  <!--END PARK SORT-->
               </div>
            </div>
         </div>
         <div class="section" id="section3">
            <div class="intro">
               <h1>:[Sign up</h1>
               <!--db add delete begin code-->
               <div id="table">
                  <h3 align="center">ENTER FIRST AND LAST NAME IN GREEN BOXES AND CLICK THE ADD BUTTON</h3>
                  <br />  
                  <div id="live_data"></div>
               </div>
            </div>
            <script>  
               $(document).ready(function(){  
                    function fetch_data()  
                    {  
                         $.ajax({  
                              url:"select.php",  
                              method:"POST",  
                              success:function(data){  
                                   $('#live_data').html(data);  
                              }  
                         });  
                    }  
                    fetch_data();  
                    $(document).on('click', '#btn_add', function(){  
                         var first_name = $('#first_name').text();  
                         var last_name = $('#last_name').text();  
                         if(first_name == '')  
                         {  
                              alert("Enter First Name");  
                              return false;  
                         }  
                         if(last_name == '')  
                         {  
                              alert("Enter Last Name");  
                              return false;  
                         }  
                         $.ajax({  
                              url:"insert.php",  
                              method:"POST",  
                              data:{first_name:first_name, last_name:last_name},  
                              dataType:"text",  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   fetch_data();  
                              }  
                         })  
                    }); 
                
                    function edit_data(id, text, column_name)  
                    {  
                         $.ajax({  
                              url:"edit.php",  
                              method:"POST",  
                              data:{id:id, text:text, column_name:column_name}, 
                              dataType:"text",  
               		   /* 
                              success:function(data){  
                                   alert(data);  
                              }  */
                         });  
                    } 
                
                
                    $(document).on('blur', '.first_name', function(){  
                         var id = $(this).data("id1");  
                         var first_name = $(this).text();  
                         edit_data(id, first_name, "first_name");  
                    });  
                    $(document).on('blur', '.last_name', function(){  
                         var id = $(this).data("id2");  
                         var last_name = $(this).text();  
                         edit_data(id,last_name, "last_name");  
                    });  
                 
                
                    $(document).on('click', '.btn_delete', function(){  
                         var id=$(this).data("id3");  
                         if(confirm("Are you sure you want to delete this?"))  
                         {  
                              $.ajax({  
                                   url:"delete.php",  
                                   method:"POST",  
                                   data:{id:id},  
                                   dataType:"text",  
                                   success:function(data){  
                                        alert(data);  
                                        fetch_data();  
                                   }  
                              });  
                         }  
                    });  
               });  
            </script>
         </div>
         <!--db add delete end code-->
         <div class="section" id="section4">
            <div class="intro">
               <h1>:[Who's gonna be there?</h1>
               <!--GIF LOAD CODE-->
               <p id = "result">CLICK TO SEE WHO YOU'RE UP AGAINST</p>
               <button id = "grab-data">Get Data</button>
               <script>
                  $(function(){					
                  	
                  	$(document).ajaxStart(function(){	
                  		$("#grab-data").html('<img src="imgs/skate.gif">');	
                  	});
                  	
                  	$(document).ajaxComplete(function(){	
                  		$("#grab-data").text("Update Roster");	
                  	});			
                  	
                  	$("#grab-data").click(function(){
                  		//when user clicks the item with id "grab-data"...
                  		
                  		$.get("php-ajax.php", function(data,status){	
                  			$("#result").html(data);	
                  		});
                  	});
                  });
               </script>
            </div>
         </div>
      </div>
      <!--db add delete end code-->
   </body>
</html>