<?php 
	session_start();
    include("sql_connect.php");

    if(!isset($_SESSION['username'])) {
        header("location:index.php");
    }
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
                        <div class='col-sm-6 col-sm-offset-1'>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Student Record</h3>
                                </div>
                            </div>
                            <form method="POST" action="insertStudent.php">
                                <input type="text" name="student_id" placeholder="Student ID" class="form-control" required><br>
                                <input type="text" name="first_name" placeholder="First Name" class="form-control" required><br>
                                <input type="text" name="middle_name" placeholder="Middle Name" class="form-control"><br>
                                <input type="text" name="last_name" placeholder="Last Name" class="form-control" required><br>
                                <input type="text" name="program"  placeholder="Course" class="form-control" required><br>

                                <select class="form-control" name="standing_year" required>
                                    <option value = "" selected>Select Year Level</option>
                                    <option value = "1">1</option>
                                    <option value = "2">2</option>
                                    <option value = "3">3</option>
                                    <option value = "4">4</option>
                                    <option value = "5">5</option>
                                </select>

                                <br>
                                <button class="btn btn-success pull-right">Submit</button>
                            </form>

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

$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 

$(document).ready(function() { 
    $("table") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
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