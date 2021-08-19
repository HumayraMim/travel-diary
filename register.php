<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<html>
<head>
    <title>Travel</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

<?php  

	if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}

	?>

<div class="wrapper">
    <div class="login_box">

    <div class="login_header">
        <h1>Travel</h1>
        login or sign up below!
    </div>

    <div id="first">

    <form action="register.php" method="POST">
<input type="email" name="log_email" placeholder="email address" value="<?php
if(isset($_SESSION['log_email'])) {
    echo $_SESSION['log_email'];
}
?>" required>
<br>
<input type="password" name="log_password" placeholder="password">
<br>
<?php if(in_array("email or password was incorrect<br>", $error_array)) echo "email or password was incorrect<br>"; ?>
<input type="submit" name="login_button" value="login">
<br>
<a href="#" id="signup" class="signup">need an account? register here!</a>
</form>

    </div>

    <div id="second">
<form action="register.php" method="POST">

<input type="text" name="reg_fname" placeholder="first name" value="<?php
if(isset($_SESSION['reg_fname'])) {
    echo $_SESSION['reg_fname'];
}
?>" required>
<br>
<?php if(in_array("your first name must be between 2 and 25 characters<br>", $error_array)) echo "your first name must be between 2 and 25 characters<br>"; ?>



<input type="text" name="reg_lname" placeholder="last name" value="<?php
if(isset($_SESSION['reg_lname'])) {
    echo $_SESSION['reg_lname'];
}
?>" required>
<br>
<?php if(in_array("your last name must be between 2 and 25 characters<br>", $error_array)) echo "your last name must be between 2 and 25 characters<br>"; ?>

<input type="email" name="reg_email" placeholder="email" value="<?php
if(isset($_SESSION['reg_email'])) {
    echo $_SESSION['reg_email'];
}
?>" required>
<br>
<input type="email" name="reg_email2" placeholder="confirm email" value="<?php
if(isset($_SESSION['reg_email2'])) {
    echo $_SESSION['reg_email2'];
}
?>" required>
<br>
<?php if(in_array("email already in use<br>", $error_array)) echo "email already in use<br>"; 
 else if(in_array("invalid email format<br>", $error_array)) echo "invalid email format<br>"; 
 else if(in_array("emails don't match<br>", $error_array)) echo "emails don't match<br>"; ?>


<input type="password" name="reg_password" placeholder="password" required>
<br>
<input type="password" name="reg_password2" placeholder="confirm password" required>
<br>
<?php if(in_array("your passwords do not match<br>", $error_array)) echo "your passwords do not match<br>"; 
 else if(in_array("your password can only contain english characters or numbers<br>", $error_array)) echo "your password can only contain english characters or numbers<br>"; 
 else if(in_array("your password must be between 5 and 30 characters<br>", $error_array)) echo "your password must be between 5 and 30 characters<br>"; ?>

<input type="submit" name="register_button" value="register">
<br>

<a href="#" id="signin" class="signin">already have an account? sign in here!</a>

</form>
    </div>
    </div>
</div>

</body>



</html>