<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mypage</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
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
		else{
			$message = file_get_contents("../hack/messageBord.hh");
			foreach ($message as $val) {
				print $val -> title;
				print $val -> message;
			}
		}
	?>

	<a href="../hack/logout.hh">ログアウト</a>
</body>
</html>