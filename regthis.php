<?php
	include('conn.php');
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];

	$phono=$_POST['phono'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	//$qty=$_POST['qty'];
	$usertype ="USER";
	$password = md5($password);
/* 	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	 */
	mysqli_query($conn,"insert into users (`first_name`, `last_name`, `phone_no`, `email`, `username`, `password`, `usertype`)
	values ('$fname','$lname','$phono','$email','$email','$password','$usertype')");
	$pid=mysqli_insert_id($conn);
	
	//mysqli_query($conn,"insert into inventory (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Add Product', '$pid', '$qty', NOW())");
	
	?>
		<script>
			window.alert('User added successfully!');
		window.open('index.php','_self');
		</script>
	<?php
?>