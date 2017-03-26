<?php
    require("sql_connect.php");
    session_start();

    $student_id = $_POST['id_number'];

    $query = "SELECT * FROM STUDENT WHERE student_id = ".$student_id;
    $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) == 0){
    	header("location: noStud.php");
    }

    $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/member.css">
<link href="assets/css/style-red.css" rel="stylesheet" />
</head>
<body>

	<section id="team">
		<div class="container">
			<div class="row text-center header animate-in" data-anim-type="fade-in-up">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style= "padding-top: 60px">
					<h3>Member's Profile </h3>
					<hr/>
				</div>
			</div>
			<div>
				<div class="col-xs-12 col-md-6 col-lg-6" style= "padding-left: 0px" >
					<div>
						<div>
							<div class=" col-md-4 " style= "padding-top: 90px">
								<img src="img/unisex.png">
							</div>
							<div class="col-xs-12 col-sm-3 col-md-2 " style= "color: rgb(228, 79, 79); padding-top: 120px">
								<h5> <strong> NAME: </strong></h5>
								<h5> <strong> COURSE: </strong></h5>
								<h5> <strong> ID#: </strong></h5>
								<a href="index.php"><button class="btn btn-primary">Back</button></a>
							</div>

							<div class="col-xs-12 col-sm-3 col-md-4 " style= " padding-top: 120px">
								<h5>  <?php echo $data[3].", ".$data[1]." ".$data[2]; ?></h5>
								<h5>  <?php echo $data[4]; ?> </h5>
								<h5>  <?php echo $data[0]; ?> </h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-2 ">
					<div class="team-wrapper">
						<center><h5><b>Payments</b></h5></center>
						<div class="team-inner" >
							<center>
								<img src="img/pay.png" id="imgOnClickP" style="cursor:pointer">
							</center>
						</div>
						<div class="description" style= "padding: 5px">
							<h3> Payment History</h3>
						</div>
					</div>
				</div>

				<div id="myModal1"  class="modal">
	              	<div class="modal-content">
	                	<span class="close">&times;</span>
                    	<div class="row">
	                  		<div class="col-sm-10 col-sm-offset-1">
	                            <input style="color:black" type="text" id="myInput" onkeyup="myFunction()" placeholder="Input values">
	                            <span style="color:black">Click the headers to sort!</span><br><br>
	                      		<table id=myTable" class="tablesorter table table-bordered" style= "color: rgb(228, 79, 79)">
	                      			<thead>
	                          		<th><center>Reciept Number</center></th>
	                          		<th><center>Description</center></th>
	                          		<th><center>Paid amount</center></th>
	                          		<th><center>Date paid</center></th>
	                          		<th><center>Receiver</center></th>
	                          		</thead>

	                          		<tbody>
		                          	<?php
		                          		$get = mysqli_query($mysqli, "SELECT * FROM PAYMENT WHERE student_id = ".$student_id." AND description != 'Officership'");
		                            	while($row = mysqli_fetch_array($get)){
		                                	echo "<tr>
		                                			<td>".$row[0]."</td>
		                                			<td>".$row[2]."</td>
		                                  			<td>".$row[3]."</td>
		                                  			<td>".date("F j, Y", strtotime($row[4]))."</td>
		                                 			<td>".$row[5]."</td>
		                                 		</tr>";
		                            	}
		                          	?>
		                          	</tbody>
	                      		</table>
	                  		</div>
	            		</div>
          			</div>
	            </div>
				<div class="col-xs-12 col-sm-3 col-md-2">
					<div class="team-wrapper">
						<center><h5><b>CES</b></h5></center>
						<div class="team-inner" >
							<center><img src="img/ces.png" id="imgOnClickC" style="cursor:pointer"></center>
						</div>
						<div class="description" style= "padding: 5px">
							<h3> Community Extension Service</h3>
						</div>
					</div>
				</div>

				<div id="myModal2"  class="modal">
	              	<div class="modal-content">
	                	<span class="close">&times;</span>
	                    <div class="row">
						    <div class="col-sm-10 col-sm-offset-1">
	                            <input style="color:black" type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Input values">
	                            <span style="color:black">Click the headers to sort!</span><br><br>
						        <table id="myTable2" class="tablesorter table table-bordered" style= "color: rgb(228, 79, 79)">
						        	<thead>
						            <th><center>Title</center></th>
						            <th><center>Venue</center></th>
						            <th><center>Date Start</center></th>
						            <th><center>Date End</center></th>
						            <th><center>Contact Person</center></th>
						            <th><center>Contact Person No.</center></th>
						            </thead>

						            <tbody>
						            <?php
						            	$ces = mysqli_query($mysqli, "SELECT * FROM CES ORDER BY ces_id DESC");
						            	while($cess = mysqli_fetch_array($ces)){
							                echo "<tr>
							                		<td>".$cess[1]."</td>
							                		<td>".$cess[2]."</td>
							                		<td>".date("F j, Y", strtotime($cess[3]))."</td>
							                		<td>".date("F j, Y", strtotime($cess[4]))."</td>
							                		<td>".$cess[7]."</td>
							                		<td>".$cess[8]."</td>
							                	</tr>";
						            	}
						            ?>
						            </tbody>
						        </table>
						    </div>
						</div>
		            </div>
	         	</div>
	   		</div>

			<div class="col-xs-12 col-sm-3 col-md-2">
				<div class="team-wrapper">
					<center><h5><b>EVENT</b></h5></center>
						<div class="team-inner"  >
							<center><img src="img/event.png" id="imgOnClickE" style="cursor:pointer;"></center>
						</div>
						<div class="description" style= "padding: 5px">
							<h3> Events </h3>
						</div>
				</div>
			</div>

			<div id="myModal3"  class="modal">
	          	<div class="modal-content">
	           		<span class="close">&times;</span>
	              	<div class="row">
					    <div class="col-sm-10 col-sm-offset-1">
                            <input style="color:black" type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Input values">
                            <span style="color:black">Click the headers to sort!</span><br><br>
					        <table id="myTable3" class="table table-bordered" style= "color: rgb(228, 79, 79)">
					        	<thead>
					            <th><center>Title</center></th>
					            <th><center>What</center></th>
					            <th><center>Where</center></th>
					            <th><center>When</center></th>
					            </thead>

					            <tbody>
					            <?php
					            	$result = mysqli_query($mysqli, "SELECT * FROM EVENTS");
					            	while($event = mysqli_fetch_array($result)){
					                	echo "<tr>
					                		<td>".$event[1]."</td>
					                		<td>".$event[6]."</td>
					                		<td>".$event[2]."</td>
					                		<td>".date("(h:i A) m/d/Y", strtotime($event[3]))."</td>
					                	</tr>";
					            }
					            ?>
					            </tbody>
					        </table>
					    </div>
					</div>
	          	</div>
            </div>
		</div>
	</section>


<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.js"></script>
<!-- EASING SCROLL SCRIPTS PLUGIN -->
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<!-- VEGAS SLIDESHOW SCRIPTS -->
<script src="assets/js/jquery.easing.min.js"></script>
<!-- FANCYBOX PLUGIN -->
<script src="assets/js/source/jquery.fancybox.js"></script>
<!-- ISOTOPE SCRIPTS -->
<script src="assets/js/jquery.isotope.js"></script>
<!-- VIEWPORT ANIMATION SCRIPTS   -->
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.pager.js"></script>
</body>
</html>


<script>
    var modal1 = document.getElementById('myModal1');
    var img1 = document.getElementById("imgOnClickP");
    var span = document.getElementsByClassName("close")[0];

    var modal2 = document.getElementById('myModal2');
    var img2 = document.getElementById("imgOnClickC");
    var span2 = document.getElementsByClassName("close")[1];

    var modal3 = document.getElementById('myModal3');
    var img3 = document.getElementById("imgOnClickE");
    var span3 = document.getElementsByClassName("close")[2];


    img1.onclick = function() {
        modal1.style.display = "block";
    }

    span.onclick = function() {
        modal1.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }else if(event.target == modal2){
			modal2.style.display = "none";
        }else if(event.target == modal3){
        	modal3.style.display = "none";
        }
    }


    img2.onclick = function() {
        modal2.style.display = "block";
    }

    span2.onclick =function(){
    	modal2.style.display = "none"; 
    }



    img3.onclick = function() {
        modal3.style.display = "block";
    }

    span3.onclick =function(){
    	modal3.style.display = "none"; 
    }


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

function myFunction2() {
  // Declare variables 
  var input, filter, table, tr, i, td, j;
  var bool;

  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

function myFunction3() {
  // Declare variables 
  var input, filter, table, tr, i, td, j;
  var bool;

  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
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