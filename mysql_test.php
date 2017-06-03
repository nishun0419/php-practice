<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php mysql</title>
</head>
<body>
	<p>
		<?php 
			$hostname = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "test";

			$connect = mysql_connect($hostname, $username, $password);
			mysql_select_db($dbname);

			$sql = "select * from test_tab";
			$sqlq = mysql_query($sql,$connect);

			while($row = mysql_fetch_array($sqlq)){
				print $row['coll'];
				} 

			mysql_free_result($sqlq);
			mysql_close($connect);
		?>
	</p>
</body>
</html>