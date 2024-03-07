<?php require("connect.php"); ?>

<?php
	unset($_SESSION['logined']);
	unset($_SESSION['user']);
	header("Location: index.php");
?>