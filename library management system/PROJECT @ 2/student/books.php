<?php
  include "connection.php";
  include "navbar.php";
  //error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
    <style>
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
      background-color:black;
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
    }
    tr:hover {background-color: #f5f5f5;}
	.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
body {
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
 <!-- <div class="h"> <a href="issue_info.php">Issue Information</a></div>-->
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
	<!--__________________________Search Bar__________________________-->
    <div class="topnav">
        <form method = "post" name="form1">
        <input name ="search" type="text" placeholder="Search Books.." required>
        <button type="submit" style="background-color: #6db6b9e6;"
				 name="submit"> Submit </button><br><br>
</form>
</div>

<!--_______________________Request Book____________________-->
<div class="topnav">
        <form method = "post" name="form1">
        <input name ="bid" type="text" placeholder="Enter Book ID.." required>
        <button type="submit" style="background-color: #6db6b9e6;"
				 name="request1"> Request </button><br><br>
</form>
</div>
	<h2>List Of Books</h2><br>
  

	<?php
      if(isset($_POST['submit']))
      {
        $q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");
        if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
      else{echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: white;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";

      }
      }
      /*if button is not pressed*/
      else{
        $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: white;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
	  }

		if(isset($_POST['request1']))
		{
			if(isset($_SESSION['login_user']))
			{
				$username = $_SESSION['login_user'];
				$bid = $_POST['bid'];
				//mysqli_query($db,"INSERT INTO issue_book (`username`, `bid`, `approve`, `issue`, `retur`) values('$_SESSION[login_user]','$_POST[bid]','','','');" );
				mysqli_query($db,"INSERT INTO issue_book (`username`, `bid`, `approve`, `issue`, `retur`) values('$username','$bid','','','');" );
				
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{
							?>
					<script type="text/javascript">
						alert("Please Login First.");
					</script>
				<?php
			}
			}
		
    /*
    "INSERT INTO issue_book values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');"

    
    if(isset($_POST['delete']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"DELETE from books where bid = '$_POST[bid]'; ");
				?>
					<script type="text/javascript">
						alert("Delete Successful.");
					</script>
				<?php
			}
			else
			{
							?>
					<script type="text/javascript">
						alert("Please Login First.");
					</script>
				<?php
			}

    */
	

	?>
    
</body>
</html>