<?php 
	include('functions.php');
	include('server.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Barkner | Home</title>
	<!--materialize cdn-->

	<!--jquery cdn-->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>
	<!--stylesheet-->
	<meta name="desription" content="Responsive, object oriented web design and development.">
				<meta name="keywords" content="web design, web development, orlando, Florida, ucf, html, coding, css, php, javascript, ajax, json, jason butts">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="styles.css">
	
	<script type='text/javascript' src='gif.js'></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
	<!--icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<nav>
		<div class="nav-wrapper">
			<img src="images/logo1.png" class="logo">
		</div>
	</nav>

	<div class="header">
		<h2>Welcome To Your Barkner Profile</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: #8d9c61; font-family: 'Roboto', sans-serif; font-weight: bold; text-decoration: none;">Logout</a>
						<br>
						
						<a href="http://www.godesignpro.com">Back to GODESIGNPRO</a>

						
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
	<!--dog API-->
		<div id="results"><img id='imageWrapper' src="https://dog.ceo/api/img/beagle/n02088364_12178.jpg" /></div>
		<div class="container">

			<div class="row">
					
				<div class="row">
						
					<div class="input-field col s12">
					
						<div id="response"></div>
					
						<button id='like' class="fa fa-thumbs-up""button_api" type="submit" name="action"></button>
																
						<button id='dislike' class="fa fa-thumbs-down""button_api" type="submit" name="action"></button>
						
						<button id="randomDog" class="fa fa-paw""button_api" type="submit" name="action"></button>
						
						
						
					  
					</div>
					
				</div>
				
			</div>
			
		</div>


	<!--comments-->
	
	<div class="wrapper">
	<h1>Like the app? Tell us what you think!</h1>
  	<?php echo $comments; ?>
  	<form class="comment_form">
      <div>
        <label for="name">Name:</label>
      	<input type="text" name="name" id="name">
      </div>
      <div>
      	<label for="comment">Comment:</label>
      	<textarea name="comment" id="comment" cols="30" rows="5"></textarea>
      </div>
      <button type="button" id="submit_btn" class="btn">POST</button>
      <button type="button" id="update_btn" class="btn">UPDATE</button>
  	</form>
  </div>
	
</body>
</html>
<!-- Add JQuery -->
<script src="scripts.js"></script>