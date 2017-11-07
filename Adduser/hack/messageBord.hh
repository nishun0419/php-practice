<?hh
	session_start();
	if(!isset($_SESSION["userid"])){
		header('Location: ../php/login.php');
	}

	$dsn = "mysql:dbname=SNS;host=localhost;charset=utf8";
	$user = "nise";
	$password = "nise";
	try{
		$dbh = new PDO($dsn,$user,$password);

		$sql = "select * from messagebords where userid=?"
		$stmt = $dbh -> prepare($sql);
		$stmt -> bindValue(1, $_SESSION["userid"], PDO::PARAM_STR);
		$stmt -> execute();
		$userdata = array();
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		while($row){
			$userdata[] = array(
				"title" => $row["title"]
				"message" => $row["message"]
				"posttime" => $row["posttime"]
			);
		}
		return $userdata;
	}catch(PDOException $e){
		$userdata = $e;
	}finally{
		return $userdata;
	}