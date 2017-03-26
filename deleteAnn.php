<?php
	session_start();

	if (!isset($_GET['id'])){
		header("location:errorAdding.php");
	}

	require("sql_connect.php");

	$stmt = "DELETE FROM ANNOUNCEMENT WHERE announcement_id = ".$_GET['id'];
	$result = mysqli_query($mysqli,$stmt);
	
	if($result){
		header("location: adminAnnouncements.php");
	}else{
		header("Location: errorAdding.php");
	}
?>