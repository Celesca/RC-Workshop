<?php require('connect.php') ?>

<?php
	extract($_POST);

	$sql2 = "SELECT news_img FROM news WHERE news_id='".$_GET['news_id']."' ";
	$result2 = mysqli_query($dbcon, $sql2);
	$row = mysqli_fetch_assoc($result2);

	if($chk == 0) {
			$newname = $row['news_img'];
		} else {
			if($_FILES['fileupload']['name']!=" ") {
				 $ext=pathinfo($_FILES['news_img']['name'], PATHINFO_EXTENSION);
				 $newname = md5(rand() * time()) . ".".$ext;
				 move_uploaded_file($_FILES["news_img"]["tmp_name"],'images/news/'.$newname);

				echo "อัปโหลดเสร็จสิ้น";
			}
			else {
				die("<script> alert('อัปโหลดไม่สำเร็จ'); history.back(); </script>");
				}
		}

	$sql = "UPDATE news SET news_title='$news_title', news_text='$news_text', news_img='$newname', news_date='".date("Y-m-d H:i:s")."' WHERE news_id='".$_GET['news_id']."' ";
	$result = mysqli_query($dbcon, $sql);

	echo '<script>alert("บันทึกเรียบร้อย!")</script>';
	header("Location: news_list.php");
?>