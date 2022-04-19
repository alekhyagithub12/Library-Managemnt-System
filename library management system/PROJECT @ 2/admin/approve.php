<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Request</title>
    <style>

        .srch
		{
			padding-left: 1190px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
		}
		
        .topnav {
            padding-left: 20px;
  overflow: hidden;
  background-color: white;
}
.topnav input[type=text] {
    border: 1px solid #ccc;
  }

    table, td, th {  
      border: 1px solid #ddd;
      text-align: left;
      text-decoration: double;
    }

    th {
      background-color:#003cff8f;
      color: white;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      padding:30px;
      margin:20px;
    }
    td{
      color: black;
    }

    th, td {
      padding: 15px;
      color:white
    }
    
	
body {
    background-image: url("images/1111.jpg");
    background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
.container
{
	height: 500px;
    width :1500px;
	background-color: black;
	opacity: .8;
	color: white;
}
.block {
  display: block;
  width: 35%;
  border: none;
  background-color: royalblue;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #ddd;
  color: black;
}

.Approve
{
    
  margin-left: 600px;
}

    
  </style>
    
</head>
<body>
    <!--_______________________________Side Nav Bar________________________-->
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <!-- <div class="h"><a href="expired.php">Expired List</a></div>-->
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span><br><br>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<br><br>
<!--______________________Approve Request__________________________________-->
<div class="container">
    <br><h3 style="text-align: center;">Approve Request</h3><br><br>

    <form class="Approve" action=""method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br><br>
        <input class="form-control" type="text" name="issue" placeholder="Issue Date dd-mm-yyyy" required=""><br><br>
        <input class="form-control" type="text" name="retur" placeholder="Return Date dd-mm-yyyy"required=""><br><br>
        <button class="block" type="submit" name="submit" value="Approve">Approve</button>

    </form>
 
</div>
<?php
echo $_SESSION['bid'];
echo $_SESSION['name'];
$bid = $_SESSION['bid'];
if(isset($_POST['submit']))
{
     
     
     //$res=mysqli_query($db,"SELECT quantity from books where bid='$bid';");
     //echo $row['quantity'];

     /* if($row['quantity']==0)
      {
        echo "Book not available";
      }
      else{*/
        mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `retur` =  '$_POST[retur]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");
        mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");


     // }
     $res=mysqli_query($db,"SELECT quantity from books where bid='$bid';");
        
     
     
     

      
      //echo $res;

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }

    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php";
        
      </script>
    <?php
  }
?>






</body>
</html>
