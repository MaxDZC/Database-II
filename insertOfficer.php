<?php
	session_start();
 	require ("sql_connect.php");

    if(isset($_SESSION['username'])) {
        $username = $_POST['username'];

    	$query = "SELECT * FROM OFFICER WHERE username = '".$username."'";
    	$result = mysqli_query($mysqli, $query);
    	$num = mysqli_num_rows($result);

    	if($num != 0) {
    		header("Location: errorAdding.php");
    	} else {
            $student_id = $_POST['student_id'];
            $login_password = $_POST['login_password'];
            $position = $_POST['position'];
            $school_year = $_POST['school_year'];

			$query = "INSERT INTO OFFICER VALUES
			 			('".$student_id."', '".$username."','".$login_password."','".$position."')";

			$result = mysqli_query($mysqli, $query);

			if ($result){
                $date = date("Y-m-d");
                $query = "INSERT INTO PAYMENT VALUES (NULL, '".$student_id."', 'Officership', 0, '".$date."', 'Self')";
                $result = mysqli_query($mysqli, $query);
                
                $stmt = "INSERT INTO MEMBERSHIP_STATUS (student_id, school_year, membership_active) VALUES ('".$student_id."', '".$school_year."', 'Yes - Attends Meetings')";
                $result = mysqli_query($mysqli, $stmt);

			 	header("location: adminOfficers.php");
			}else{
			 	header("location: errorAdding.php");
			}
		}
    } else {
    	header("Location:index.php");
    }
?>
