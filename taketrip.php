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
                                    <p>Request Trip</p></center>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
          <form class="form-signin" action="regtrip.php" method="post" name="login">
				<input type="hidden" name="latitude" id="latitude" />	
				<input type="hidden" name="logitude" id="Logitude" />
				<input type="hidden" name="userid" value="<?php echo $userid; ?>" />				

										<div class="form-group input-group">
                            <span style="width:1200px;" class="input-group-addon">Location:</span>
                            <select style="width:200px;" class="form-control" name="location">
							<?php
								require "conn.php";

									$cat=mysqli_query($conn,"SELECT `distination`,`lon` from distination");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
											<option value="<?php echo $catrow['distination']; ?>"><?php echo $catrow['distination']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>	
										<div class="form-group input-group">
                            <span style="width:1200px;" class="input-group-addon">Destination:</span>
                            <select style="width:200px;" class="form-control" name="destination">
							<?php
								require "conn.php";

									$cat=mysqli_query($conn,"SELECT `distination`,`lon` from distination");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
											<option value="<?php echo $catrow['lon']; ?>"><?php echo $catrow['distination']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>					
										<div class="form-group input-group">
                            <span style="width:1200px;" class="input-group-addon">Driver:</span>
                            <select style="width:200px;" class="form-control" name="driver">
							<?php
								require "conn.php";

									$cat=mysqli_query($conn,"SELECT `first_name`, `last_name`, id from driver");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
											<option value="<?php echo $catrow['id']; ?>"><?php echo $catrow['first_name']." ".$catrow['last_name']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>		

<div class="form-group input-group">
                            <span style="width:1200px;" class="input-group-addon">Trip At:</span>
                            <select style="width:200px;" class="form-control" name="tripat">
							<?php
								require "conn.php";

									$cat=mysqli_query($conn,"SELECT `trips_at` from trips_at_time");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
											<option value="<?php echo $catrow['trips_at']; ?>"><?php echo $catrow['trips_at']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>										

		<button type="submit" name="submit" class="btn btn-success btn-lg btn-block"><span class="fa fa-paper-plane-o"></span> Request</button>
													  </form>
										  
										</div>
                                    </div>
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
					