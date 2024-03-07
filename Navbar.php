<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">RC Workshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if (isset($_SESSION['logined'])) { ?>
      <?php if ($_SESSION['user']['user_level'] == 1) { ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link" href="reserve.php">แจ้งใช้โรงประลอง</a> </li>
          <li class="nav-item"><a class="nav-link" href="history.php">ประวัติ</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ข้อมูลส่วนตัว </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="email.php">อีเมล์</a>
              <a class="dropdown-item" href="password.php">รหัสผ่าน</a>
            </div>
          </li>
        </ul>
      <?php } else { ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link" href="request.php">คำขอ</a></li>
          <li class="nav-item"> <a class="nav-link" href="adminhistory.php">ประวัติ</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ผู้ใช้ </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="user_list.php">จัดการผู้ใช้</a>
              <a class="dropdown-item" href="user_add.php">เพิ่มผู้ใช้</a>
            </div>
          </li>
		<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ข่าวสาร </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="news_list.php">จัดการข่าวสาร</a>
              <a class="dropdown-item" href="news_add.php">เพิ่มข่าวสาร</a>
            </div>
          </li>
        </ul>
      <?php } ?>
      <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mr-4"><span style="color: white" class="navbar-text">
            <?php echo $_SESSION['user']['user_name']; ?>
          </span></li>
          <li class="nav-item mr-2"><a class="btn btn-danger" href="logout.php">ออกจากระบบ</a></li>
        </ul>
      </div>
    <?php } else { ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn btn-secondary" href="login.php">เข้าสู่ระบบ</a>
        </li>
      </ul>
    <?php } ?>
  </div>
</nav>