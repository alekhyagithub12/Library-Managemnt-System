<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top:50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
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
  color: #f1f1f1;
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
    
  </style>
    

</head>
<body>
	<!--__________________________Side Nav_______________________-->
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color:white; margin-left:60px;fontsize:20px;"><br><br>
                
    <?php
    if(isset($_SESSION['login_user'])){

    
    //echo "<img style='border-radius: 50%;padding-left:350px;padding-right: 10px;' height=20 width=20 src='images/".$_SESSION['pic']."'>";
     echo "Welcome ".$_SESSION['login_user'];
     }
     ?>
    </div>
    <div class="h"> <a href="add.php">Add Books</a> </div> 
 
  <div class="h"><a href="books.php">Books</a> </div> 
  <div class="h"><a href="request.php">Book Request</a> </div> 
  <div class="h"><a href="issue_info.php">Issue Information</a> </div> 
  
</div>

<div id="main">
  
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span><br> <br>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________Search Bar_____________________-->
    <div class="topnav">
        <form method = "post" name="form1">
        <input name ="search" type="text" placeholder="Search Books.." required>
        <button type="submit" style="background-color: #6db6b9e6;"
				 name="submit"> Search </button><br><br>
</form>
 <form method = "post" name="form1">
        <input name ="bid" type="text" placeholder="Enter Book ID" required>
        <button type="submit" style="background-color: #6db6b9e6;"
				 name="delete"> Delete </button><br><br>
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
		}

    
	?>
	</div>
</body>
</html>