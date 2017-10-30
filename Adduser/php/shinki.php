<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ログイン</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require('navbar.php');
		if(isset($_SESSION['message_Shinki'])) {
			print $_SESSION['message_Shinki'];
			unset($_SESSION['message_Shinki']);
		}	 	
	?>
	<div class="main container">
		<div class="text-center"><h3>新規登録</h3></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="col-md-6 col-md-offset-4">
				<form method="POST" action="../hack/shinki.hh">
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
			</div>
		</div>
	</div>
</body>
</html>