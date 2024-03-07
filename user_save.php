<?php require("connect.php"); ?>


<?php 
extract($_POST);
$sql2 = "SELECT user_id FROM user WHERE user_id='$user_id'";
$result2 = mysqli_query($dbcon, $sql2);
$num = mysqli_num_rows($result2);
if($num > 0) {
	die("<script>
alert('เลขประจำตัวซ้ำ');
history.back();
</script>");
}

$sql = "INSERT INTO user(user_id, user_name, user_branch, user_perm, user_email, user_password, user_level) values('$user_id', '$user_name', '$user_branch', '$user_perm', '$user_email', '$user_password', '$user_level')";
$result = mysqli_query($dbcon, $sql);

$_SESSION['alert']='บันทึกเรียบร้อย';
header("Location: user_list.php");
?>