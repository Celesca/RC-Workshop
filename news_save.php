<?php require("connect.php"); ?>

<?php 
extract($_POST);

if($_FILES['fileupload']['name']!=" ") {
	 $ext=pathinfo($_FILES['news_img']['name'], PATHINFO_EXTENSION);
	 $newname = md5(rand() * time()) . ".".$ext;
	 move_uploaded_file($_FILES["news_img"]["tmp_name"],'images/news/'.$newname);
	
	echo "อัปโหลดเสร็จสิ้น";
}
else {
	die("<script> alert('อัปโหลดไม่สำเร็จ'); history.back(); </script>");
	}

$sql = "INSERT INTO news(news_title, news_text, news_img, news_date) values('$news_title', '$news_text', '$newname', '".date("Y-m-d H:i:s")."')";
$result = mysqli_query($dbcon, $sql);

$_SESSION['alert']='บันทึกเรียบร้อย';
header("Location: news_list.php");
?>