<?hh
	session_start();
	if(!isset($_SESSION["message_Login"])){
		header('Location: ../php/login.php');
		exit;
	}

	$dsn = "mysql:dbname=SNS;host=localhost;charset=utf8";
	$user = "nise";
	$password = "nise";
	try{
		$dbh = new PDO($dsn,$user,$password);

		$sql = "select * from messagebords where userid = ?";
		$stmt = $dbh -> prepare($sql);
		$stmt -> bindValue(1, $_SESSION["userid"],PDO::PARAM_STR);
		$stmt -> execute();
		$userdata = array();
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		if($row){
			while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
				$userdata[] = array(
					"title" => $result["title"],
					"message" => $result["message"],
					"posttime" => $result["posttime"]
				);
			}
			// $_SESSION["messagebords"] = $userdata;
			// header("Location: ../php/mypage.php");
			echo $userdata;
			exit;
		}
		else{
			$userdata = null;
			// $_SESSION["messagebords"] = "失敗";
			// header("Location: ../php/mypage.php");
			exit;
		}
		$dbh = null;
	}catch(PDOException $e){

	}