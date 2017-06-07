<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php mysql</title>
</head>
<body>
	<p>
		<?php 
			$dsn = "mysql:dbname=test;host=localhost;charset=utf8";
			$user = "root";
			$password = "root";
			try{
				$dbh = new PDO($dsn, $user, $password);
				print("接続に成功しました。<br>");

				$sql = "select * from test_tab";

				foreach($dbh -> query($sql) as $row){
					print($row['coll'].'<br>');
				}
				$sql = "insert into test_tab (coll) values(:coll)";
				$stmt = $dbh -> prepare($sql);
				$stmt -> bindValue(':coll', 100 , PDO::PARAM_INT);
				$stmt -> execute();

				$dbh = null;
			}catch(PDOException $e){
				print("error");
			}
		?>
	</p>
</body>
</html>