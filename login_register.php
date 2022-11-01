<?php

require('connection.php');
session_start();

#For Login
if(isset($_POST['login']))
{
    $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($con,$query);
    echo [$result];
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'],$result_fetch['password']))
            {
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$result_fetch['username'];
                header("location: choose.html");
            }
            else
            {
                echo"
                <script>
                alert('Incorrect Password');
                window.location.href='login.html';
                </script>
                ";
            }
        }
        else
        {
            echo"
            <script>
            alert('Email or Username not Registered');
            window.location.href='login.html';
            </script>
            ";
        }
    }
    else
    {
        echo"
        <script>
        alert('Cannot Run Query');
        window.location.href='index.html';
        </script>
        ";  
    }
}


#For SignUp
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0) # it will be executed if username or email is already registered
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['usrname']==$_POST['username'])
            {
                #error for username already registered
                echo"
                <script>
                alert('$result_fetch[username] - Username already taken');
                window.location.href='signup.html';
                </script>
                ";
            }
            else
            {
                #error for email already registered
                echo"
                <script>
                alert('$result_fetch[email] - E-mail already taken');
                window.location.href='signup.html';
                </script>
                ";
            }
        }
        else # it will be executed if no one has taken username or email before
        {
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query="INSERT INTO `registered_users`(`full_name`,`username`,`email`,`password`,`Aadhar`,`Phone`,`address`,`pin_code`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$_POST[aadhar]','$_POST[phone]','$_POST[address]','$_POST[pin_code]')";
            if(mysqli_query($con,$query))
            {
                #if data inserted successfully
                echo"
                <script>
                alert('Registration Successful');
                window.location.href='index.html';
                </script>
                "; 
            }
            else
            {
                #if data cannot be inserted
                echo"
                <script>
                alert('Cannot Run Query');
                window.location.href='signup.html';
                </script>
                "; 
            }
        }
    }
    else
    {
      echo"
      <script>
      alert('Cannot Run Query');
      window.location.href='index.php';
      </script>
      "; 
    }

}

?>
