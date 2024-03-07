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
	<link rel="stylesheet" href="css/slideshow.css">
	  <link rel="icon" type="image/png" href="/images/logo.png">
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
    <section>
      <div class="w3-content w3-section" style="max-width:600px">
		  <img class="mySlides" src="images/slide/rc1.jpg">
		  <img class="mySlides" src="images/slide/rc2.jpg">
		  <img class="mySlides" src="images/slide/rc3.jpg">
		</div>
	<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
    </section>
	  
	<section>
	  <div class="container text-center mt-4 col-8">
		  
	<?php 
		$sql = "SELECT * FROM news ORDER BY news_id DESC";
		$result = mysqli_query($dbcon, $sql);
		$num = mysqli_num_rows($result);
	?> 
		  <h2>ข่าวสาร</h2>
		<?php if($num!=0) { ?>
		  <ul class="card-columns mt-5">
	<?php foreach($result as $row) { ?>
	  <li class="card">
    <img class="card-img-top" src="images/news/<?php echo $row['news_img']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['news_title']; ?></h5>
      <p class="card-text news_text"><?php echo $row['news_text']; ?></p>
	<a href="news.php?id=<?php echo $row['news_id']; ?>" class="btn btn-primary">เพิ่มเติม</a>
    </div>
  </li>
	<?php } ?>
</ul>
		  <?php } else { ?>
		  <h4>เร็วๆนี้</h4>
		  <?php } ?>
	</section>
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.4.1.js"></script>
	<script src="js/slideshow.js"></script>
	<script>
	  var para = document.getElementsByClassName("news_text")[0];
	  var text = para.textContent.trim();

	  if (text.length > 150) {
		var truncatedText = text.slice(0, 150);
		para.textContent = truncatedText + "...";
	  }
	</script>
  </body>
</html>