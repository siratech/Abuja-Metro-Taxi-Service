<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!empty($username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location: index.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5($password);
		
		$query=mysqli_query($conn,"select * from `users` where username='$fusername' and password='$fpassword'");
		
		if(mysqli_num_rows($query)==0){
							echo "<script>
					window.alert('Login Failed, User is Invalid!');
					window.location.href='index.php';
				</script>";
			$_SESSION['msg'] = "Login Failed, Invalid Input!";
			header('location: index.php');
			exit();
		}
		else{
			
			$row=mysqli_fetch_array($query);
			if ($row['access']=="ADMIN"){
				$_SESSION['id']=$row['userid'];
				header('location: admin/index.php');
			}
			elseif ($row['access']=="USER"){
				$_SESSION['id']=$row['userid'];
				header('location: menu.php');
			}
			elseif ($row['access']=="Driver"){
				$_SESSION['id']=$row['userid'];
				header('location: driver.php');
			}
			else{
				$_SESSION['id']=$row['userid'];
				?>
				<script>
					window.alert('Login Failed, User is Invalid!');
					window.location.href='index.php';
				</script>
				<?php
			}
		}
		
		}
	}
?>