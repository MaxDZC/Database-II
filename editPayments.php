<?php
    include("sql_connect.php");
    session_start();

    if(!isset($_SESSION['username'])) {
        header("location:index.php");
    }

    $result = mysqli_query($mysqli, "SELECT * FROM PAYMENT WHERE receipt_num = ".$_GET['eid']);
    $data = mysqli_fetch_row($result);
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
                        <div class='col-sm-6 col-sm-offset-1'>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit Payment Information</h3>
                                </div>
                            </div>
                            
                            <form name="myForm" method="POST" action="updatePayment.php">
                                <input type="text" value="<?php echo $data[0]; ?>" name="receipt_num" class="form-control" hidden><br>
                                <input type="text" value="<?php echo $data[1]; ?>" name="student_id" placeholder="Student ID" class="form-control" ><br>
                                <input type="text" value="<?php echo $data[2]; ?>" name="description" placeholder="Enter Description" class="form-control"><br>
                                <input type="text" value="<?php echo $data[3]; ?>" name="payment_amount" placeholder="Enter New Payment Amount" class="form-control" ><br>
                                <input type="date" value="<?php echo $data[4]; ?>" name="date_paid" placeholder="Retype Password" class="form-control" ><br>
                                <input type="text" value="<?php echo $data[5]; ?>" name="payment_receiver" placeholder="New Receiver" class="form-control" ><br>
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


function validateForm() {
    var oldp = document.forms["myForm"]["Oldpassword"].value;
    var newp = document.forms["myForm"]["NewPassword"].value;
    var retp = document.forms["myForm"]["RetypePassword"].value;

    if(oldp !== "") {
        var realoldp = "<?php echo $data[2]; ?>";
        if(oldp === realoldp) {
            if(newp === retp) {
                return true;
            } else {
                alert("The new and retyped passwords do not match!");
                return false;
            }
        } else {
            alert("Wrong old password has been entered!");
            return false;
        }
    } else {
        return true;
    }
}


</script>