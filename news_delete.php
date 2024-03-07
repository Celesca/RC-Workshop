<?php require("connect.php"); ?>


<?php 
	extract($_GET);
	$sql = "DELETE FROM news WHERE news_id='$id'";
	$result = mysqli_query($dbcon, $sql);
	$_SESSION['alert']='ลบเรียบร้อย';
	header("Location: news_list.php");
?>