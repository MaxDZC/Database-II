<?php
	session_start();
 	require ("sql_connect.php");

 		$date = date("Y-m-d");

        $query = "INSERT INTO CES_PARTICIPATION VALUES ('".$_POST['student_id']."', ".$_GET['id'].", '".$date."')";
        $result = mysqli_query($mysqli, $query);

	if ($result){
	 	header("location: adminCESP.php");
	}else{
	 	header("location: errorAdding.php");
	}
?>
