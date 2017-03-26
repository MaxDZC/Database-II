<?php
	session_start();
	require("sql_connect.php");
	if(isset($_SESSION['username'])) {

		$id = $_POST['event_id'];
        $title = $_POST['event_title'];
        $ven = $_POST['event_venue'];
        $start = $_POST['event_date_start'];
        $end = $_POST['event_date_end'];
        $organ = $_POST['event_organizer'];
        $descrip = $_POST['event_description'];
        $mand = $_POST['mandatory_status'];
        $audT = $_POST['target_audience'];

	    if($mand == "1"){
            $mand = 1;
        } else {
            $mand = 0;
        }

		$stmt = "UPDATE EVENTS SET event_title = '".$title."', event_venue = '".$ven."', event_date_start = '".$start."', event_date_end = '".$end."', event_organizer = '".$organ."', event_description = '".$descrip."', mandatory_status = ".$mand.", target_audience = '".$audT."' WHERE event_id =".$id;

		$result = mysqli_query($mysqli, $stmt);
		if($result){
			header("Location: adminEvents.php");
		}else{
			header("Location: errorAdding.php");
		}
	} else {
		header("Location: index.php");
	}
?>
