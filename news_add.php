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
                <h2>เพิ่มข่าวสาร</h2>
              </div>
	
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="accept" class="text-center" method="post" action="news_save.php" enctype="multipart/form-data">
					<div class="form-group">
                    <label for="name">หัวข้อ</label>
						<input type="text" class="form-control" name="news_title" required>
					</div>
					<div class="form-group">
                    <label for="name">รายละเอียด</label>
						<textarea rows="10" type="text" class="form-control" name="news_text" placeholder="ระบุรายละเอียด" required></textarea>
					</div>
					<div class="form-group">
                    <label for="name">รูปภาพ</label>
						<!-- Input file element -->
						<input id="news_img" type="file" accept="image/png, image/jpeg, img/jpg" class="form-control" name="news_img" onchange="handleFileChange(this);" required>

						<!-- Image preview element -->
						<img id="imagePreview" class="img-thumbnail mt-3" alt="Image Preview">
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