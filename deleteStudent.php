<?php
	if (!isset($_GET['eid'])){
		header("location:errorAdding.php");
	}

	require("sql_connect.php");

	$stmt = "DELETE FROM STUDENT WHERE student_id = ".$_GET['eid'];

	$result = mysqli_query($mysqli,$stmt);

	if($result){
		header("location: adminStuds.php");
	}else{
		header("Location: errorAdding.php");
	}
?>