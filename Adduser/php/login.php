<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ログイン</title>
</head>
<body>
	<?php 
		// require 'password.php';

		session_start();
		if(!isset($_SESSION["userid"]) && empty($_POST["id"]) && empty($_POST["password"])){
			header("Location: ../login.html");
			exit;
		}
		elseif(!isset($_SESSION["userid"]) && !empty($_POST["id"]) && !empty($_POST["password"])){
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
					$row = $stmt -> fetch(PDO::FETCH_ASSOC);
					if($row){
						if(password_verify(htmlspecialchars($_POST['password']),$row['password'])){
							$_SESSION['userid'] = $row['userid'];
							$_SESSION['password'] = $row['password'];
						}
						else{
							print "パスワードが違います";
							exit;
						}
					}
					else{
						print "ユーザーIDが違います<br>";
						exit;
					}

					$dbh = null;
				}catch(PDOException $e){
					print "error";
				}
		}
		print "ようこそ".$_SESSION['userid']."さん<br>";
		print "パスワードは".$_SESSION['password']."です。<br>";
	?>
	<a href="logout.php">ログイン画面に戻る</a>
</body>
</html>