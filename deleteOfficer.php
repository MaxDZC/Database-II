<?php
	session_start();

	if (!isset($_GET['eid'])){
		header("location:errorAdding.php");
	}

	require("sql_connect.php");

//	$query = "SELECT FROM OFFICER WHERE student_id = ".$_GET['eid'];
	$data = mysqli_query($mysqli, "SELECT * FROM OFFICER WHERE student_id = ".$_GET['eid']);
	$value = mysqli_fetch_array($data);


	if(strpos($_SESSION['username'], $value[1]) !== 0) {
		$stmt = "DELETE FROM OFFICER WHERE student_id = ".$_GET['eid'];
		$result = mysqli_query($mysqli,$stmt);

		$stmt = "DELETE FROM PAYMENT WHERE student_id = ".$_GET['eid']." AND description = 'Officership'";
		$result = mysqli_query($mysqli, $stmt);
		
		if($result){
			header("location: adminOfficers.php");
		}else{
			header("Location: errorAdding.php");
		}
	} else {
		header("Location: adminOfficers.php");
	}
?>