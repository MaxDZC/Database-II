<?php
	session_start();

	if (!isset($_GET['id'])){
		header("location:errorAdding.php");
	}

	require("sql_connect.php");

	$stmt = "DELETE FROM CES_PARTICIPATION WHERE student_id = ".$_GET['id']." AND ces_id = ".$_GET['event_id'];
	$result = mysqli_query($mysqli,$stmt);
	
	if($result){
		header("location: adminCESP.php");
	}else{
		header("Location: errorAdding.php");
	}
?>