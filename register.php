<?php
session_start();
$con=mysqli_connect("localhost", "root", "","social");
if(mysqli_connect_errno())
{
    echo "failed to connect: " . mysqli_connect_errno();
}
$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date="";
$error_array=array();

if(isset($_POST['register_button'])){

$fname= strip_tags($_POST['reg_fname']);
$fname= str_replace(' ','',$fname);
$fname=ucfirst(strtolower($fname));
$_SESSION['reg_fname']=$fname;

$lname= strip_tags($_POST['reg_lname']);
$lname= str_replace(' ','',$lname);
$lname=ucfirst(strtolower($lname));
$_SESSION['reg_lname']=$lname;

$em= strip_tags($_POST['reg_email']);
$em= str_replace(' ','',$em);
$em=ucfirst(strtolower($em));
$_SESSION['reg_email']=$em;

$em2= strip_tags($_POST['reg_email2']);
$em2= str_replace(' ','',$em2);
$em2=ucfirst(strtolower($em2));
$_SESSION['reg_email2']=$em2;

$password= strip_tags($_POST['reg_password']);
$password2= strip_tags($_POST['reg_password2']);

$date=date("Y-m-d");

if($em == $em2){

if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
      
$em= filter_var($em, FILTER_VALIDATE_EMAIL);

$e_check=mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
$num_rows=mysqli_num_rows($e_check);

if($num_rows > 0){
    array_push($error_array, "email already in use<br>"); 
}



}
else{
    array_push($error_array, "invalid email format<br>");
}

}
else {
    array_push($error_array, "emails don't match<br>");
}

if(strlen($fname) > 25 || strlen($fname)< 2){
    array_push($error_array, "your first name must be between 2 and 25 characters<br>");
}

if(strlen($lname) > 25 || strlen($lname)< 2){
    array_push($error_array, "your last name must be between 2 and 25 characters<br>");
}
if($password!=$password2){
    array_push($error_array, "your passwords do not match<br>");
}

else{
    if(preg_match('/[^A-Za-z0-9]/',$password)){
        array_push($error_array, "your password can only contain english characters<br>");
    }
}

if(strlen($password > 30 || strlen($password) < 5)){
    array_push($error_array, "your password must be between 5 and 30 characters<br>");
}
}
 

?>


<html>
<head>
    <title>welcome to travel diary!</title>
</head>
<body>

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
 else if(in_array("your password can only contain english characters<br>", $error_array)) echo "your password can only contain english characters<br>"; 
 else if(in_array("your password must be between 5 and 30 characters<br>", $error_array)) echo "your password must be between 5 and 30 characters<br>"; ?>

<input type="submit" name="register_button" value="register">


</form>



</body>



</html>