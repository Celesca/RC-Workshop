<?php require('connect.php') ?>
<?php if(isset($_SESSION['logined']) and $_SESSION['user']['user_level']==1) { ?>
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
                <h2>แจ้งใช้โรงประลอง</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="login" class="text-center" method="post" action="reserve_save.php">
				<div class="form-group">
                    <label for="name">เริ่มต้น</label>
                 <input type="datetime-local" class="form-control" id="reserve_start" name="reserve_start" placeholder="ระบุวันเวลาเริ่มต้น" min="<?php echo date("Y-m-d")."T".date("H:i"); ?>" onchange="window.location='?start='+this.value;" value="<?php echo $_GET['start']; ?>" required>
                  </div>
				<div class="form-group">
                    <label for="name">สิ้นสุด</label>
                 <input type="datetime-local" class="form-control" id="reserve_end" name="reserve_end" placeholder="ระบุวันเวลาสิ้นสุด" min="<?php echo $_GET['start']; ?>" onchange="window.location='?start=<?php echo $_GET['start']; ?>&end='+this.value;" value="<?php echo $_GET['end']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="name">รายละเอียด</label>
                 <input type="text" class="form-control" id="reserve_detail" name="reserve_detail" placeholder="ระบุรายละเอียด" required>
                  </div>
                  <button type="submit" id="Submit" class="btn btn-primary btn-lg">บันทึก</button>
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
  </body>
</html>
<?php } else {
	header("Location: index.php");
}
?>