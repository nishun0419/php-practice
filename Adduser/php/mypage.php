<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mypage</title>
</head>
<body>
	<?php
		session_start();
		print $_SESSION['userid']."<br>";
		print $_SESSION['password'];
	?>
	<a href="../hack/logout.hh">ログアウト</a>
</body>
</html>