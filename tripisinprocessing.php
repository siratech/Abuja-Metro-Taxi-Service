<?php
	include('session.php');
	include('header.php'); 
	
	$id=$_POST['id'];
	$status =2;
	//$thetime= date("l jS \of F Y h:i:s A");
	$thetime= date("jS \of F Y h:i:s A");

	$destination=$_POST['destination'];
	$location = $_POST['location'];


	mysqli_query($conn,"UPDATE `trips` SET `atthistime`='$thetime',`status`='$status' WHERE `id`='$id'");
	$pid=mysqli_insert_id($conn);
	
	//$location ="12.942008559662218, 7.5998739912312105";
	//$destination = "9.03994769626838, 7.524335493673598";
	?>
<div id="map">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <center><h2>Abuja Metro Taxi Service</h2>
                                    <p>Trip on Processing</p></center>
        <a href="history.php" class="btn btn-success btn-lg btn-block"><span class="fa fa-car"></span> Done</a>
                      
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                        </div>
					</div>
                        <!-- /.col-lg-12 -->
                    </div>
<script>
var map = L.map('map').setView([0, 14], 14);
L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=Uga61sHk06s4UChaUTEr',{
attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
crossOrigin: true
}).addTo(map);
var loc= L.marker([<?php echo $location; ?>]).addTo(map);
var dis= L.marker([<?php echo $destination; ?>]).addTo(map);

loc.bindPopup("<b>Location</b><br>Where I am a From</br>").openPopup();
dis.bindPopup("<b>Distination</b><br>Where I am Going</br>").openPopup();
    </script>