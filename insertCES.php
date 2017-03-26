
<?php
	session_start();
 	require ("sql_connect.php");

        $tit = $_POST['ces_title'];
        $ven = $_POST['ces_venue'];
        $start = $_POST['ces_date_start'];
        $end = $_POST['ces_date_end'];
        $descrip = $_POST['ces_description'];        
        $organ = $_POST['ces_organizer'];
        $mand = $_POST['ces_contact_person'];
        $audT = $_POST['ces_contact_pnum'];

        $result = mysqli_query($mysqli, "INSERT INTO `ces`(`ces_id`, `ces_title`, `ces_venue`, `ces_date_start`, `ces_date_end`, `ces_description`, `ces_organizer`, `ces_contact_person`, `ces_contact_pnum`) VALUES (NULL,'".$tit."','".$ven."','".$start."','".$end."','".$descrip."','".$organ."', '".$mand."' ,'".$audT."')");

		if ($result){
		 	header("location: adminCES.php");
		}else{
		 	header("location: errorAdding.php");
		}
?>
