<?hh
//コメントテスト
			if(trim($_POST["id"]) == false){
				$_SESSION['message_Login'] = "IDを入力してください";
			}
			elseif(strpos($_POST["id"]," ") !== false || strpos($_POST["id"],"　") !== false){
				$_SESSION['message_Login'] = "スペースがないidを入力をしてください";
			}
			elseif(empty($_POST["password"])){
				$_SESSION['message_Login'] = "パスワードを入力してください";
			}

			if(isset($_SESSION['message_Login'])){
				header('Location: ../php/login.php');
				exit;
			}
		elseif(!isset($_SESSION["userid"]) && !empty($_POST["id"]) && !empty($_POST["password"])){
				$dsn ="mysql:dbname=SNS;host=mysql-server.ch4chqwtewtw.us-east-2.rds.amazonaws.com;charset=utf8";
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
							$resMes['userid'] = $row['userid'];	
							$resMes['password'] = $row['password'];
						}
						else{
							$resMes['error'] = "passerror";
						}
					}
				
					else{
						$resMes['error'] = "loginerror";
					}

					$dbh = null;
				}catch(PDOException $e){
				}
			echo json_encode($resMes);		
		}
exit;
