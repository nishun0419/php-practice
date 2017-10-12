<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mypage</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require('navbar.php');
		// session_start();
		if(!isset($_SESSION["userid"])){
			header("Location: login.php");
			exit;
		}
		print $_SESSION['userid']."<br>";
		print $_SESSION['password'];
	?>
	<a href="../hack/logout.hh">ログアウト</a>
</body>
</html>