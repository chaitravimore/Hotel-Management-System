<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

include('connectdb.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['username']) )

{

// get id value

$username = $_GET['username'];



// delete the entry

$result = mysqli_query($con, "DELETE FROM members WHERE username='$username'")

or die(mysqli_error($con));



// redirect back to the view page

header("Location: view.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: view.php");

}



?>
