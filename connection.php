<?php

 $con=mysqli_connect("localhost","root","Anurag619@","missing_person_webapplication");
   if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to the database'):</script>";
    exit();
 }

?>