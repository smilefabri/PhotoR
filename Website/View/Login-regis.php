
<?php

$list_Img = array('../media/images/RiverFall.jpg','../media/images/desert.jpg','../media/images/SeaSad.jpg');


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/style-login.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <link rel="icon" href="../media/Logo/Logo_small.png">
</head>
<style>
		body{
		background-image: url(<?php echo $list_Img[random_int(0,2)] ?>);
	}
</style>
<body>

  <div class ="opacity" ></div>
  
<div class="container" id="container">
	<div class="form-container sign-up-container" style="overflow: auto;">
		<form action="/PhotoR/Website/php/register.php"  method="post">
      
			<h1>Create Account</h1>


		<input type="text" name="name" placeholder="Name" required>
		<input type="text" name="lastname" placeholder="lastName" required>
		<input type="email" name="email" placeholder="Email"  required/>
		<input type="date" name="birthday" placeholder="Date Birthday" required>
		<input type="text" name="nickname" placeholder="nickname" required>
		<input style="margin-bottom: 10px;" type="password" name="password" placeholder="Password" required>
		<div style="width: 90%;display: flex; align-items:center;margin-bottom: 2px; margin-top:10px">
		<input style="margin: 0; padding:0; width:auto;margin-right:20px;" type="checkbox" name="accetto le condizioni " id="accetto le condizioni sulla privacy" required>
		<label for="checkbox" >accetto le condizioni sulla privacy</label>
		</div>


        <div style="width: 90%;display: flex; align-items:center;text-align:left;margin-bottom: 10px;margin-top:5px">
		
		<input style="margin: 0; padding:0; width:auto;margin-right:20px"  type="checkbox" name="accetto le condizioni " id="accetto le condizioni sulla privacy" required>
		<label >ho più di 16 anni</label>
		
		</div>

			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form  action="/PhotoR/Website/php/login.php"  method="post">
      <img width="90px" height="90px" style="margin-bottom: 20px;" src="../media/Logo/Logo_small.png" alt="" srcset="">
			<h1>Sign in</h1>

			<input type="email" name="email" placeholder="Email" required />
			<input type="password" name="password" placeholder="Password" required />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>