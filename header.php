
<?php include 'access.php'; 

$setting = $db->prepare("SELECT * FROM setting");
$setting-> execute();
$setting_retrieve = $setting->fetch (PDO::FETCH_ASSOC);




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">	
	<meta name="description" content="<?php echo $setting_retrieve["site_desc"]; ?>">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/blog.css" rel="stylesheet" type="text/css">
	
</head>
<body>

	<header>

	<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #1E2A39;padding: 0.1rem 3rem !important;"  >

		
		<button aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarTogglerDemo03" data-toggle="collapse" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>

		 <a class="navbar-brand" href="index1.php">
		 <img src="images/<?php echo $setting_retrieve["site_logo"]; ?>" alt="Aybu-SIS" style="width: 50px;display: block;">
		 </a>
		<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
			<input aria-label="Search" name="search" class="form-control mr-sm-2" placeholder="Search" type="search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">

		<ul class="navbar-nav mr-auto mt-2 mt-lg-0 " style="margin-left: auto !important; margin-right: 0px !important;">
				
				<li class="nav-item active">
					<a class="nav-link " href="index1.php" >HOME PAGE<span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item" >	<a class="nav-link " href="user.php?id=<?php echo  $_SESSION['userID'];?>" style="color:#ced2d1 !important; font-family: 'Montserrat', sans-serif;
  text-transform: uppercase !important;font-size:13px!important;font-weight: 500; ">Profile </a>
				</li>

	
				<!--<div class="btn-group">
  <button type="button" class="btn " style="color:#ced2d1 !important; font-family: 'Montserrat', sans-serif;
  text-transform: uppercase !important;font-size:13px!important;font-weight: 500;padding: 0rem 0rem 0.150rem 0.75rem !important;border-radius: 0px;border:0px !important; ">Profile</button>
  <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" style="color: #ced2d1;">
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Link 1</a>
    <a class="dropdown-item" href="#">Link 2</a>
  </div>
</div>-->
				
				<li class="nav-item">
					<a class="nav-link" href="announcements.php" style="color:#ced2d1 !important; font-family: 'Montserrat', sans-serif;
  text-transform: uppercase !important;font-size:13px!important;font-weight: 500;">Announcements</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="#" style="color:#ced2d1!important; font-family: 'Montserrat', sans-serif;
  text-transform: uppercase !important;font-size:13px!important;font-weight: 500;">E-Mail</a>
				</li>-->
				<li class="nav-item">
					<a class="nav-link" href="chat.php" style="color:#ced2d1 !important; font-family: 'Montserrat', sans-serif;
  text-transform: uppercase !important;font-size:13px!important;font-weight: 500;">Messages</a>
				</li>
				<!--<li>
                   <i class="fa fa-bell" style="font-size: 20px; color:#fff;position: relative;top: 15%;padding-right:10px;"></i>
                </li>-->

				<li>
					<a href="http://standinschool.xyz/">
					<i class="fa fa-sign-out" style="font-size: 24px; color:#fff;position: relative;top: 12%;padding-left:10px;"></i>
				</a>
				</li>
			</ul>
		</div>
	</nav>
  
</header>
