<?php include('header.php'); ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <center><h2>Abuja Metro Taxi Service</h2>
                                    <p>Register Driver</p></center>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
          <form class="form-signin" action="regthisDriver.php" method="post" name="login">
											             
														 <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-text-height"> First Name: </span></span>
                                                    <input type="text" class="form-control" name="fname" placeholder="First Name" required />
                                                </div>	

														 <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-text-width"> Last Name: </span></span>
                                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required />
                                                </div>	

														 <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-phone"> Phone No.: </span></span>
                                                    <input type="text" class="form-control" name="phono" placeholder="Phone No" required />
                                                </div>	

														 <div class="form-group input-group">
                                                    <span class="input-group-addon"> @ Email:       </span>
                                                    <input type="text" class="form-control" name="email" placeholder="Email" required />
                                                </div>	

						<div class="form-group input-group">
                            <span style="width:1200px;" class="input-group-addon">Car Type:</span>
                            <select style="width:200px;" class="form-control" name="cartype">
							<?php
								require "conn.php";

									$cat=mysqli_query($conn,"SELECT DISTINCT(`car`) from car");
									
									while($catrow=mysqli_fetch_array($cat)){
										?>
											<option value="<?php echo $catrow['car']; ?>"><?php echo $catrow['car']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>

											 <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-car"> Plate No.: </span></span>
                                                    <input type="text" class="form-control" name="plateno" placeholder="Plate No" required />
                                                </div>	

											 <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-car"> Model: </span></span>
                                                    <input type="text" class="form-control" name="model" placeholder="Model" required />
                                                </div>													

										             <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-close"> Password </span></span>
                                                    <input type="password" name="password" class="form-control" required />
                                                </div>
									

		<button type="submit" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-log-in"></span> Register</button>
													  </form>
<br>
		<a href="register.php" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-log-out"></span> User-Register</a>

										  
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
<?php include('footer.php'); ?>
					