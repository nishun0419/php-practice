<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ログイン</title>
</head>
<body>
	<h1>ログイン画面</h1>
	<?php
		session_start();
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