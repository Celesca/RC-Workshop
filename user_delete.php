<?php require("connect.php"); ?>


<?php 
	extract($_GET);
	$sql = "DELETE FROM user WHERE user_id='$id'";
	$result = mysqli_query($dbcon, $sql);
	$_SESSION['alert']='ลบเรียบร้อย';
	header("Location: user_list.php");
?>