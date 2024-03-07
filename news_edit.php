<?php require('connect.php') ?>
<?php if(isset($_SESSION['logined']) and $_SESSION['user']['user_level']==0) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo web_title ?></title>
	  
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="icon" type="image/x-icon" href="/images/logo.png">
  </head>
  <body>
	  
    <?php require('Navbar.php') ?>
	  
    <header>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center">RC Workshop</h1>
              <p class="text-center">ระบบแจ้งการใช้งานโรงประลอง KMUTT RC</p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div class="jumbotron">
            <div class="row text-center">
              <div class="text-center col-12">
                <h2>แก้ไขข่าวสาร</h2>
              </div>
				
				<?php 
					$sql = "SELECT * FROM news WHERE news_id = ".$_GET['id']."";
					$result = mysqli_query($dbcon, $sql);
					$row = mysqli_fetch_assoc($result);
				?>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="accept" class="text-center" method="post" action="news_update.php?news_id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
					<div class="form-group">
                    <label for="name">หัวข้อ</label>
						<input type="text" class="form-control" name="news_title" value="<?php echo $row['news_title']; ?>" required>
					</div>
					<div class="form-group">
                    <label for="name">รายละเอียด</label>
						<textarea rows="10" type="text" class="form-control" name="news_text" required><?php echo $row['news_text']; ?></textarea>
					</div>
					<div class="form-group">
                    <label for="name">รูปภาพ</label>
						<div class="form-group">
						รูปเดิม<input name="chk" type="radio" class="custom-radio mr-2 imgchk" value="0" checked onChange="showupload()">
						รูปใหม่<input name="chk" type="radio" class="custom-radio mr-2 imgchk" value="1" onChange="showupload()">
						</div>
						<!-- Input file element -->
						<input id="news_img" type="file" accept="image/png, image/jpeg, img/jpg" class="form-control custom-file" name="news_img" onchange="handleFileChange(this);" value="<?php echo $row['news_img']; ?>" style="display: none;">

						<!-- Image preview element -->
						<img id="imagePreview" class="img-thumbnail mt-3" alt="Image Preview" src="images/news/<?php echo $row['news_img']; ?>">
					</div>
                  <button type="submit" id="Submit" class="btn btn-primary btn-lg" onClick="return confirm('ยืนยันการบันทึก?')">ยืนยัน</button>
					<a href="news_list.php" class="btn btn-danger btn-lg" onClick="return confirm('ยกเลิก?')">ยกเลิก</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
<script src="js/Func.js"></script>
	<script>
	function showupload() {
		var rad = document.getElementsByName("chk");
		var f = document.getElementById("news_img");

		// วนลูปเพื่อหา radio button ที่ถูกเลือก
		for (var i = 0; i < rad.length; i++) {
			if (rad[i].checked) {
				// ตรวจสอบค่าของ radio button ที่ถูกเลือก
				if (rad[i].value == 0) {
					// ถ้าค่าเป็น 0 ให้ซ่อน file input
					f.style.display = "none";
				} else {
					// ถ้าค่าเป็น 1 ให้แสดง file input
					f.style.display = "block";
				}
				break; // หลุดจากลูปเนื่องจากเราเจอ radio button ที่ถูกเลือกแล้ว
			}
		}
	}
		
	  function handleFileChange(input) {
		var fileInput = document.getElementById("news_img");
		var imagePreview = document.getElementById("imagePreview");

		// Check if a file is selected
		if (fileInput.files.length > 0) {
		  var file = fileInput.files[0];

		  // Check if the file is an image
		  if (file.type.match(/image.*/)) {
			// Update the image preview
			var reader = new FileReader();
			reader.onload = function (e) {
			  imagePreview.src = e.target.result;
			};
			reader.readAsDataURL(file);
		  }
		}
	  }
	</script>

<?php } else {
	header("Location: index.php");
}
?>