<?php 
error_reporting(0);
$conn = mysqli_connect("localhost","root","","vedanta");

if(mysqli_connect_error())
{
    echo "cannot connect";
}
?>
