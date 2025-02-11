<?php
	include('conn.php');
	
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$status =1;

	mysqli_query($conn,"UPDATE `trips` SET `amount`='$amount',`status`='$status' WHERE `id`='$id'");
	$pid=mysqli_insert_id($conn);
	
	//mysqli_query($conn,"insert into inventory (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Add Product', '$pid', '$qty', NOW())");
	
	?>
		<script>
			window.alert('User added successfully!');
		window.open('driver-menu.php','_self');
		</script>
	<?php
?>