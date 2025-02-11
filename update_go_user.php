<?php
	include('conn.php');
	
	$id=$_POST['id'];
	$status =2;
	$thetime= date("l jS \of F Y h:i:s A");
	

	mysqli_query($conn,"UPDATE `trips` SET `atthistime`='$thetime',`status`='$status' WHERE `id`='$id'");
	$pid=mysqli_insert_id($conn);
	
	//mysqli_query($conn,"insert into inventory (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Add Product', '$pid', '$qty', NOW())");
	
	?>
		<script>
			window.alert('User added successfully!');
		window.open('history.php','_self');
		</script>
	<?php
?>