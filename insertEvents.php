
<?php
	session_start();
 	require ("sql_connect.php");

        $tit = $_POST['title'];
        $ven = $_POST['venue'];
        $start = $_POST['dstart'];
        $end = $_POST['estart'];
        $organ = $_POST['org'];
        $descrip = $_POST['desc'];
        $mand = $_POST['mandat'];
        $audT = $_POST['audTarg'];

        if($mand == "1"){
            $mand = 1;
        } else {
            $mand = 0;
        }

        $result = mysqli_query($mysqli, "INSERT INTO `events`(`event_id`, `event_title`, `event_venue`, `event_date_start`, `event_date_end`, `event_organizer`, `event_description`, `mandatory_status`, `target_audience`) VALUES (NULL,'".$tit."','".$ven."','".$start."','".$end."','".$organ."','".$descrip."', ".$mand." ,'".$audT."')");

		if ($result){
		 	header("location: adminEvents.php");
		}else{
		 	header("location: errorAdding.php");
		}
?>
