<?php
	session_start();
	require("sql_connect.php");
	if(isset($_SESSION['username'])) {

		$ann_id = $_POST['ann_id'];
		$message = $_POST['message'];

		if(is_uploaded_file($_FILES['photo']['tmp_name'])){
			$dest = "img/";
			$dest = $dest.basename($_FILES['photo']['name']);
			if($_FILES['photo']['error'] == 0){
				move_uploaded_file($_FILES['photo']['tmp_name'], $dest);

				$stmnt = "UPDATE ANNOUNCEMENT SET message = '".$message."', picture = '".$dest."' WHERE announcement_id = ".$ann_id;
			}
		} else {
			$stmnt = "UPDATE ANNOUNCEMENT SET message = '".$message."' WHERE announcement_id = ".$ann_id;
		}

		$result = mysqli_query($mysqli, $stmnt);

		if($result){
			header("location: adminAnnouncements.php");
		} else {
			header("location:errorAdding");
		}
	}

?>