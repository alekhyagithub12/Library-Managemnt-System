<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
     <script type="text/javascript"
        src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=Jwq_LQefbMeIFez8MnsKxia8ymMuukyIb5SPSkszDl1wQbFfEBHm6-p6mRaob0163ueoYVnRWJ1CLVGVPcEFqoeP6utsqso9oDLwm7mTwnWigBJerLrsG1c-x3JwP5_mDwuRQ_bAsJBC4nWnwJezXSYMV7q3wbWGWlZqZS0XH_6Ehqzp0r4glrRsCb91kPiY1sz9_ocrMj9S1kq_s5XdyLoUw8-g0JQGDl1_CQQmfzrXsyC3hgmo6kRBXk1-6mhwOv4gqMJDHK_BFsxd9zVL0rbvEzVtrbc8wZXzbsfI2trQMTDyrbONtlas3vcti0PiW297Llf5AFvM7enKii51uYCudIc-uFs9sYZrLb5IJBFwsF9FtvTEHVmrqmtX82RlbatRYB3UmQA4R0BDQOqRAOYDlLsyTJPF0gvuCgEDz2_G0t9fyK8RXfbHC3QkbTlUfNg6bfcujsHFOnbDtY8PnA"
        charset="UTF-8"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        nav {
            float: right;
            word-spacing: 30px;
            padding: 20px;
        }

        nav li {
            display: inline-block;
            line-height: 80px;
        }
        li a:hover 
{
    background-color: #444;
}
/* Change the link color to #111 (black) on hover */
li a:hover 
{
    background-color: #444;
}
nav
{
    float: right;
    padding: 30px;
}
nav li
{
    display: inline-block;
    line-height: 80px;
}
    </style>
</head>
<body>
    <!-- <header class="krishna" style="height: 90px;"> -->

    <div class="header">

        <div class="logo">
            
            <h1 style="color: white; font-size: 20px;word-spacing: 10px; line-height: 50px; margin-top: 1px; ">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
        </div>
        <nav>
            <ul>
               
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                
                <?php
                if(isset($_SESSION['login_user']))
                {
                ?>
                <li><a href="student.php">STUDENT-INFORMATION</a> </li>
                <li><a href="logout.php"> LOGOUT</a></li>
                
                <div style="color:white;padding-right:75px">
                
                    <?php
                    //echo "<img style='border-radius: 50%;padding-left:350px;padding-right: 10px;' height=20 width=20 src='images/".$_SESSION['pic']."'>";
                    echo $_SESSION['login_user'];
                    ?>
                </div>
                    
                    <?php
                     }
                     else{?>
                         <li><a href="admin_login.php"><span> LOGIN</span></a></li>
                
                        <li><a href="registration.php"><span>SIGN_UP</span></a></li>
                
                
            </ul>

                     <?php
                     }
                ?>

               
                
        </nav>
    </div>
    <!--</header>-->
</body>
</html>