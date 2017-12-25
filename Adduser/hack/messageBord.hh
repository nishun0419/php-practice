<?hh
	session_start();
	// if(!isset($_SESSION["message_Login"])){
	// 	header('Location: ../php/login.php');
	// 	exit;
	// }

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
			// while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
				$userdata[] = array(
					"title" => $row["title"],
					"message" => $row["message"],
					"posttime" => $row["posttime"]
				);
			// }
			// $_SESSION["messagebords"] = $userdata;
			// header("Location: ../php/mypage.php");
			header("Access-Control-Allow-Origin:*");
			header("Content-Type: application/json");
			echo json_encode($userdata);
			exit;
		}
		else{
			$userdata = null;
			echo "hhh";
			// $_SESSION["messagebords"] = "失敗";
			// header("Location: ../php/mypage.php");
			exit;
		}
		$dbh = null;
	}catch(PDOException $e){
		echo $e;

	}