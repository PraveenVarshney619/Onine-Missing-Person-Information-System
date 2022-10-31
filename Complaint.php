<?php 
require('connection.php');
session_start();

if(isset($_POST["upload"]) && !empty($_FILES))
{
    $img_loc=$_FILES["profile_pic"]["tmp_name"];
    $img_name=$_FILES["profile_pic"]["name"];
    $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
    $img_size=$_FILES['profile_pic']['size']/(1024*1024);

    $img_des="C:/xampp/htdocs/Praveenprograms/Project/Backend/LoginPage/Uploaded Images/".$_POST['fullname'].".".$img_ext;
    
    //echo"$img_des";
    //Session to be set for path.
    $_SESSION["path"]=$img_des;

    if(($img_ext!='png'))
    {
        echo"<script>alert('Invalid Image Extension');</script>";
        exit();
    }
    if($img_size>2)
    {
        echo"<script>alert('Image size is greater than 2 MB');</script>";
        exit();
    }

    
    $query="INSERT INTO `user_complaint`(`full_name`, `address`, `pin_code`, `city`, `missing_date`, `Aadhar`, `image`, `gen_desc`) VALUES ('$_POST[fullname]','$_POST[address]','$_POST[pin_code]','$_POST[city]','$_POST[missing_date]','$_POST[aadhar]','$img_des','$_POST[gendesc]')";
    
    if(mysqli_query($con,$query))
    {
        move_uploaded_file($img_loc,$img_des);
        echo"<script>alert('Successful')</script>";
        header("location: similar.php");
    }
    else
    {
        echo"<script>alert('Un-Successful')</script>";
    }

}
else
{
    echo"Empty File";
}
?>