<?php
	include('conn.php');
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];

	$phono=$_POST['phono'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	//$qty=$_POST['qty'];
	$usertype ="USER";
	
	$cartype=$_POST['cartype'];
	$plateno=$_POST['plateno'];

	$model=$_POST['model'];
	$password = md5($password);
	$usertype ="DRIVER";

	mysqli_query($conn,"insert into driver (`first_name`, `last_name`, `phone_no`, `email`, `password`, `car_type`, `plate_no`, `model`)
	values ('$fname','$lname','$phono','$email','$password','$cartype','$plateno','$model')");
	$pid=mysqli_insert_id($conn);
	
	mysqli_query($conn,"insert into users (`id`,`first_name`, `last_name`, `phone_no`, `email`, `username`, `password`, `usertype`)
	values ('$pid','$fname','$lname','$phono','$email','$email','$password','$usertype')");
	//$pid=mysqli_insert_id($conn);	
	?>
		<script>
			window.alert('Driver added successfully!');
		window.open('index.php','_self');
		</script>
	<?php
?>