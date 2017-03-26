<?php
        var_dump($_FILES);
	session_start();
 	require ("sql_connect.php");

        $username = $_SESSION['username'];

        $get = mysqli_query($mysqli, "SELECT * FROM OFFICER WHERE username = '".$username."'");
        $data = mysqli_fetch_array($get);

        $student_id = $data[0];
        $message = $_POST['message'];
        $dest = "img/";

        $dest = $dest.basename($_FILES['photo']['name']);
        if($_FILES['photo']['error'] == 0) {
                move_uploaded_file($_FILES['photo']['tmp_name'], $dest);

                $result = mysqli_query($mysqli, "INSERT INTO ANNOUNCEMENT VALUES (NULL, '".$student_id."', '".date("Y-m-d H:i:s")."', '".$message."', '".$dest."')");

                if ($result){
                        header("location: adminAnnouncements.php");
                } else {
                        header("location: errorAdding.php");
                }
        }
?>
