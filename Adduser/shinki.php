<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新規登録</title>
</head>
<body>
	<h1>新規登録</h1>
	<?php
		session_start(); 
		if(isset($_SESSION['message_Shinki'])) {
			print $_SESSION['message_Shinki'];
		} 	
	?>
	<form method="POST" action="php/shinki.php">
		<table border="1">
			<tr>
				<td>ユーザーID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>パスワード</td>
				<td><input type="password" name="password"></td>
			</tr>
		</table>
		<input type="submit">
	</form>
</body>
</html>