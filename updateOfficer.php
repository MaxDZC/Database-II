<?php
	require("sql_connect.php");

	$student_id = $_POST['student_id'];
	$position = $_POST['position'];	
	$Oldpassword = $_POST['Oldpassword'];
	$NewPassword = $_POST['NewPassword'];
	$RetypePassword = $_POST['RetypePassword'];

	if(isset($_POST['position'])) {
		$stmt = "UPDATE OFFICER SET position = '".$position."' WHERE student_id =".$student_id;
		$result = mysqli_query($mysqli, $stmt);
	}

	if(isset($_POST['Oldpassword'])) {
		$query = "UPDATE OFFICER SET LOGIN_PASSWORD ='".$NewPassword."' WHERE STUDENT_ID = ".$student_id;
		$result = mysqli_query($mysqli, $query);
	}

	header("Location: adminOfficers.php");
?>