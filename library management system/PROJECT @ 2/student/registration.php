<?php
include "connection.php";
include "navbar.php";

?>


<!DOCTYPE html>
<html>

<head>

    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script type="text/javascript"
        src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=L4RPD2oordA99MM65mDUXitYjpznbyQbHZvFWFSvPQCHzGi-X48RePBLkHnRRWnHr9SePnaIsqXgH8uIunTGuLqkLsRgdQU17ucbxOJckb6iMIw3rKNhfOvtlqWGiBKrswnXRv_3giUqdoZM1YI2qYJY55G45GAiFY47lXsGGDT1UyaVnNV2DHLXbvthVTE6U5vnIjgXp5Up64SXqBczx4slBNJ_t2WEMGnbV2CLSxVQWdVG1DLyBANYcKv1K8Ufd9u_f66EdW5DRAjpora8s4hZiN4eRVl9lcP0yVLQIPj1VyuaTEQ65lG_v44ZIV82iPKZwNU0f9q_hP1kH172X0N_78mlmWkAmATvgv67GyJMrMnBl2TrJm4EO6xQZa8N31Nvlp3dLU1_-yHRzoWluRuDrfuyaDEAdUVdpFAQQGHmy2AJy4PWvwK52jXpn-dAT-BaPh1cOYMhVj8SilwHWA"
        charset="UTF-8"></script>
</head>

<body>
    
    <section>
        <div class="reg_img">

            <div class="box2">
                <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System
                </h1><br>
                <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1><br>
                <form name="Registration" action="" method="post">
                    <br><br>
                    <div class="login">
                        <input type="text" name="first" placeholder="First Name" required=""> <br><br>
                        <input type="text" name="last" placeholder="Last Name" required=""> <br><br>
                        <input type="text" name="username" placeholder="Username" required=""> <br><br>
                        <input type="password" name="password" placeholder="Password" required=""> <br><br>
                        <input type="text" name="roll" placeholder="Roll No" required=""><br><br>

                        <input type="text" name="email" placeholder="Email" required=""><br><br>
                        <input type="text" name="contact" placeholder="Phone Number" required=""><br><br>

                        <button class="block" type="submit" name="submit" value="Sign Up">Sign Up</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

     <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]' );");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>
</body>
</html>