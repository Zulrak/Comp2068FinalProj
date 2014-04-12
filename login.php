<!doctype html>
<!--
File Name: login.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This code runs when the user clicks submit
it searches the database for a perfect match
if a match is returned, allow the user to access the site
else return them to the homepage.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<?php

		// define username and password from text entered in login.html posts
		$username = $_POST['loginUsername'];
		$password = $_POST['loginPassword'];
		
		// connect to the database
		$conn = mysqli_connect("localhost", "db200198596", "910208", "db200198596") or die(mysql_error());
		
		// check for unwanted characters that could allow sql injection
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		
		// hash the password to see if it is the correct one
		$hashpassword = sha1($password);
		
		$sql = "SELECT username, password FROM users WHERE username='$username' AND password='$hashpassword'";
		
		$result = mysqli_query($conn, $sql) or die('Error querying database.');;
		
		// Mysql_num_row is counting table row, there should only be 1 because it is an exact match.
		$count = mysqli_num_rows($result);
		
		// If result matched $username and $password, table row must be 1 row
		if ($count == 1)
		{
			session_start();
			$_SESSION['session_user'] = $username;
			//header("location:create_survey.php");
			echo "it works";
		}
		else
		{
			$message = "ERROR! incorrect username or password.";
			echo "<script type='text/javascript'>window.alert('$message');
				window.location.href='login.html'</script>";
		}
		mysqli_close($conn);
		?>
	</body>
</html>