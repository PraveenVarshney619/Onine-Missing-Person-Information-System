<?php
require('connection.php');
session_start();
global $row_fetch;

$uname=$_SESSION["UserName"];
$query="SELECT * FROM `registered_users` WHERE username='$uname'";
$result=mysqli_query($con,$query);
$row_fetch=mysqli_fetch_assoc($result);
echo ("<h1>Information</h1>");
echo("<h2>These are the volunteer details who uploaded details on our databases.<br>Contact him/her to get back the person</h2>");
echo ("<h3>Name of the Volunteer: ".$row_fetch['full_name']."</h3>");
echo ("<h3>Volunteer Contact Number: ".$row_fetch['Phone']."</h3>");
echo ("<h3>Volunteer Mail Address: ".$row_fetch['email']."</h3>");
echo ("<h3>Volunteer Residential Address: ".$row_fetch['address']."</h3>");
echo ("<h3>Volunteer Pincode ".$row_fetch['pin_code']."</h3>");
//echo ("<h3>Pincode from where Person went Missing: ".$_SESSION["Pincode"]."</h3>");

?>
