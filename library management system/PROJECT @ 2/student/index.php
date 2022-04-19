<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Online Library Management System
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript"
        src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=Jwq_LQefbMeIFez8MnsKxia8ymMuukyIb5SPSkszDl1wQbFfEBHm6-p6mRaob0163ueoYVnRWJ1CLVGVPcEFqoeP6utsqso9oDLwm7mTwnWigBJerLrsG1c-x3JwP5_mDwuRQ_bAsJBC4nWnwJezXSYMV7q3wbWGWlZqZS0XH_6Ehqzp0r4glrRsCb91kPiY1sz9_ocrMj9S1kq_s5XdyLoUw8-g0JQGDl1_CQQmfzrXsyC3hgmo6kRBXk1-6mhwOv4gqMJDHK_BFsxd9zVL0rbvEzVtrbc8wZXzbsfI2trQMTDyrbONtlas3vcti0PiW297Llf5AFvM7enKii51uYCudIc-uFs9sYZrLb5IJBFwsF9FtvTEHVmrqmtX82RlbatRYB3UmQA4R0BDQOqRAOYDlLsyTJPF0gvuCgEDz2_G0t9fyK8RXfbHC3QkbTlUfNg6bfcujsHFOnbDtY8PnA"
        charset="UTF-8"></script>
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
    </style>
</head>


<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <img src="images/9.png">
                <h1 style="color: white;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
            </div>

            <?php
            if(isset($_SESSION['login_user']))
            {?>
                 <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                    
                    
                </ul>
            </nav>
            <?php

            }
            else{?>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="student_login.php">STUDENT-LOGIN</a></li>
                   
                </ul>
            </nav>

          <?php  }
          ?>
            
    </div>
        <section>
            <div class="sec_img">
                <br><br><br>
                <div class="box">
                    <br><br><br><br>
                    <h1 style="text-align: center; font-size: 35px;">Welcome to Library</h1><br><br>
                    <h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
                    <h1 style="text-align: center;font-size: 25px;">Closes at: 15:00 </h1><br>
                </div>
            </div>
        </section>
        <footer>
            <p style="color:white;  text-align: center; ">
                <br>
                Email: &nbsp Online.library@gmail.com <br><br>
                Mobile: &nbsp+88018********
            </p>
        </footer>
    </div>
</body>

</html>