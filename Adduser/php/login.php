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
		// session_start();
		if(isset($_SESSION['userid'])){
			header("Location: mypage.php");
			exit;
		}
	?>
	<div class="container">
		<div class="text-center"><h3>ログイン</h3></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="col-md-8 col-md-offset-2">
			<?php
			if(isset($_SESSION['message_Login'])){
				print "<span class='help-block'><strong>". $_SESSION['message_Login']. "</strong></span>";
				unset($_SESSION['message_Login']);
			}
			?>
			<form method="POST" action="../hack/login.hh">
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