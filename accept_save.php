<?php require('connect.php') ?>

<?php
	extract($_POST);
	extract($_GET);

	if($cons==1) {
		$re = "อนุมัติ";
		$ac = 1;
	} else {
		$re = "ปฏิเสธ";
		$ac = 2;
	}

	$sql = "UPDATE reserve SET reserve_status='$ac' WHERE reserve_id = '$reserve_id'";
	$result = mysqli_query($dbcon, $sql);

	$sql2 = "SELECT * FROM reserve INNER JOIN user ON reserve.user_id = user.user_id WHERE reserve.reserve_id= '$reserve_id'";
	$result2 = mysqli_query($dbcon, $sql2);
	$row = mysqli_fetch_assoc($result2);

	if($detail == "") $de = '-';
	else $de = $detail;
	
	$to = $row['user_email'];
	$subject = "ผลการแจ้งใช้โรงประลอง";
	$msg = "จากการขอใช้โรงประลองซึ่งมีรายละเอียด ดังนี้/nรหัสนักศึกษา: ".$row['user_id']."/nชื่อ-สกุล: ".$row['user_name']."/nเวลาเริ่ม: ".$row['reserve_start']."/nเวลาสิ้นสุด: ".$row['reserve_end']."/nรายละเอียด: ".$row['reserve_detail']."/n/nผลการขอใช้โรงประลอง: $cons/nข้อเสนอแนะเพิ่มเติม: $de";
	$header = "From: ".$_SESSION['user']['user_email']."" . "\r\n" . "CC: ".$row['user_email']."";

	mail($to, $subject,$msg,$header);

	echo '<script>alert("อนุมัติเรียบร้อย!")</script>';
	header("Location: request.php");
?>