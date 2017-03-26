<?php
	session_start();

	if (!isset($_GET['id'])){
		header("location:errorAdding.php");
	}

	require("sql_connect.php");

	$stmt = "DELETE FROM EVENT_ATTENDANCE WHERE student_id = ".$_GET['id']." AND event_id = ".$_GET['event_id'];
	$result = mysqli_query($mysqli,$stmt);
	
	if($result){
		header("location: adminAttendance.php");
	}else{
		header("Location: errorAdding.php");
	}
?>