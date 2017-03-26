<?php
	require("sql_connect.php");
	session_start();
	if(isset($_SESSION['username'])) {
		$receipt_num = $_POST['receipt_num'];
		$student_id = $_POST['student_id'];
		$description = $_POST['description'];
		$payment_amount = $_POST['payment_amount'];
		$date_paid = $_POST['date_paid'];
		$payment_receiver = $_POST['payment_receiver'];

		
		$stmt = "UPDATE PAYMENT SET student_id = '".$student_id."', description = '".$description."', payment_amount = ".$payment_amount.", date_paid = '".$date_paid."', payment_receiver = '".$payment_receiver."' WHERE receipt_num =".$receipt_num;

		$result = mysqli_query($mysqli, $stmt);
		if($result){
			header("Location: adminPayments.php");
		}else{
			header("Location: errorAdding.php");
		}
	} else {
		header("Location: index.php");
	}
?>