<?php
$host="localhost";
$username="root";
$password="";
$database="cbt_new";

$con=mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    echo '<script>alert("Not Done")</script>';
}
// else
// {
//     echo '<script>alert("Done")</script>';
// }
?>