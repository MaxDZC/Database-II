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
                        <div class='col-sm-12 col-sm-offset-1'>
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Input values">
                            <span>Click the headers to sort!</span><br><br>
                            <table id = "myTable" class="tablesorter table table-bordered">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Poster ID</th>
                                <th>Timestamp</th>
                                <th>Picture</th>
                                <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $result = mysqli_query($mysqli, "SELECT * FROM ANNOUNCEMENT");

                                    while($row = mysqli_fetch_array($result)){
                                        echo 
                                            "<tr>
                                                <td>".$row[0]."</td>
                                                <td>".$row[1]."</td>
                                                <td>".$row[2]."</td>
                                                <td><img src='".$row[4]."'; height='144px' width='144px'></td>
                                                <td>
                                                    <a href='viewAnn.php?eid=".$row[0]."'>
                                                    <button class='btn btn-sm btn-primary'>
                                                    <span class='fa fa-eye'>
                                                    </span>
                                                    </button>
                                                    </a>

                                                    <a href='editAnn.php?eid=".$row[0]."' class='edit'>
                                                    <button class='btn btn-sm btn-warning'>
                                                    <span class='fa fa-pencil'>
                                                    </span>
                                                    </button>
                                                    </a>

                                                    <a href='deleteAnn.php?id=".$row[0]."' class='delete'>
                                                    <button class='btn btn-sm btn-danger'>
                                                    <span class='fa fa-trash'>
                                                    </span>
                                                    </button>
                                                    </a>
                                                </td>
                                                </tr>";
                                    }                                     
                                ?>
                                </tbody>
                            </table>
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
                            </div>
                            <?php
                                if(0 === strpos($_SESSION['username'], "admin")) {
                                    echo '<a href="addAnnouncement.php" class ="btn btn-primary" role="button">Add</a>';
                                }
                            ?>
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
    $("table") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")});


    $(".edit").on("click",function(){
        return confirm("Do you want to edit this row?");
    });

    $(".delete").on("click",function(){
        return confirm("Are you sure you want to delete this announcement?");
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