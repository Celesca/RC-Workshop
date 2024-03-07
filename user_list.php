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
    <div class="container text-center" style="width:100%">
              <div class="text-center col-12 mb-5">
                <h2>จัดการผู้ใช้</h2>
              </div>
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
				  
				 <?php 
					$sql = "SELECT * FROM user ORDER BY user_id DESC";
					$result = mysqli_query($dbcon, $sql);
					$num = mysqli_num_rows($result);
				?>
				  
			<table class="table table-striped table-borderless m-auto text-center table-hover">
			  <tbody>
				<tr class="table-primary m-auto">
				  <td width="120">ลำดับ</td>
					<td width="197">รหัสประจำตัว</td>
					<td width="395">ชื่อ-สกุล</td>
				  <td width="91">สาขา</td>
				  <td width="100">บัตรเซฟตี้</td>
					<td width="209">ดำเนินการ</td>
				</tr>
				<?php
				  $i = 0;
				  foreach($result as $row) {
					  $i++;
				 ?>
				<tr class="table-sm m-auto ">
				  <td><?php echo $i; ?></td>
					<td><?php echo $row['user_id']; ?></td>
					<td><?php echo $row['user_name']; ?></td>
				  <td><?php if($row['user_branch']==1) echo "ISE";
					  else if($row['user_branch']==2) echo "CPE";
					  else if($row['user_branch']==3) echo "ME";
					  else if($row['user_branch']==4) echo "ENV";
					  else echo "-";
					  ?></td>
				  <td><?php if($row['user_perm']==0) echo "No"; else echo "Yes"; ?></td>
				  <td><a class="btn btn-primary btn-md" href="user_edit.php?id=<?php echo $row['user_id']; ?>" role="button">แก้ไข</a>
					<?php if( $row['user_id'] != $_SESSION['user']['user_id']) { ?>
					  <a class="btn btn-danger btn-md" href="user_delete.php?id=<?php echo $row['user_id']; ?>" role="button" onClick="return confirm('ยืนยันการลบ?')">ลบ</a>
					  <?php } ?>
					</td>
				</tr>
				  <?php } ?>
			  </tbody>
			</table>
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