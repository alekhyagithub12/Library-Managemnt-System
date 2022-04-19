<?php
include "navbar.php";
include "connection.php";
?>


<!DOCTYPE html>
<html>

<head>

    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
 
    <section>
        <div class="log_img">
            <br> <br><br>
            <div class="box1">
                <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System
                </h1><br>
                <h1 style="text-align: center; font-size: 25px;">Admin Login Form</h1><br>
                <form name="login" action="" method="post">
                    <br><br>
                    <div class="login">
                        <input type="text" name="username" placeholder="Username" required=""> <br><br>
                        <input type="password" name="password" placeholder="Password" required=""> <br><br>
                        <button class="block" type="submit" name="submit" value="Login" >Login</button>
                    </div>
                </form>
                <p style="color: white; padding-left: 15px;">
                    <br><br>
                    <a style="color:white;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    New to this website?&nbsp<a style="color: white;" href="registration.php"> Sign Up</a>
                </p>
            </div>
        </div>
    </section>

     <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
             
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
      
            <!--  
          <div  style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>
      -->    
        <?php
      }
      else
      {
        //if username and password matches
        $_SESSION['login_user'] = $_POST['username'];
        //$_SESSION['pic']= $row['pic'];

        ?>
          <script type="text/javascript">
            window.location="index.php"
          </script>
        <?php
      }
    }

  ?>

</body>

</html>