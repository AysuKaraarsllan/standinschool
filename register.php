





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login & Register Page</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="images/icons/favicon.ico" rel="icon" type="image/png">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet" type="text/css">
	<link href="vendor/animate/animate.css" rel="stylesheet" type="text/css">
	<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css">
	<link href="vendor/animsition/css/animsition.min.css" rel="stylesheet" type="text/css">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
	<link href="vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="css/util.css" rel="stylesheet" type="text/css">
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-sm " style="background: white;">
  <a class="navbar-brand" href="#">
  <img src="images/logo-aybu.png" alt="Logo" style="width:90px;">
 
  </a>
 <img src="images/logotext.gif" />
 <div style="display: inline-block; border-left: 1px solid #006690; height: 42px;
        vertical-align: top; margin: 15px 0 0 5px; padding: 0 10px;">
        <h1 style="font-size: 17px; color: #006690; margin: 8px 0;">
            MANAGEMENT INFORMATION SYSTEMS</h1>
    </div>
</nav>

	<div class="limiter">
	<div style="height:35px;background-color:#07a5c0;">
	

	</div>
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/photo1.png);"></div>
				
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a class="active" href="#" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<form action="giris.php" class="login100-form validate-form" id="login-form" method="post" name="login-form" role="form">
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Username</span> <input class="input100" name="kullanici_adi" id="mesaj" placeholder="Enter username" type="text"> <span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
							<span class="label-input100">Password</span> <input class="input100" name="sifre" id="mesaj" placeholder="Enter password" type="password"> <span class="focus-input100"></span>
						</div>
						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" name="remember" type="checkbox"> <label class="label-checkbox100" for="ckb1">Remember me</label>
							</div>
							<div>
								<a class="txt1" href="#">Forgot Password?</a>
							</div>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">Login</button>
						</div>
					</form>
					<form action="kayit.php" class="login100-form validate-form" id="register-form" method="post" name="register-form" role="form" style="display: none;">

						
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Username</span>

							 <input class="input100" id=" mesaj signup-username" name="kullanici_adi" placeholder="Enter username" type="text"> 
					
							 <span class="focus-input100">	 </span>
						</div>
						<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
							<span class="label-input100">Mail</span>
							 <input class="input100" id="mesaj signup-email" name="mail" placeholder="Enter e-mail" type="text">
							
							  <span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
							<span class="label-input100">Password</span> 

							<input class="input100" id=" mesaj signup-password" name="sifre" placeholder="Enter password" type="password">
                                
							 <span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">Register</button>
						</div>
					</form>
				</div>


			</div>
		</div>
	</div>
	
	
	
<footer id="footer-Section">
  
  <div class="footer-bottom-layout" style="background-color:#0a4650 !important">
    
    <div class="copyright-tag">Copyright © 2020 Ankara Yıldırım Beyazıt University. All Rights Reserved.</div>
  </div>
	</footer>
	




<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->




	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
	</script> 
	<script src="//code.jquery.com/jquery-1.11.1.min.js">
	</script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/main.js">
	</script> 
	 
	<script src="js/script.js">
	</script> 
	
	
	<script>
	   $(function() {

	   $('#login-form-link').click(function(e) {
	       $("#login-form").delay(100).fadeIn(100);
	       $("#register-form").fadeOut(100);
	       $('#register-form-link').removeClass('active');
	       $(this).addClass('active');
	       e.preventDefault();
	   });
	   $('#register-form-link').click(function(e) {
	       $("#register-form").delay(100).fadeIn(100);
	       $("#login-form").fadeOut(100);
	       $('#login-form-link').removeClass('active');
	       $(this).addClass('active');
	       e.preventDefault();
	   });

	});

	   
	</script>
</body>
</html>