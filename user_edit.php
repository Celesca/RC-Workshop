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
                <h2>แก้ไขข้อมูลผู้ใช้งาน</h2>
              </div>
				
				<?php 
					$sql = "SELECT * FROM user WHERE user_id = ".$_GET['id']."";
					$result = mysqli_query($dbcon, $sql);
					$row = mysqli_fetch_assoc($result);
				?>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="accept" class="text-center" method="post" action="user_update.php?user_id=<?php echo $_GET['id']; ?>">
					<div class="form-group">
                    <label for="name">รหัสประจำตัว</label>
						<div class="form-control" id="user_id" name="user_id"><?php echo $_GET['id']; ?></div>
					</div>
					<div class="form-group">
                    <label for="name">ชื่อ-สกุล</label>
						<input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name'] ?>" required>
					</div>
				<div class="form-group">
                    สาขา<select class="custom-select-sm" name="user_branch">
				<?php
					$sql = "SELECT * FROM user WHERE user_id = ".$_GET['id']."";
					$result = mysqli_query($dbcon, $sql);
				?>
					<option value="0" <?php if(0 == $row['user_branch']) echo 'selected'; ?>>-</option>
				<option value="1" <?php if(1 == $row['user_branch']) echo 'selected'; ?>> ISE </option>
					<option value="2" <?php if(2 == $row['user_branch']) echo 'selected'; ?>> CPE </option>
					<option value="3" <?php if(3 == $row['user_branch']) echo 'selected'; ?>> ME </option>
					<option value="4" <?php if(4 == $row['user_branch']) echo 'selected'; ?>> ENV </option>
					</select>
                  </div>
				<div class="form-group">
                    <label for="name">บัตรเซฟตี้</label>
                 <input type="checkbox" class="form-check-md" name="user_perm" value="1" <?php if($row['user_perm']==1) echo 'checked'; ?>>
                  </div>
				  <div class="form-group">
                    <label for="name">อีเมล์</label>
						<input type="email" class="form-control" name="user_email" value="<?php echo $row['user_email'] ?>" required>
					</div>
                  <div class="form-group">
                    <label for="name">รหัสผ่าน</label>
						<input type="password" class="form-control" id="edit_password" name="user_password" value="<?php echo $row['user_password'] ?>" required>
					  <input class="form-control-md" type="checkbox" onclick="myFunction2()">ดูรหัสผ่าน
					</div>
				  <div class="form-group">
                    <label for="name">ระดับผู้ใช้</label>
					 	<input class="form-control-md" type="radio" name="user_level" value="0" <?php if($row['user_level']==0) echo "checked"; ?>>ผู้ดูแล
					  <input class="form-control-md" type="radio" name="user_level" value="1" <?php if($row['user_level']==1) echo "checked"; ?>>ผู้ใช้
				  </div>
                  <button type="submit" id="Submit" class="btn btn-primary btn-lg" onClick="return confirm('ยืนยันการบันทึก?')">ยืนยัน</button>
					<a href="user_list.php" class="btn btn-danger btn-lg">ยกเลิก</a>
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
<?php } else {
	header("Location: index.php");
}
?>