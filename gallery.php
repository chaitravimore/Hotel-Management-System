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
		<title>Hotel Website | Gallery</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
					<!----start-image-gallery----->
					<div class="gallerys">
					<h3>gallery</h3>
					<div class="gallery-grids">
						<div class="gallery-grid">
							<a href="images/single1.jpg"><img src="images/single1.jpg" alt=""></a>
							<h4>Single</h4>
							<p>Our single rooms are ideal for one person. Our single rooms overlook the street, and all have double glazing. Single rooms have a single bed (120cm), en-suite bathroom with bath and toilet. For children under the age of 2, cots are available and can be requested at the time of booking.</p>
						</div>
						<div class="gallery-grid grid2">
							<a href="images/slider1.jpg"><img src="images/slider1.jpg" alt=""></a>
							<h4>Double</h4>
							<p>Ideal for one to two people, double rooms at PNC Hotels overlook either the courtyard or street. All rooms have double glazing, ensuring a calm and relaxing environment for our guests. Double rooms have a double bed (140cm), an en-suite bathroom with bath, and separate toilet.</p>
						</div>
						<div class="gallery-grid">
							<a href="images/deluxe1.jpg"><img src="images/deluxe1.jpg" alt=""></a>
							<h4>Deluxe</h4>
							<p>These Deluxe Rooms let you relax as you admire a beautiful view of the pool. Stay connected as you enjoy our free WiFi and watch movies with our 32-inch LCD TV and DVD player. Refresh yourself as you take a step into our rain shower.</p>
							<div class="gallery-button"><a href="#">Read More</a></div>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
					<div class="gallery-grids">
						<div class="gallery-grid">
							<a href="images/slider3.jpg"><img src="images/slider3.jpg" alt=""></a>
							<h4>Deluxe Supreme</h4>
							<p> Rooms located on the upper floors of the Hotel, with balcony and magnificent views over the Hotel gardens, Estoril Park and Cascais Bay. Elegant, luxury decor with contemporary touches, extremely welcoming. The rooms create a sensation of timeless comfort, ideal for those special moments and for a restful stay. Furnished with twin, queen or king size beds. Rooms measure between 25 and 35 square metres. Marble bathrooms with separate bath and shower.</p>
					</div>
						<div class="gallery-grid grid2">
							<a href="images/penthouse1.jpg"><img src="images/penthouse1.jpg" alt=""></a>
							<h4>Penthouse Suite</h4>
							<p>Our expansive One Bedroom Penthouse Suite can connect to a Tower Deluxe Room for an additional bedroom. Savor our stylish, Bellagio-themed art décor and tailor your stay to your preferences with mood lighting, individual climate controls, reading lights, and automatic drape and sheer controls.</p>
						</div>
					</div>
					<script ty pe="text/javascript" src="js/jquery.lightbox.js"></script>
				    <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen">
				  	<script type="text/javascript">
				    $(function() {
				        $('.gallery-grid a').lightBox();
				    });
				    </script>
				    <div class="clear"> </div>
				    <!---<div class="projects-bottom-paination">
						<ul>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
						</ul>
					</div>--->
				</div>
					<!----start-image-gallery----->
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
			</div>
			<!---End-content----->
		</div>
		<!---End-Wrap--->
	</body>
</html>

