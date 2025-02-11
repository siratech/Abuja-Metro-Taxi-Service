<?php include('header.php'); ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <center><h2>Abuja Metro Taxi Service</h2>
                                    <p>Login</p></center>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
										  					<?php
					require('conn.php');
					session_start();
					// If form submitted, insert values into the database.
					if (isset($_POST['username'])){
							// removes backslashes
					 $username = stripslashes($_REQUEST['username']);
							//escapes special characters in a string
					 $username = mysqli_real_escape_string($conn,$username);
					 $password = stripslashes($_REQUEST['password']);
					 $password = mysqli_real_escape_string($conn,$password);
					 //Checking is user existing in the database or not
							$query = "SELECT * FROM `users` WHERE username='$username'
					and password='".md5($password)."'";
					 $result = mysqli_query($conn,$query) or die(mysql_error());
					 $rows = mysqli_num_rows($result);
							if($rows==1){
								$result0=mysqli_query($conn, "select * from users where username='$username'")or die('Error In Session');
								$row=mysqli_fetch_array($result0);
								if($row['usertype']=="356a192b7913b04c54574d18c28d46e6395428ab"){
									$_SESSION['username'] = $username;
								// Redirect user to index.php
						 header("Location: admintabledata.php");
								}elseif($row['usertype']=="USER"){
									$_SESSION['id'] = $username;
								// Redirect user to index.php
						 header("Location: menu.php");

								 }elseif($row['usertype']=="DRIVER"){
									$_SESSION['id'] = $username;
								// Redirect user to index.php
						 header("Location: driver-menu.php");

								 }else{
									header("Location: menu.php");
									$_SESSION['id'] = $username;
															 
 
								}
							 }else{
					 echo "				<script>
					window.alert('Login Failed, User is Invalid!');
					window.location.href='index.php';
				</script>";
					 }
						}else{
					?>
          <form class="form-signin" action="" method="post" name="login">
											             
														 <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-user"></span></span>
                                                    <input type="text" class="form-control" name="username" placeholder="Username" required />
                                                </div>	

									

										             <div class="form-group input-group">
                                                    <span class="input-group-addon"> <span class="fa fa-close"></span></span>
                                                    <input type="password" name="password" class="form-control" required />
                                                </div>
									

		<button type="submit" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
													  </form>
<br>
			<?php } ?>
		<a href="register.php" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-log-out"></span> Register</a>

										  
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
					