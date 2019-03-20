<?php 
session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>PNC Hotel | My Bookings</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
	
	<script>
	function showHint(str) {
	    if (str.length == 0) { 
	document.getElementById("details").innerHTML = "";
	        return;
	    } else {
	        var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	document.getElementById("details").innerHTML = this.responseText;
	            }
	};
	xmlhttp.open("GET", "getbookrecord.php?username=" + str, true);
	xmlhttp.send();
	    }
	}
	</script>

</head>
<style>
table {
  width: 100%;
}
table td, table th {
  color: #2b686e;
  padding: 10px;
}
table td {
  text-align: center;
  vertical-align: middle;
}
table td:last-child {
  font-size: 0.95em;
  line-height: 1.4;
  text-align: left;
}
table th {
  background-color: #daeff1;
  font-weight: 300;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #edf7f8;
}

</style>
<body>
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
							<a href="home.php"><img src="images/logo2.png" title="logo" /></a>
						</div>
						<div class="contact-info">
						<p><br></p>
						<?php  if (isset($_SESSION['username'])) : ?>
							<p class="phone">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
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
							<li><a href="home.php">Home</a></li>
							<?php if( $_SESSION['username'] == 'admin') {  ?> 
							<li><a href="view.php">User Records</a></li>
							<?php } else { ?>
							<li><a href="registration.php">Book Room</a></li>
							<?php } ?>
							<?php if( $_SESSION['username'] == 'admin') {  ?> 
							<li><a class="active" href="adminlogin.php">User Bookings</a></li>
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
			
	<div class="clear"> </div>
	<div class="content-grids">

	<br>
	<form align="center"> 
	</form>
	<span id="details"></span>
		<?php
			require('connectdb.php');

			$tbl_name="roomdetail"; // Table name
			$username = $_SESSION['username']; 

			mysqli_select_db($con,"pnc")or die("cannot select DB");
			$sql="SELECT * FROM $tbl_name WHERE username='".$username."' " ;
			$result=mysqli_query($con,$sql) or trigger_error(mysql_error.$sql);
			$count = mysqli_num_rows($result);
			// $row=mysqli_fetch_array($result);
			echo "<div class='table-users'>";
			echo "<table cellspacing='0'>
			<tr>
			<th>Username</th>
			<th>Check-In Date</th>
			<th>Check-Out Date</th>
			<th>Room type</th>
			<th>Number of rooms</th>
			<th>Amount</th><th></th> <th></th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['checkin_date'] . "</td>";
			echo "<td>" . $row['checkout_date'] . "</td>";
			echo "<td>" . $row['room_type'] . "</td>";
			echo "<td>" . $row['no_of_room'] . "</td>";
			echo "<td>" . $row['amount'] . "</td>";
			echo "</tr>";
			}
			echo "</table></div>";

		?>
		</div>
<p><br><center><a href="home.php" class="button">Back to Home</a></center></p>
<div class="box center-box">
					<ul>
						<li><a >Leave a Feedback</a></li>
						<li><a >Reviews and Ratings</a></li>
						<li><a >FAQs</a></li>	
					</ul>
				</div>
</body>
</html>