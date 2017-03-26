<?php
	session_start(); // Starting Session
	$error = ' '; // Variable To Store Error Message
	
	if (isset($_POST['submit'])) {
		if (empty($_POST['name']) || empty($_POST['pass'])) {
			$error = "Username or Password is invalid";
		} else {
			
			// Define $username and $password
			$username = $_POST['name'];
			$password = $_POST['pass'];
			
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			include("sql_connect.php");    
			
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($mysqli, $username);
			$password = mysqli_real_escape_string($mysqli, $password);
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($mysqli, "SELECT * FROM OFFICER WHERE LOGIN_PASSWORD = '$password' AND USERNAME = '$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['username'] = strtolower($username); // Initializing Session
				header("Location: admin.php");
			} else {
				$error = "Username or Password is invalid";
			}
		}
	}
?>