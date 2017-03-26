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
                                    <h3 class="panel-title">Add Person to Attendance</h3>
                                </div>
                            </div>
                            <form name="myForm" method="POST" action="insertPCESP.php?id=<?php echo $_GET['id']; ?>">
                                <select class="form-control" name="student_id" required>
                                    <option value = "" selected>Please select a student</option>
                                    <?php
                                        $result = mysqli_query($mysqli, "SELECT * FROM STUDENT");

                                        while($data = mysqli_fetch_array($result)) {
                                            $get = mysqli_query($mysqli, "SELECT * FROM CES_PARTICIPATION WHERE ces_id = '".$_GET['id']."'");
                                            $limit = mysqli_num_rows($get);
                                            for($ndx = 0; $ndx < $limit; $ndx++) {
                                                $values = mysqli_fetch_array($get);
                                                if($data[0] == $values[0]){
                                                    break;
                                                }
                                            }
                                            if($ndx == $limit){ 
                                                echo "<option value='".$data[0]."'>".$data[0]." - ".$data[3].", ".$data[1]." ".$data[2]."</option>";
                                            }
                                        }

                                    ?>
                                </select><br>
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

function validate() {
    var pass = document.forms["myForm"]["login_password"].value;
    var conf = document.forms["myForm"]["confirm_password"].value;

    if(pass === conf) {
        return true;
    } else {
        alert("Passwords do not match!");
        return false;
    }
}
</script>