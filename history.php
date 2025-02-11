<?php 
include('session.php');
include('header.php'); 
?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <center><h2>Abuja Metro Taxi Service</h2>
                                    <p>Trip History</p>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
     
		<a href="taketrip.php" class="btn btn-success btn-lg"><span class="fa fa-car"></span> Make New Trip</a>
		<a href="menu.php" class="btn btn-primary btn-lg"><span class="fa fa-history"></span> Trip</a>
		<a href="history.php" class="btn btn-warning btn-lg"><span class="fa fa-history"></span>Trip History</a>
		<a href="logout.php" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-log-out"></span> Logout</a>

</center>

										  
										</div>
                                    </div>
																<?php
								require "conn.php";

									$cat=mysqli_query($conn,"SELECT * FROM `trips` WHERE `userid` ='$userid' AND `status` ='2' ORDER BY `trips`.`id` DESC");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
									                        <!-- /.col-lg-4 -->
                        <div class="col-lg-12">
						<?php if ($catrow['status']==0){
                            echo "<div class='panel panel-yellow'>";
						}else{
							echo "<div class='panel panel-green'>";
						}
						?>
                                <div class="panel-heading">
						<?php if ($catrow['status']==0){
                            echo "Trip On Process";
						}else{
							echo "Done Trip";
						}
						?>                                  
                                </div>
                                <div class="panel-body">
                                    <center><h3><?php echo $catrow['location_long']; ?></p>
									<p>To</p>
									<p><?php
									$thidis =$catrow['distination'];
										$result=mysqli_query($conn, "SELECT DISTINCT (`distination`) FROM `distination` WHERE `lon` ='$thidis'")or die('Error In Session');
										$row=mysqli_fetch_array($result);
										$dis = $row['distination'];
									echo $dis; ?></p>
									<p>At: <?php echo $catrow['at_time']; ?></p>
									<p>At Amount of: ₦<?php echo $catrow['amount']; ?></p>
									<p>By Driver:
									<?php
									$thidriv =$catrow['driverid'];
										$result=mysqli_query($conn, "SELECT DISTINCT `first_name`,`last_name` FROM `driver` WHERE `id` ='$thidriv'")or die('Error In Session');
										$row=mysqli_fetch_array($result);
										$driv = $row['first_name']." ".$row['last_name'];
									echo $driv; ?>
									<p>Finish at: <?php echo $catrow['atthistime']; ?></p>

									</h3>

									</center>
                                </div>
                                <div class="panel-footer">
                        <?php if ($catrow['status']==0){
                            echo "<p class='text-warning'>Trip On Process</p>";
						}else{
							echo "<p class='text-success'> Done Trip</p>";
						}
						?>  
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
						<?php
									}
								?>
								
                                </div>
<br>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
								
                    </div>
                        </div>
					</div>
					
                        <!-- /.col-lg-12 -->
                    </div>
					
	<script>
if("geolocation" in navigator){
navigator.geolocation.getCurrentPosition(function(position){
const lat = position.coords.latitude;
document.getElementById('latitude').value =lat;
const log = position.coords.longitude;
document.getElementById('Logitude').value =log;
});
}else{
console.log("is Not here");
}

</script>					
<?php include('footer.php'); ?>
					