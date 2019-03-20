<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
  <div class="header">
  	<h2>Sign Up</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstname" value= "<?php echo $firstname; ?>">
  	</div>
	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lastname" value= "<?php echo $lastname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value= "<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value= "<?php echo $email; ?>">
  	</div>
	<div class="input-group">
  	  <label>Age</label>
  	  <input type="text" name="age" value= "<?php echo $age; ?>">
  	</div>
	<div class="input-group">
  	  <label>Contact</label>
  	  <input type="text" name="contact" value= "<?php echo $contact; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Sign Up</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>