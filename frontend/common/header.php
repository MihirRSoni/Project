<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- HEADER -->
	<header id="home">
		<!-- NAVGATION -->
		<nav id="main-navbar">
			<div class="container" style="width: 100%;">
				<div class="navbar-brandar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.php"><img src="img/logo.png" alt="logo"></a>
					</div>
					<!-- Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle-btn">
							<i class="fa fa-bars"></i>
						</button>
					<!-- Mobile toggle -->

					<!-- Mobile Search toggle -->
					<button class="search-toggle-btn">
							<i class="fa fa-search"></i>
						</button>
					<!-- Mobile Search toggle -->
				</div>

				<!-- Search -->
				<div class="navbar-search">
					<button class="search-btn"><i class="fa fa-search"></i></button>
					<div class="search-form">
						<form>
							<input class="input" type="text" name="search" placeholder="Search">
						</form>
					</div>
				</div>
				<!-- Search -->

				<!-- Nav menu -->
				<ul class="navbar-menu nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">NGO</a></li>
					<li class="has-dropdown"><a href="#">Causes</a>
						<ul class="dropdown">
							<li><a href="single_cause.php">Single Cause</a></li>
						</ul>
					</li>
					<li class="has-dropdown"><a href="#">Events</a>
						<ul class="dropdown">
							<li><a href="events.php">Trending Events</a></li>
							<li><a href="events.php">All Events</a></li>
						</ul>
					</li><?php if(!empty($_SESSION['role'])){ 
						?>
					<li class="has-dropdown"><a href="#">Hi <?php if($_SESSION['role']==1 || $_SESSION['role']==2){ echo $_SESSION['name'];}elseif($_SESSION['role']==3){ echo $_SESSION['adminname'];} ?>!</a>
						<ul class="dropdown">
							<li><a href="notifications.php">Notifications</a></li>
							<li><a href="editprofile.php">Edit Profile</a></li>
							<li><a href="<?php if($_SESSION['role']==1){?>my_donation_history.php<?php } ?> <?php if($_SESSION['role']==2){?>donation_history.php?id=<?php echo $_SESSION['id']; ?> <?php } ?>">Past Donations History</a></li>
							<?php 
								if(!empty($_SESSION)){
									/*echo "<pre>";
									print_r($_SESSION);die;*/
								?>

							<li><a href="Logout.php">Logout</a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<?php
						}else{
					?>
					<li><a href="Login.php">Login</a></li>
					<?php 
						} 
					?>
					<li><a href="#" data-toggle="modal" data-target="#myModal">Contact</a></li>
					
				</ul>
				<!-- Nav menu -->
				<!-- <hr style="color: rgb(0,0,0);"> -->
			</div>

		</nav>
		<!-- /NAVGATION -->


		<!-- HOME OWL -->
		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Contact Us Query</h4>
		        </div>
		        <div class="modal-body">
		          <form method="POST" action="../frontend/contact_us.php">
		          	<div class="form-group">
					    <label for="email">From:</label>
					    <input type="email" class="form-control" id="email" required="required" name="email_id">
					 </div>
					 <div class="form-group">
					    <label for="email">Query:</label>
					    <textarea class="form-control" name="query"></textarea>
					 </div>
					 <div class="form-group">
					    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
					 </div>
		          </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
	</div>
