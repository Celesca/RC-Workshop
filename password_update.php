<?php require('connect.php') ?>

<?php
	extract($_POST);
	if($old_password != $_SESSION['user']['user_password']) {
		die("<script> alert('รหัสผ่านเดิมไม่ถูกต้อง!'); history.back(); </script>");
	}

	$sql = "UPDATE user SET user_password='$user_password' WHERE user_id='".$_SESSION['user']['user_id']."' ";
	$result = mysqli_query($dbcon, $sql);

	$sql2 = "SELECT * FROM user WHERE user_id='".$_SESSION['user']['user_id']."' ";
	$result2 = mysqli_query($dbcon, $sql2);
	$_SESSION['user'] = mysqli_fetch_assoc($result2);
	session_write_close();

	echo '<script>alert("บันทึกเรียบร้อย!")</script>';
	header("Location: index.php");
?>