<?php
	include("sql_connect.php");
	session_start();

    if(!isset($_SESSION['username'])) {
        header("location:index.php");
    }

	$result = mysqli_query($mysqli, "SELECT * FROM STUDENT WHERE student_id = ".$_GET['eid']);

	$data = mysqli_fetch_row($result);

	$studStat = mysqli_query($mysqli, "SELECT * FROM MEMBERSHIP_STATUS WHERE student_id = ".$_GET['eid']);

	$ces = mysqli_query($mysqli, "SELECT * FROM CES_PARTICIPATION WHERE student_id = ".$_GET['eid']);

	$events = mysqli_query($mysqli, "SELECT * FROM EVENT_ATTENDANCE WHERE student_id = ".$_GET['eid']);

	$officer = mysqli_query($mysqli, "SELECT * FROM OFFICER WHERE student_id = ".$_GET['eid']);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Administrator View</title>

    <!-- Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">

	<style>
		.top {
			display: block;
			padding: 16px;
			font-weight: bold;
			color: black;
		}

		.panel-body span {
			font-size: 20px;
		}

	</style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
        <a href="#"><span class = "top">Organization Administrative System</span></a>
        <ul class="nav navbar-nav hidden-md-down">
		
			<li class="nav-item px-1">
				<a class = "nav-link" href = "admin.php"> Dashboard </a>
			</li>
        </ul>
		
		<ul class="nav navbar-nav ml-auto">
                <span class = "nav-link dropdown-toggle" data-toggle="dropdown" role="button">
                    <img src="img/profile/default.png" class="img-avatar">
                    <span class="hidden-md-down">
						<?php
							echo "$_SESSION[username]";
						?>
					</span>
                </span>				
                <li>
                    <a class="dropdown-item" href="logOut.php"><i class="fa fa-lock"></i> Logout</a>
                </li>

        </ul>
    </header>

    <div class="app-body">
        <?php require("sidebar.php");?>

        <!-- Main content -->
        <main class="main">
            <br><br>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class='col-sm-10 col-sm-offset-1'>
                    		<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Student Record View</h3>
								</div>
								<br>

								<div class="panel-body">
									<span>ID Number: <?php echo $data[0]; ?></span><br><br>
									<span>Name: <?php echo $data[3]. ", ".$data[1]. " ".$data[2]; ?></span><br><br>
									<span>Course and Year: <?php echo $data[4]."-".$data[5]; ?></span><br><br>
									<?php
										$numOff = mysqli_num_rows($officer);

										echo "<span>Officership Status: ";
										if($numOff == 1){
											$off = mysqli_fetch_array($officer);
											echo " ".$off[3];
										} else {
											echo "Not an Officer";
										}
										echo "</span><br><br>";

										if($stat = mysqli_fetch_array($studStat)) {
                                            echo 
                                                "<span>Student Status: ".$stat[1]."</span><br><br>
                                                 <span>Membership Status: ".$stat[3]."</span><br><br>";
                                        } else {
                                            echo 
                                                "<span>Student Status: None</span><br><br>
                                                 <span>Membership Status: None</span><br><br>";
                                        }

                                        $numEvents = mysqli_num_rows($events);

                                        echo "<span>Number of Events Attended: ".$numEvents."</span><br><br>";

                                        $numCES = mysqli_num_rows($ces);

                                        echo "<span>Number of CES Completed: ".$numCES."</span><br><br>";

                                        if($numEvents > 0) {

                                        	echo "<span>List of Events Attended :: Click the headers to sort!</span>
						                            <table id = 'eventTable' class='tablesorter table table-bordered'>
						                                <thead>
						                                <tr>
						                                <th>Event ID</th>
						                                <th>Event Name</th>
						                                <th>Event Date</th>
						                                </tr>
						                                </thead>
						                                <tbody>";
		                                    while($event = mysqli_fetch_array($events)){
		                                    	$query = "SELECT * FROM EVENTS WHERE EVENT_ID = ".$event[1];

		                                    	$values = mysqli_query($mysqli, $query);
		                                    	$answers = mysqli_fetch_array($values);

	                                        echo 
	                                            "<tr>
	                                                <td>".$event[1]."</td>
	                                                <td>".$answers[1]."</td>
	                                                <td>".date("M j, Y",strtotime($event[2]))."</td>
                                                </tr>";
	                                    	}

	                                    	echo '</table>
							                    <div id="pager" class="pager" style="top: 687px; position: absolute;">
							                        <form>
							                            <img src="addons/pager/icons/first.png" class="first">
							                            <img src="addons/pager/icons/prev.png" class="prev">
							                            <input type="text" class="pagedisplay">
							                            <img src="addons/pager/icons/next.png" class="next">
							                            <img src="addons/pager/icons/last.png" class="last">
							                            <select class="pagesize">
							                                <option selected="selected" value="10">10</option>
							                                <option value="20">20</option>
							                                <option value="30">30</option>
							                                <option value="40">40</option>
							                            </select>
							                        </form>
							                    </div>';
                                    	}

                                        if($numCES > 0) {

                                        	echo "<span>List of CES Completed :: Click the headers to sort!</span>
						                            <table id = 'cesTable' class='tablesorter table table-bordered'>
						                                <thead>
						                                <tr>
						                                <th>CES ID</th>
						                                <th>CES Name</th>
						                                <th>CES Date</th>
						                                </tr>
						                                </thead>
						                                <tbody>";
		                                    while($cesdata = mysqli_fetch_array($ces)){
		                                    	$com = "SELECT * FROM CES WHERE CES_ID = ".$cesdata[1];

		                                    	$comps = mysqli_query($mysqli, $query);
		                                    	$cess = mysqli_fetch_array($comps);

	                                        echo 
	                                            "<tr>
	                                                <td>".$cesdata[1]."</td>
	                                                <td>".$cess[1]."</td>
	                                                <td>".date("M j, Y",strtotime($cesdata[2]))."</td>
                                                </tr>";
	                                    	}

	                                    	echo '</table>
							                    <div id="pager2" class="pager" style="top: 687px; position: absolute;">
							                        <form>
							                            <img src="addons/pager/icons/first.png" class="first">
							                            <img src="addons/pager/icons/prev.png" class="prev">
							                            <input type="text" class="pagedisplay">
							                            <img src="addons/pager/icons/next.png" class="next">
							                            <img src="addons/pager/icons/last.png" class="last">
							                            <select class="pagesize">
							                                <option selected="selected" value="10">10</option>
							                                <option value="20">20</option>
							                                <option value="30">30</option>
							                                <option value="40">40</option>
							                            </select>
							                        </form>
							                    </div>';
                                    	}

                                    	
 									?>


								</div>
							</div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
            </div>
            <!-- /.conainer-fluid -->
        </main>


    </div>

    <footer class="app-footer">
        <a href="#">Datalogics Society</a> © 2017
    </footer> 
</body>
</html>

<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/tether/dist/js/tether.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/pace/pace.min.js"></script> /-->
<script src="js/jquery-3.1.1.min.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="vendor/jquery/jquery.js"></script>/-->
<script src="js/app.js"></script>
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.pager.js"></script>
<script src="js/migrate.js"></script>
<!--<script src="js/jquery.tablesorter.min.js"></script>
<!--<script src="js/views/main.js"></script>/-->

<script>

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();

$(document).ready(function() { 
    //$("#myTable").tablesorter(); 
    $("#eventTable") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")});

    $("#cesTable") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager2")});

    $(".confirm").on("click",function(){
        return confirm("Perform this action?");
    });
    
}); 



function myFunction() {
  // Declare variables 
  var input, filter, table, tr, i, td, j;
  var bool;

  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        bool = true;
        for(j = 0; j < 5 && bool; j++){
            td = tr[i].getElementsByTagName("td")[j];
            if(td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    bool = false;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}

</script>