<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ログイン</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require('navbar.php');

		// session_start();
		if(isset($_SESSION['userid'])){
			header("Location: mypage.php");
			exit;
		}
		if(isset($_SESSION['message_Login'])){
			print $_SESSION['message_Login'];
			unset($_SESSION['message_Login']);
		}
	?>
	<form method="POST" action="../hack/login.hh">
		<table border="1">
			<tr>
				<td>ユーザーID</td>
				<td><input type="text" name="id"></td>
			<tr>
			</tr>
				<td>パスワード</td>
				<td><input type="password" name="password"></td>
			</tr>
		</table>
		<input type="submit">
	</form>
</body>
</html>