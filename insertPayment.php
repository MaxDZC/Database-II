
<?php
	session_start();
 	require ("sql_connect.php");

    if(isset($_SESSION['username'])) {
    	$student_id = $_POST['student_id'];
        $description = $_POST['description'];
        $payment_amount = $_POST['payment_amount'];
        $date_paid = $_POST['date_paid'];
        $payment_receiver = $_POST['payment_receiver'];
        $checkbox = $_POST['memButton'];

        $answer = mysqli_query($mysqli, "SELECT * FROM MEMBERSHIP_STATUS WHERE student_id = ".$student_id);
        $row = mysqli_num_rows($answer);
            if($row == 0) {
                $answer = mysqli_query($mysqli, "INSERT INTO MEMBERSHIP_STATUS (student_id, school_year) VALUES ('".$student_id."', '2016 - 2017')");
            }

        if($checkbox == "1") {
            $description = "Membership Fee";
            $do = mysqli_query($mysqli, "SELECT * FROM MEMBERSHIP_STATUS WHERE student_id = '".$student_id."' AND school_year = '2016 - 2017'");
            $data = mysqli_fetch_array($do);

            if($data[3] === 'No - Unpaid') {
                $do = mysqli_query($mysqli, "UPDATE MEMBERSHIP_STATUS SET membership_active = 'Yes - Paid' WHERE student_id = ".$student_id);
            }
        }

		$query = "INSERT INTO PAYMENT (student_id, description, payment_amount, date_paid, payment_receiver) VALUES ('".$student_id."','".$description."', ".$payment_amount." , '".$date_paid."' ,'".$payment_receiver."')";

		$result = mysqli_query($mysqli, $query);

		if ($result){
		 	header("location: adminPayments.php");
		} else {
		 	header("location: errorAdding.php");
		}
    }else {
    	header("Location:index.php");
    }
?>
