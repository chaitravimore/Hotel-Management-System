<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>

<h1>welcome admin</h1>
Choose option from Below to take action!!!!
Create new Booking click <a href="registration.php"> Here</a>
<?php
include('connectdb.php');
$sql="select * from roomdetail ";
$row = mysqli_query($con,$sql) 
or die (mysqli_error($con));
?><table border="1">
<?php

while($data = mysqli_fetch_array ( $row ) )
 {
// echo "<tr>";

// echo "<td>" . $row['id'] . "</td>";

// echo "<td>" . $row['username'] . "</td>";

// echo "<td>" . $row['checkin_date'] . "</td>";

// echo "<td>" . $row['checkout_date'] . "</td>";

// echo "<td>" . $row['room_type'] . "</td>";

// echo "<td>" . $row['no_of_room'] . "</td>";

// echo "<td>" . $row['amount'] . "</td>";

// echo '<td><a href="adupdate.php?username=' . $row['username'] . '">Edit</a></td>';

// echo '<td><a href="addelete.php?username=' . $row['username'] . '">Delete</a></td>';

// echo "</tr>";

?>
<tr>
<td><?php echo $data[id]; ?></td>
<td><?php echo $data[username]; ?></td>
<td><?php echo $data[checkin_date]; ?></td>
<td><?php echo $data[checkout_date]; ?></td>
<td><?php echo $data[room_type]; ?></td>
<td><?php echo $data[no_of_room]; ?></td>
<td><?php echo $data[amount]; ?></td>
<td><a href="adupdate.php?id=<?php echo $data[id]; ?>">update</a></td>
<td><a href="addelete.php?id=<?php echo $data[id]; ?>">delete</a></td>
</tr> 
<?php
}


?>
</table>

</div>
</body>
</html>
