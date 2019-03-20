<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($username, $firstname, $lastname, $age, $contact, $password, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>

 <form method="post" action="edit.php">
  <input type="hidden" name="username" value="<?php echo $username; ?>"/>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" value="<?php echo $username; ?>"/>
  	</div>
  		<div class="input-group">
  		<label>Firstname</label>
  		<input type="text" name="firstname" value="<?php echo $firstname; ?>"/>
  	</div>
  		<div class="input-group">
  		<label>Lastname</label>
  		<input type="text" name="lastname" value="<?php echo $lastname; ?>"/>
  	</div>
  		<div class="input-group">
  		<label>Age</label>
  		<input type="text" name="age" value="<?php echo $age; ?>"/>
  	</div>
  		<div class="input-group">
  		<label>Contact</label>
  		 <input type="text" name="contact" value="<?php echo $contact; ?>"/>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" value="<?php echo $password; ?>"/>
  	</div>
  	<div class="input-group">
  		<button type="submit" name="submit">Submit</button>
  	</div>
  
  </form>

<!-- <form action="" method="post">

<input type="hidden" name="username" value="<?#php echo $username; ?>"/>

<div>

<p><strong>Username:</strong> <input type="text" name="username" value="<?#php echo $username; ?>"/><br/>

<strong>First Name: *</strong> <input type="text" name="firstname" value="<?#php echo $firstname; ?>"/><br/>

<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?#php echo $lastname; ?>"/><br/>

<strong>Age: *</strong> <input type="text" name="age" value="<?#php echo $age; ?>"/><br/>

<strong>Contact: *</strong> <input type="text" name="contact" value="<?#php echo $contact; ?>"/><br/>

<strong>Password: *</strong> <input type="password" name="password" value="<?#php echo $password; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form> -->

</body>

</html>

<?php

}







// connect to the database

include('connectdb.php');



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data



// get form data, making sure it is valid

$username = $_POST['username'];

$firstname = mysqli_real_escape_string($con, htmlspecialchars($_POST['firstname']));

$lastname = mysqli_real_escape_string($con, htmlspecialchars($_POST['lastname']));

$age = mysqli_real_escape_string($con, htmlspecialchars($_POST['age']));

$contact = mysqli_real_escape_string($con, htmlspecialchars($_POST['contact']));

$password = mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));



// check that firstname/lastname fields are both filled in

if ($firstname == '' || $lastname == '' || $age == '' || $contact == '' || $password == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($username, $firstname, $lastname, $age, $contact, $password, $error);

}

else

{

// save the data to the database

mysqli_query($con, "UPDATE members SET firstname='$firstname', lastname='$lastname' , age='$age', contact='$contact', password='$password' WHERE username='$username'")

or die(mysqli_error($con));



// once saved, redirect back to the view page

header("Location: view.php");

}



}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)



// query db

$username = $_GET['username'];

$result = mysqli_query($con, "SELECT * FROM members WHERE username ='$username' ")

or die(mysqli_error($con));

$row = mysqli_fetch_array($result); 



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db


$firstname = $row['firstname'];

$lastname = $row['lastname'];

$age = $row['age'];

$contact = $row['contact'];

$password = $row['password'];



// show form

renderForm($username, $firstname, $lastname, $age, $contact, $password, '');

}

else

// if no match, display result

{

echo "No results!";

}





}

?>