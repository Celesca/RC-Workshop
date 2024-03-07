<?php require('connect.php') ?>

<?php
	extract($_POST);
	$sql = "UPDATE user SET user_email='$user_email' WHERE user_id='".$_SESSION['user']['user_id']."' ";
	$result = mysqli_query($dbcon, $sql);

	$sql2 = "SELECT * FROM user WHERE user_id='".$_SESSION['user']['user_id']."' ";
	$result2 = mysqli_query($dbcon, $sql2);
	$_SESSION['user'] = mysqli_fetch_assoc($result2);
	session_write_close();

	echo '<script>alert("บันทึกเรียบร้อย!")</script>';
	header("Location: index.php");
?>