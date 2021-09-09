<?php

$con = new mysqli("localhost","root","","social");
                                    // Check connection
if ($con-> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

$sql = "select * from information";
$result = mysqli_query($con, $sql);

 // $row = mysqli_fetch_assoc($result);

 // echo "Date    ". "                       Place     ". "                   Cost     ". "                        Description"."<br>";

 $num = mysqli_num_rows($result);
 echo "Total $num data fiound."."<br>";

while($row = mysqli_fetch_assoc($result))
// while($num--)
{
    // echo $row['date']."<br>";
    // echo $row['place']."<br>";
    // echo $row['cost']."<br>";
    // echo $row['description']."<br>";
  
      echo " Date:". $row['date']."  Place: ".$row['place']."  Cost: ".$row['cost']."   Description: ".$row['description'];
      echo "<br>";
    
} 


?>