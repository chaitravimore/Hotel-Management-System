<?php 
session_start();
require('connectdb.php');
if(isset($_SESSION['username'])){}
else{
	header("location:login.php");	
}
require('connectdb.php');

$tbl_name="members";

$username = $_GET['username'];

mysqli_select_db($con,"pnc")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name WHERE username LIKE '%$username%'";

$result = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));

echo "<div class='table-users'>";
echo "<table cellspacing='0'>";

echo "<tr> <th>Username</th> <th>Email</th> <th>First Name</th> <th>Last Name</th> <th>Age</th> <th>Contact</th> <th>Password</th> <th></th> <th></th></tr>";
while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";

echo '<td>' . $row['username'] . '</td>';

echo '<td>' . $row['email'] . '</td>';

echo '<td>' . $row['firstname'] . '</td>';

echo '<td>' . $row['lastname'] . '</td>';

echo '<td>' . $row['age'] . '</td>';

echo '<td>' . $row['contact'] . '</td>';

echo '<td>' . $row['password'] . '</td>';

echo '<td><a href="edit.php?username=' . $row['username'] . '">Edit</a></td>';

echo '<td><a href="delete.php?username=' . $row['username'] . '">Delete</a></td>';

echo "</tr>";
}
echo"</table></div><br><br><br>"


?>