<?php 
session_start();
require('connectdb.php');
if(isset($_SESSION['username'])){}
else{
	header("location:login.php");	
}
require('connectdb.php');

$tbl_name="roomdetail";

$username = $_GET['username'];

mysqli_select_db($con,"pnc")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name WHERE username LIKE '%$username%'";

$result = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));

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
while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['checkin_date'] . "</td>";
echo "<td>" . $row['checkout_date'] . "</td>";
echo "<td>" . $row['room_type'] . "</td>";
echo "<td>" . $row['no_of_room'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo '<td><a href="addelete.php?username=' . $row['username'] . '">Delete</a></td>';
echo "</tr>";
}
echo"</table></div><br><br><br>"


?>