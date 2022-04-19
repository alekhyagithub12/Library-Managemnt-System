<?php 
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="text/css">
		body
		{
			height: 650px;
			background-image: url("images/7.jpg");
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin:100px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
            border-radius: 5px;
		}
        .block {
  display: block;
  width: 85%;
  border: none;
  background-color: royalblue;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 5px
}

.block:hover {
  background-color: #ddd;
  color: black;
}
	</style>
</head>
<body>
	<div class="wrapper">
		<div style="text-align: center;">
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
		</div>
		<div style="padding-left: 30px; opacity: .6;">
		<form action="" method="post" >
			<input type="text"  name="username" class="form-control" placeholder="Username" required=""><br><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br><br>
			<button class="block" type="submit" name="submit" value="change password">Change Password</button>
		</form>

	</div>
	
	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script> 

				<?php
			}
			
		}
	?></div>
</body>
</html>