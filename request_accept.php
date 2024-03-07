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
                <h2>จัดการคำขอใช้โรงประลอง</h2>
              </div>
				
				<?php 
					$sql = "SELECT * FROM reserve INNER JOIN user ON user.user_id = reserve.user_id WHERE reserve.reserve_id = ".$_GET['id']."";
					$result = mysqli_query($dbcon, $sql);
					$row = mysqli_fetch_assoc($result);
				?>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="accept" class="text-center" method="post" action="accept_save.php?cons=1&reserve_id=<?php echo $_GET['id']; ?>">
					<div class="form-group">
                    <label for="name">รหัสนักศึกษา</label>
                 <div class="form-control" id="user_id" name="user_id"><?php echo $row['user_id'] ?></div>
					</div>
					<div class="form-group">
                    <label for="name">ชื่อ-สกุล</label>
                 <div class="form-control" id="user_name" name="user_name"><?php echo $row['user_name'] ?></div>
					</div>
				<div class="form-group">
                    <label for="name">เริ่มต้น</label>
                 <div class="form-control" id="reserve_start" name="reserve_start"><?php echo $row['reserve_start'] ?></div>
                  </div>
				<div class="form-group">
                    <label for="name">สิ้นสุด</label>
                 <div class="form-control" id="reserve_end" name="reserve_end"><?php echo $row['reserve_end'] ?></div>
                  </div>
                  <div class="form-group">
                    <label for="name">รายละเอียด</label>
                 <div class="form-control" id="reserve_detail" name="reserve_detail"><?php echo $row['reserve_detail'] ?></div>
                  </div>
					<div class="form-group">
                    <label for="name">ข้อเสนอแนะเพิ่มเติม</label>
						<textarea rows="5" type="text" class="form-control" id="detail" name="detail" placeholder="ระบุข้อเสนอแนะเพิ่มเติม" required></textarea>
                  </div>
                  <button type="submit" id="Submit" class="btn btn-primary btn-lg">ยืนยัน</button>
					<a href="request.php" class="btn btn-danger btn-lg">ยกเลิก</a>
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