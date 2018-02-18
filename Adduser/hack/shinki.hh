<?hh
		session_start();
		if(trim($_POST["id"]) == false){
			$_SESSION['message_Shinki'] = "IDを入力してください";
		}
		elseif(strpos($_POST["id"]," ") !== false || strpos($_POST["id"],"　") !== false){
			$_SESSION['message_Shinki'] = "スペースがないidを入力をしてください";
		}
		elseif(empty($_POST["password"])){
			$_SESSION['message_Shinki'] = "パスワードを入力してください";
		}

		if(isset($_SESSION['message_Shinki'])){
			header('Location: ../php/shinki.php');
			exit;
		}

		$dsn ="mysql:dbname=SNS;host=mysql-server.ch4chqwtewtw.us-east-2.rds.amazonaws.com;charset=utf8";
		$user = "nise";
		$password = "nise";
		try{
			$dbh = new PDO($dsn, $user, $password);
			print "接続に成功しました。";

			$sql = "select * from user where userid = ?";
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue(1, htmlspecialchars($_POST['id']),PDO::PARAM_STR);
			$stmt -> execute();
			if(!$stmt -> fetch(PDO::FETCH_ASSOC)){
				$sql = "insert into user (userid, password) values(? , ?)";
				$stmt = $dbh -> prepare($sql);
				$stmt -> bindValue(1 , htmlspecialchars($_POST['id']), PDO::PARAM_STR);
				$stmt -> bindValue(2 , password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT), PDO::PARAM_STR);
				$stmt -> execute();
				$_SESSION["userid"] = htmlspecialchars($_POST["id"]);
				$_SESSION["password"] = htmlspecialchars($_POST["password"]);
				unset($_SESSION["message_Shinki"]);
				header("Location: ../php/mypage.php");
				exit;
			}
			else{
				$_SESSION['message_Shinki'] = "入力したユーザーIDはすでに使われております。";
				header("Location: ../php/shinki.php");
			}

			$dbh = null;
		}catch(PDOException $e){
			print "error";
		}
