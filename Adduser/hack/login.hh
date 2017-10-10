<?hh
			session_start();
		if(!isset($_SESSION["userid"]) && empty($_POST["id"]) && empty($_POST["password"])){
			header("Location: ../php/login.php");
			exit;
		}
		elseif(!isset($_SESSION["userid"]) && !empty($_POST["id"]) && !empty($_POST["password"])){
				$dsn ="mysql:dbname=SNS;host=localhost;charset=utf8";
				$user = "nise";
				$password = "nise";
				try{
					$dbh = new PDO($dsn, $user, $password);

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
							$_SESSION['message_Login'] = "パスワードが違います";
							header("Location: ../php/login.php");
							exit;
						}
					}
					else{
						$_SESSION['message_Login'] = "ユーザーIDが違います";
						header("Location: ../php/login.php");
						exit;
					}

					$dbh = null;
				}catch(PDOException $e){
				}		
		}
		header("Location: ../php/mypage.php");
		exit;
