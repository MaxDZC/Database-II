<?php
	require("sql_connect.php");

	$student_id = $_POST['student_id'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$program = $_POST['program'];
	$standing_year = $_POST['standing_year'];

	$stmt = "UPDATE STUDENT SET first_name = '".$first_name."', middle_name = '".$middle_name."', last_name = '".$last_name."',
				program = '".$program."', standing_year = '".$standing_year."' WHERE student_id =".$student_id;


	$result = mysqli_query($mysqli,$stmt);

	if($result){
		header("Location: adminStuds.php");
	}else{
		header("Location: errorAdding.php");
	}

?>