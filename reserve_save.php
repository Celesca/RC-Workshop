<?php require('connect.php') ?>

<?php
	extract($_POST);
	$sql = "INSERT INTO reserve(user_id, reserve_start, reserve_end, reserve_detail) values('".$_SESSION['user']['user_id']."', '$reserve_start', '$reserve_end', '$reserve_detail')";
	$result = mysqli_query($dbcon, $sql);

	echo '<script>alert("บันทึกเรียบร้อย!")</script>';
	header("Location: history.php");
?>