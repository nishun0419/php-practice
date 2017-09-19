<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ログイン</title>
</head>
<body>
	<?php
		session_start(); 
		$dsn ="mysql:dbname=SNS;host=localhost;charset=utf8";
		$user = "nise";
		$password = "nise";
		try{
			$dbh = new PDO($dsn, $user, $password);
			print "接続に成功しました。<br>";

			$sql = "select * from user where userid = ?";
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue(1, htmlspecialchars($_POST['id']),PDO::PARAM_STR);
			$stmt -> execute();
			if(!$stmt -> fetch(PDO::FETCH_ASSOC)){
				$sql = "insert into user (userid, password) values(? , ?)";
				$stmt = $dbh -> prepare($sql);
				$stmt -> bindValue(1 , htmlspecialchars($_POST['id']), PDO::PARAM_STR);
				$stmt -> bindValue(2 , htmlspecialchars($_POST['password']), PDO::PARAM_STR);
				$stmt -> execute();
				$_SESSION["userid"] = $_POST["id"];
				$_SESSIOM["password"] = $_POST["password"];
				header("Location: login.php");
				exit;
			}
			else{
				print "このユーザーIDはもう使われています。";
			}

			$dbh = null;
		}catch(PDOException $e){
			print "error";
		}
	?>
</body>
</html>