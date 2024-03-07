<?php require('connect.php') ?>

<?php
	extract($_POST);
	$sql = "SELECT * FROM user WHERE user_id='$user_id' AND user_password='$user_password'";
	$result = mysqli_query($dbcon, $sql);
	$num = mysqli_num_rows($result);

	if($num==0) {
		die("<script> alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!'); history.back(); </script>");
	}
	
	$_SESSION['logined'] = true;
	$_SESSION['user'] = mysqli_fetch_assoc($result);
	session_write_close();
	header("Location: index.php");
?>