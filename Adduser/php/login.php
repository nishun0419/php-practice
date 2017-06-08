<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ログイン</title>
</head>
<body>
	<?php 
		$dsn ="mysql:dbname=SNS;host=localhost;charset=utf8";
		$user = "nise";
		$password = "nise";
		try{
			$dbh = new PDO($dsn, $user, $password);
			print "接続に成功しました。<br>";

			$sql = "select * from user where userid = ? && password = ?";
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue(1, htmlspecialchars($_POST['id']),PDO::PARAM_STR);
			$stmt -> bindValue(2, $_POST['password'], PDO::PARAM_STR);
			$stmt -> execute();
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			if($row){
				print "ようこそ".$row['userid']."さん<br>";
				print "パスワードは".$row['password']."です。<br>";
			}
			else{
				print "ユーザーID、パスワードが違います。<br>";
			}

			$dbh = null;
		}catch(PDOException $e){
			print "error";
		}
	?>
	<a href="../login.html">ログイン画面に戻る</a>
</body>
</html>