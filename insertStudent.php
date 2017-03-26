
<?php
	session_start();
 	require ("sql_connect.php");

    if(isset($_SESSION['username'])) {
    	$student_id = $_POST['student_id'];

    	$query = "SELECT * FROM STUDENT WHERE student_id = '".$student_id."'";
    	$result = mysqli_query($mysqli, $query);
    	$num = mysqli_num_rows($result);
    	if($num != 0) {
    		header("Location: errorAdding.php");
    	} else {
    		$first_name = $_POST['first_name'];
    		$middle_name = $_POST['middle_name'];
    		$last_name = $_POST['last_name'];
    		$program = $_POST['program'];
    		$standing_year = $_POST['standing_year'];

			$query = "INSERT INTO STUDENT VALUES
			 			('".$student_id."', '".$first_name."','".$middle_name."','".$last_name."' ,'".$program."','".$standing_year."')";

			$result = mysqli_query($mysqli, $query);

			if ($result){
			 	header("location: adminStuds.php");
			}else{
			 	header("location: errorAdding.php");
			}
		}
    } else {
    	header("Location:index.php");
    }
?>
