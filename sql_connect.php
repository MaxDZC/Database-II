<?php
	$mysqli = new mysqli("localhost", "root", "", "organization");

	/* check connection */
	if (!$mysqli) {
		/*mysqli_connect_errno()*/ // Returns Error Number
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
?>