<?php require('connect.php') ?>
<?php if(isset($_SESSION['logined'])) { ?>
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
                <h2>แก้ไขรหัสผ่าน</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="login" class="text-center" method="post" action="password_update.php">
                  <div class="form-group">
                    <label for="name">รหัสผ่านเดิม</label>
                 <input type="password" class="form-control" id="old_password" name="old_password" placeholder="ระบุรหัสผ่านเดิม" required>
					</div>
					<div class="form-group">
					  <label for="name">รหัสผ่านใหม่</label>
                 <input type="password" class="form-control" id="new_password" name="user_password" placeholder="ระบุรหัสผ่านใหม่" required>
					</div>
					<div class="form-group">
					  <label for="name">ยืนยันรหัสผ่านใหม่</label>
                 <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" required><br>
				<input class="form-control-md" type="checkbox" onclick="myFunction()">ดูรหัสผ่าน
                  </div>
                  <button type="submit" id="submit" class="btn btn-primary btn-lg" onClick="return confirm('บันทึกการแก้ไข?')">บันทึก</button>
					<a href="index.php" class="btn btn-danger btn-lg">ยกเลิก</a>
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
	  <script src="js/Func.js"></script>
  </body>
</html>
<?php } else {
	header("Location: index.php");
}
?>
