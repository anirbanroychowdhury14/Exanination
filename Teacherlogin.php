<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-image: url('Image/bg1.jpg');background-position: center; background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;">

	<div class="header">
		<div class="header-content">
			<table class="header-table">
				<tr>
					<td class="logo-img">
						<div class="trigger"><img src="Image/logo1.png?v=<?php echo time(); ?>"></div>
					</td>
					<td class="logo-text">
						<table style="position: relative;">
							<tr>
								<td>
									<div class="logo-txt-acr">
										<b>EXAMINATION MANAGEMENT SYSTEM</b>
									</div>
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li id="m1"><a href="Home.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;LOGIN&nbsp;</a>
									<ul>
										<li id="m21"><a href="Adminlogin.php">ADMIN</a></li>
										<li id="m22"><a href="Teacherlogin.php">TEACHER</a></li>
										<li id="m23"><a href="Studentlogin.php">STUDENT</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;SIGN&nbsp;UP</a>
									<ul>
										<li id="m31"><a href="Teachersignup.php">TEACHER</a></li>
										<li id="m32"><a href="Studentsignup.php">STUDENT</a></li>
									</ul>
									</ul>
								</li>		
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login1">
		<h2 id ="h2" align="center">TEACHER LOGIN</h2>
		<hr>
		<form action="Teacherlogin.php" method="post">
		 	USER NAME<br>
			<i class="fas fa-user"></i><input type="email" name="username" placeholder="username/email" required="yes"><br><br>
			PASSWORD<br>
			<i class="fas fa-lock"></i><input type="password" name="password" placeholder="password" required="yes"><br><br>
			<button name="login">LOGIN</button>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
		</form>
	</div>
</body>
</html>
<?php
	require('db.php');
	session_start();
	if (isset($_POST['login'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username = mysqli_real_escape_string($connection,$username);
		$password = mysqli_real_escape_string($connection,$password);
		$query = "SELECT * FROM teacher WHERE username='$username'";
		$result=mysqli_query($connection,$query);
		while ($row=mysqli_fetch_assoc($result)) {
			$p=$row['password'];
			if (password_verify($password,$p))
			{
				$_SESSION['username']=$username;
				header("Location:Teacherhome.php");
			}
		}
		echo "<script>alert('Invalid username/password')</script>";
	}

	?>