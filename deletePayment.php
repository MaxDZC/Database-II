<?php
	if (!isset($_GET['eid'])){
		header("location:errorAdding.php");
	}

	require("sql_connect.php");

	$stmt = "DELETE FROM PAYMENT WHERE receipt_num = ".$_GET['eid'];

	$result = mysqli_query($mysqli, $stmt);

	if($result){
		header("location: adminPayments.php");
	} else {
		header("Location: errorAdding.php");
	}
?>