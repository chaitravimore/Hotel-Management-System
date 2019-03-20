<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<html>
	<head>
		<title>Hotel Website | Services</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!---start-Wrap--->
			<!---start-header--->
			<div class="header">
			<div class="content-box">
				<?php if (isset($_SESSION['success'])) : ?>
					<div class="error success" >
				<?php 
					unset($_SESSION['success']);
				?> </div>
				<?php endif ?>
				<div class="wrap">
					<div class="header-top">
						<div class="logo">
							<a href="index.html"><img src="images/logo2.png" title="logo" /></a>
						</div>
						<div class="contact-info">
							<?php  if (isset($_SESSION['username'])) : ?>
							<p class="phone"><strong><?php echo $_SESSION['username']; ?></strong></p>
							<p class="gpa"> <a href="home.php?logout='1'" style="color: red;">logout</a> </p>
							<?php endif ?>
							<p class="phone">Call us : <a>1800-PNC-789</a></p>	
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="header-top-nav">
					<div class="wrap">
						<ul>
							<li class="active"><a href="home.php">Home</a></li>
							<?php if( $_SESSION['username'] == 'admin') {  ?> 
							<li><a href="view.php">User Records</a></li>
							<?php } else { ?>
							<li><a href="registration.php">Book Room</a></li>
							<?php } ?>
							<?php if( $_SESSION['username'] == 'admin') {  ?> 
							<li><a href="adminlogin.php">User Bookings</a></li>
							<?php } else { ?>
							<li><a href="services.php">Services</a></li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="history.php">My Bookings</a></li>
							<?php } ?>														
							
							<div class="clear"> </div>
						</ul>
					</div>
				</div>
			</div>
			<!---End-header--->
			<div class="clear"> </div>
			<!---start-content----->
			<div class="content">
				<div class="wrap">
					<!-----start--services------>
					<div class="services">
						<div class="service-content">
							<h3>Our Hotel Services</h3>
							<ul>
								<li><span>1.</span></li>
								<li><p><a href="#">CULTURE SHOW</a> Every evening we have exciting events planned for you to come show off your talents.</p></li>
								<div class="clear"> </div>
							</ul>
							<ul>
								<li><span>2.</span></li>
								<li><p><a href="#">SWIMMING POOL</a> You can enjoy Swimming in the pool and relax with a drink at our Pooldside Bar. </p></li>
								<div class="clear"> </div>
							</ul>
							<ul>
								<li><span>3.</span></li>
								<li><p><a href="#">RESTAURANT</a> You can have a choice between taste of three countries at one of the 3 restaurants located in our premise.</p></li>
								<div class="clear"> </div>
							</ul>
							<ul>
								<li><span>4.</span></li>
								<li><p><a href="#">CONFERENCE HALL</a>Here you can have Meetings with services provide by us to make it as easy and comfortable as possible.</p></li>
								<div class="clear"> </div>
							</ul>
							<ul>
								<li><span>5.</span></li>
								<li><p><a href="#">SPA</a>Relax. Rejuvinate. Unwind.</p></li>
								<div class="clear"> </div>
							</ul>
							<ul>
								<li><span>6.</span></li>
								<li><p><a href="#">POOLSIDE BAR</a> To chill. </p></li>
								<div class="clear"> </div>
							</ul>
						</div>
						<div class="services-sidebar">
							<h3>WE PROVIDE</h3>
							 <ul>
							  	<li><a href="#">Free WiFi</a></li>
							  	<li><a href="#">24-hour Reception</a></li>
							  	<li><a href="#">Bar</a></li>
							  	<li><a href="#">Room Service</a></li>
							  	<li><a href="#">Gym</a></li>
								<li><a href="#">Wake-Up Call</a></li>
								<li><a href="#">Airport Pickup & Drop</a></li>
					 		 </ul>
					 		 
						</div>
						<div class="clear"> </div>
					</div>
					<!-----End--services------>
				</div>
				<div class="clear"> </div>
				<div class="boxs">
				<div class="wrap">
				<div class="box">
					 
				</div>
				<div class="box center-box">
					<ul>
						<li><a href="https:www.code-projects.org">Leave a Feedback</a></li>
						<li><a href="https:www.code-projects.org">Reviews and Ratings</a></li>
						<li><a href="https:www.code-projects.org">FAQs</a></li>
					</ul>
				</div>
				<div class="box">
					
				</div>
				<div class="clear"> </div>
			</div>
			<!---start-box---->
		</div>
		<!---start-copy-Right----->
		<div class="copy-tight">
						<p>&copy PNC HOTEL,Mumbai 2018 "THIS PROJECT IS BROUGHT TO YOU BY KJSCE</a></p>
					</div>
		<!---End-copy-Right----->
			</div>
			<!---End-content----->
		</div>
		<!---End-Wrap--->
	</body>
</html>

