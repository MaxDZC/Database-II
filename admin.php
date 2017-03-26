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
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-inverse card-primary">
                                <div class="card-block pb-0">
                                    <h4 class="mb-0">
                                        <?php
                                            $result = mysqli_query($mysqli, "SELECT * FROM STUDENT");

                                            $num = mysqli_num_rows($result);

                                            echo "$num";
                                        ?>
                                    </h4>
                                    <p>Total Student Records</p>
                                </div>
                                <div class="chart-wrapper px-1" style="height:70px;">
                                    <canvas id="card-chart1" class="chart" height="70"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-inverse card-info">
                                <div class="card-block pb-0">
                                    <h4 class="mb-0">
                                        <?php
                                            $result = mysqli_query($mysqli, "SELECT * FROM OFFICER");

                                            $num = mysqli_num_rows($result);

                                            echo "$num";
                                        ?>
                                    </h4>
                                    <p>Total Officers</p>
                                </div>
                                <div class="chart-wrapper px-1" style="height:70px;">
                                    <canvas id="card-chart2" class="chart" height="70"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-inverse card-warning">
                                <div class="card-block pb-0">
                                    <h4 class="mb-0">
                                        <?php
                                            $result = mysqli_query($mysqli, "SELECT * FROM EVENTS");

                                            $num = mysqli_num_rows($result);

                                            echo "$num";
                                        ?>
                                    </h4>
                                    <p>Total Events</p>
                                </div>
                                <div class="chart-wrapper" style="height:70px;">
                                    <canvas id="card-chart3" class="chart" height="70"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-inverse card-danger">
                                <div class="card-block pb-0">
                                    <h4 class="mb-0">
                                        <?php
                                            $result = mysqli_query($mysqli, "SELECT * FROM CES");

                                            $num = mysqli_num_rows($result);

                                            echo "$num";
                                        ?>                                        
                                    </h4>
                                    <p>Total CES</p>
                                </div>
                                <div class="chart-wrapper px-1" style="height:70px;">
                                    <canvas id="card-chart4" class="chart" height="70"></canvas>
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
<script language="JavaScript" type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="vendor/jquery/jquery.js"></script>
<script src="js/app.js"></script>
<!--<script src="js/views/main.js"></script>/-->