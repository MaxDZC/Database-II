<?php
	session_start();
	require("sql_connect.php");
	if(isset($_SESSION['username'])) {

		$ces_id = $_POST['ces_id'];
        $ces_title = $_POST['ces_title'];
        $ces_venue = $_POST['ces_venue'];
        $ces_date_start = $_POST['ces_date_start'];
        $ces_date_end = $_POST['ces_date_end'];
        $ces_description = $_POST['ces_description'];
        $ces_organizer = $_POST['ces_organizer'];
        $ces_contact_person = $_POST['ces_contact_person'];
        $ces_contact_pnum = $_POST['ces_contact_pnum'];

		$stmt = "UPDATE CES SET ces_title = '".$ces_title."', ces_venue = '".$ces_venue."', ces_date_start = '".$ces_date_start."', ces_date_end = '".$ces_date_end."', ces_description = '".$ces_description."', ces_organizer = '".$ces_organizer."', ces_contact_person = ".$ces_contact_person.", ces_contact_pnum = '".ces_contact_pnum."' WHERE ces_id =".$ces_id;

		$result = mysqli_query($mysqli, $stmt);
		if($result){
			header("Location: adminCES.php");
		}else{
			header("Location: errorAdding.php");
		}
	} else {
		header("Location: index.php");
	}
?>