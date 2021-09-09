<?php

$con = new mysqli("localhost","root","","social");
                                    // Check connection
if ($con-> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST['submit']))
{
    if( !empty($_POST['date']) && !empty($_POST['cost']) && !empty($_POST['place']) && !empty($_POST['description'])  ) 
    {

        $date = $_REQUEST['date'];
         $cost = $_REQUEST['cost'];
          $place = $_REQUEST['place'];
           $description = $_REQUEST['description'];
    }

    // $query = "insert into information(date,cost,place, description) values('$date', '$cost', '$place', '$description')";
    // $run = mysqli_query($con,$query) ;

    $query = "insert into information(date,cost,place, description) values('$date', '$cost', '$place', '$description')";
    $run = mysqli_query($con,$query) or die(mysqli_error());

    if($run)
    {
        echo "Data Submitted Successfully.";
    }
}      

else
{
    echo "All fields required.";
}      

?>