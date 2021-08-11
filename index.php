<?php
$con = mysqli_connect("localhost", "root", "", "social");
if(mysqli_connect_errno()) {
    echo "failed to connect: " . mysqli_connect_errno();

}
$query= mysqli_query($con, "INSERT INTO test VALUES(NULL, 'social app')");



?>











<html>
<head>
    <title>Travel</title>
</head>
<body>
    travel diary
</body>

</html>