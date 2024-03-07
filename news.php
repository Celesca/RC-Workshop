<?php require('connect.php') ?>
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
			<?php if (!isset($_SESSION['logined'])) { ?>
              <p>&nbsp;</p>
              <p class="text-center"><a class="btn btn-success btn-lg" href="login.php" role="button">เข้าสู่ระบบ</a> </p>
			<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </header>

	<section class="text-center">
	  <div class="container text-center mt-4 col-8 w-auto">
		  
	<?php 
		$sql = "SELECT * FROM news WHERE news_id = ".$_GET['id']."";
		$result = mysqli_query($dbcon, $sql);
		$row = mysqli_fetch_assoc($result);
	?> 
		<h2><?php echo $row['news_title']; ?></h2>
		  <p>อัพเดท <?php echo $row['news_date']; ?></p>
		<img src="images/news/<?php echo $row['news_img']; ?>" class="img-fluid mt-3 h-auto">
		<div class="text-center w-100">
			<p class="text-break p-4"><?php echo $row['news_text']; ?></p>
		</div>
		</div>
		<a href="index.php" class="btn btn-secondary btn-lg mb-5">กลับ</a>
	</section>
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.4.1.js"></script>
	<script src="js/slideshow.js"></script>

  </body>
</html>