<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","learning");

if(mysqli_connect_error())
{
    echo "cannot connect";
}
?>