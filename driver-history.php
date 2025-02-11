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
     
		<a href="driver-menu.php" class="btn btn-success btn-lg"><span class="fa fa-car"></span> View New Trip</a>
		<a href="driver-history.php" class="btn btn-warning btn-lg"><span class="fa fa-history"></span>Trip History</a>
		<a href="logout.php" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-log-out"></span> Logout</a>

</center>

										  
										</div>
                                    </div>
																<?php
								require "conn.php";
									$cat=mysqli_query($conn,"SELECT * FROM `trips` WHERE `driverid` ='$userid' AND `status` ='2' ORDER BY `trips`.`id` DESC");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
									
									                       <div class="col-sm-3">
																	   
                            <div class="hero-widget well well-sm">
							<h4>Request By:
									<?php
									$thidriv =$catrow['userid'];
										$result=mysqli_query($conn, "SELECT DISTINCT `first_name`,`last_name` FROM `driver` WHERE `id` ='$thidriv'")or die('Error In Session');
										$row=mysqli_fetch_array($result);
										$driv = $row['first_name']." ".$row['last_name'];
									echo $driv; ?>
									</h4>						
                                <div class="icon">
                                    <i class="fa fa-cab"></i>
                                </div>
                                <div class="text">
                                    <span class="value">₦<?php $amount = $catrow['amount']; 
									echo $amount;
									?></span>
                                    <label class="text-muted"><?php echo $catrow['location_long']; ?> To <?php
									$thidis =$catrow['distination'];
										$result=mysqli_query($conn, "SELECT DISTINCT (`distination`) FROM `distination` WHERE `lon` ='$thidis'")or die('Error In Session');
										$row=mysqli_fetch_array($result);
										$dis = $row['distination'];
									echo $dis; ?></label>
                                </div>
                                <div class="options">
<a href="javascript:;" class="btn btn-lg"><i class="fa fa-history"></i> Finish Trip at <p><?php echo $catrow['atthistime'];?></p></a>
								</form>
                                </div>
                            </div>
                        </div>
						<?php
									}
								?>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
				
								
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
					