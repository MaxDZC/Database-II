<?php
    include("sql_connect.php"); 
    include("login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SO Management System</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/fonts.css" rel="stylesheet" type="text/css">
    <link hr
    ef='css/kash.css' rel='stylesheet' type='text/css'>
    <link href='css/italics.css' rel='stylesheet' type='text/css'>
    <link href='css/roboto.css' rel='stylesheet' type='text/css'>
    <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">SO Management System</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li>
                        <a class="page-scroll" href="#about">About the org</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#announcements">Announcements</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#officer-modal" data-toggle = "modal">Officer</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Datalogics Society</div>
                <div class="intro-heading">Web Version</div>
                <form id='login' onsubmit="return checking()" action='viewStatus.php' method='POST' accept-charset='UTF-8'>
					<!--<fieldset>/-->
						<h3 style="color:white">Enter ID Number:</h3>
						<input type='text' style="color:black" name='id_number' id = 'id_number' maxlength ='8'/>
						<br><br>
						<input class = 'btn btn-primary' type='submit' name='view'/>
				<!--	</fieldset> /-->
				</form>
            </div>
        </div>
    </header>

	<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">The Datalogics Society aims to fix the world and heal all of its wounds.</h3>
                </div>
            </div>
        </div>
		</div>
    </section>
	
    <!-- Portfolio Grid Section -->
    <section id="announcements" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Announcements</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
                <div class="row">

                <?php
                    $result = mysqli_query($mysqli, "SELECT * FROM ANNOUNCEMENT");

                    while($row = mysqli_fetch_array($result)) {
                        echo '
                            <div class="col-md-6 col-sm-6 portfolio-item">
                                <img src="'.$row[4].'" alt="" height="288px" width="288px"><br>
                                <p>'.$row[3].'</p>
                                <span style="font-size: 12px">Posted by '.$row[1].' on '.date("M j, Y", strtotime($row[2])).' </span>
                                <br><br>  
                            </div>';
                    }
                ?>

                </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Datalogics Society 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="officer-modal" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <span style="font-size: 20px"><i>Welcome Officer!</i></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close
                    </button>
                </div>
                <div id="div-forms">

                    <form id="login-form" method="POST" action="index.php">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Officer: Please enter username and password</span>
                            </div>
                            <br>
                            <input name ='name'  id="login_username" class="form-control" type="text" placeholder="Username" required>
                            <br>
                            <input name = 'pass' id="login_password" class="form-control" type="password" placeholder="Password" required>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button name = "submit" type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/agency.min.js"></script>

<script>

function checking()
{

    var string = "<?php echo $ans; ?>";

    alert(string);

    return false;
}

</script>


<?php
	if(strpos($error, " ") !== 0) {
    	echo "<script>alert('$error')</script>";
	}
?>