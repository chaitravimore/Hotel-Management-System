<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Receipt</title>

	</head>
<style>

    #logo img {
		
  width: 300px;
  margin-top: -8px;
  align: center;
  
	}
	
	
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
 
 th, td {
    padding: 15px;
    text-align: left;
}

.container {
	
 margin: 120px 50px 30px 280px;

 }
 
 .container2 {
	
 margin: 5px 50px -50px 85px;

 }
 
 #bg-text
{
	align:center;
    color:lightgrey;
    font-size:120px;
	opacity:0.4;
    transform:rotate(320deg);
    -webkit-transform:rotate(320deg);
}
 .input-group{
    
    margin-top: 50px;
}

#content{
    position:absolute;
    z-index:1;
}
 
</style>

<body>



<h1>

<div class="logo">
	<p id="logo"><a href="home.php"><img src="images/logo2.png" title="logo" class="center" /></a></p>
		</div>
	
<div>
<center><h6><i><u>Booking Receipt</u></i></h6></center>
</div>

		
<?php 

session_start();

require('connectdb.php');

			$tbl_name="roomdetail"; // Table name

			mysqli_select_db($con,"pnc")or die("cannot select DB");
			$sql="SELECT * FROM $tbl_name where id=(SELECT MAX(id) FROM roomdetail) ";
			$result=mysqli_query($con,$sql) or trigger_error(mysql_error.$sql);
			$row=mysqli_fetch_array($result);
			
			echo '<div class="container">';
			echo "<table cellspacing='0'>
			<tr>
			<th><span>Username</span></th>
			<th><span>Check-In Date</span></th>
			<th><span>Check-Out Date</span></th>
			<th><span>Room type</span></th>
			<th><span>Number of rooms</span></th>
			<th><span>Amount</span></th>
			</tr>";
			echo "<tr>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['checkin_date'] . "</td>";
			echo "<td>" . $row['checkout_date'] . "</td>";
			echo "<td>" . $row['room_type'] . "</td>";
			echo "<td>" . $row['no_of_room'] . "</td>";
			echo "<td>" . $row['amount'] . "</td>";
			echo "</tr>";
			
			echo "</table></div>";
			echo'</div>';
 ?>

 </h1>

<div class="container2">
<div class="input-group">
<p><center><button onClick="window.print()">Print this page</button><center></p>
</div>

<p><br><center><a href="home.php" class="button">Back to Home</a></center></p>

</div>
</body>
</html>
