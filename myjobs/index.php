<html>  
    <head>  
        <title>Applied Jobs</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />

			<div class="table-responsive"> 
				                     <img class="center-block" src="img/logojobs.png" alt="img/logosmall.png" class="responsive">

				<h3 align="center">Open Job Applications - <a href="http://www.godesignpro.com">Take Me Back to GODESIGNPRO.COM</a></h3><br />
				<span id="result"></span>
				<div id="live_data"></div>                 
			</div>  
		</div>
    </body>  
</html>  
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
        var date = $('#date').text();  
        var position = $('#position').text();  
        var company = $('#company').text();  
        var location = $('#location').text();  
        var status = $('#status').text();  
        var viewed = $('#viewed').text();  
        var interviewed = $('#interviewed').text();  

        if(date == '')  
        {  
            alert("Enter Date");  
            return false;  
        }  
        if(position == '')  
        {  
            alert("Enter Position");  
            return false;  
        }  
        if(company == '')  
        {  
            alert("Enter Company");  
            return false;  
        }  
				   	if(location == '')  
        {  
            alert("Enter Location");  
            return false;  
        }  
				   	if(status == '')  
        {  
            alert("Enter Status");  
            return false;  
        }  
				   	if(viewed == '')  
        {  
            alert("Enter Viewed");  
            return false;  
        }  
					   if(interviewed == '')  
        {  
            alert("Enter Interviewed");  
            return false;  
        }  
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{date:date, position:position, company:company, location:location, status:status, viewed:viewed, interviewed:interviewed },  
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
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.date', function(){  
        var id = $(this).data("id1");  
        var date = $(this).text();  
        edit_data(id, date, "date");  
    });  
    $(document).on('blur', '.position', function(){  
        var id = $(this).data("id2");  
        var position = $(this).text();  
        edit_data(id,position, "position");  
    }); 
	$(document).on('blur', '.company', function(){  
        var id = $(this).data("id3");  
        var company = $(this).text();  
        edit_data(id,company, "company");  
    }); 
		$(document).on('blur', '.location', function(){  
        var id = $(this).data("id4");  
        var location = $(this).text();  
        edit_data(id,location, "location");  
    }); 
	$(document).on('blur', '.status', function(){  
        var id = $(this).data("id5");  
        var status = $(this).text();  
        edit_data(id,status, "status");  
    }); 
		$(document).on('blur', '.viewed', function(){  
        var id = $(this).data("id6");  
        var viewed = $(this).text();  
        edit_data(id,viewed, "viewed");  
    }); 
	$(document).on('blur', '.interviewed', function(){  
        var id = $(this).data("id7");  
        var interviewed = $(this).text();  
        edit_data(id,interviewed, "interviewed");  
    }); 
	
	
	
	
	
	
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id8");  
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