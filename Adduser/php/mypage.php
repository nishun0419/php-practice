<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mypage</title>
</head>
<body>
	<?php
		session_start();
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