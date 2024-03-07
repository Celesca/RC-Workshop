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
    <div class="container text-center" style="width: 100%">
              <div class="text-center col-12 mb-5">
                <h2>ประวัติการขอใช้งานโรงประลอง</h2>
              </div>
		<?php 
					$sql = "SELECT * FROM reserve WHERE user_id = ".$_SESSION['user']['user_id']." ORDER BY reserve_id DESC";
					$result = mysqli_query($dbcon, $sql);
					$num = mysqli_num_rows($result);
				?>
              <table class="table table-bordered m-auto text-center table-hover">
                <tbody>
                  <tr class="table-primary m-auto">
                    <td width="98">ลำดับ</td>
                    <td width="176">เริ่มต้น</td>
                    <td width="222">สิ้นสุด</td>
                    <td width="461">รายละเอียด</td>
                    <td width="95">สถานะ</td>
                  </tr>
                  <?php
				  $i = 0;
				  foreach($result as $row) {
					  $i++;
				 ?>
                  <tr class="<?php if($row['reserve_status']==0) { echo "table-info"; }
					  else if($row['reserve_status']==1) { echo "table-warning"; }
					  else if($row['reserve_status']==2) { echo "table-danger"; }?> table-sm m-auto">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['reserve_start']; ?></td>
                    <td><?php echo $row['reserve_end']; ?></td>
                    <td><?php echo $row['reserve_detail']; ?></td>
                    <td><?php if($row['reserve_status']==0) { echo "รออนุมัติ"; }
					  else if($row['reserve_status']==1) { echo "อนุมัติ"; }
					  else if($row['reserve_status']==2) { echo "ไม่อนุมัติ"; }?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
				  
				 <?php 
					$sql = "SELECT * FROM reserve WHERE user_id='".$_SESSION['user']['user_id']."' ORDER BY reserve_id DESC";
					$result = mysqli_query($dbcon, $sql);
					$num = mysqli_num_rows($result);
				?>
			    <?php if($num==0) { ?>
			    <h5>ไม่มีข้อมูล</h5>
			<?php } ?>
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