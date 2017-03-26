<?php
	session_start();
 	require ("sql_connect.php");

 		$date = date("Y-m-d");

        $query = "INSERT INTO `event_attendance` (`student_id`, `event_id`, `event_date`) VALUES ('".$_POST['student_id']."', ".$_GET['id'].", '".$date."')";
        $result = mysqli_query($mysqli, $query);

	if ($result){
	 	header("location: adminAttendance.php");
	}else{
	 	header("location: errorAdding.php");
	}
?>
