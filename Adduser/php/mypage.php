<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mypage</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require('navbar.php');
		// session_start();
		if(!isset($_SESSION["userid"])){
			header("Location: login.php");
			exit;
		}
		else{
			// $header = array(
			// 	'Content-Type: application/x-www-form-urlencoded',
			// 	'Content-Length: 20');

			// $options = array('http' =>
			// 	array(
			// 		"method" => "GET",
			// 		"header" => implode("\r\n",$header)
			// 	)
			// );
			// $c = curl_init("../hack/messageBord.hh");
			// curl_setopt($c, CURLOPT_CUSTOMREQUEST , 'GET');
			// curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); // 証明書の検証を行わない
			// curl_setopt($c, CURLOPT_RETURNTRANSFER, true); // レスポンスを文字列で受け取る
			// curl_exec($c);

			$message = file_get_contents("../hack/messageBord.hh");
			if($message == null){
				print "aaa";
			}
			else{
				echo $message;
			}
			// foreach ($message as $val) {
			// 	print $val -> title;
			// 	print $val -> message;
			// }
		}
	?>

	<a href="../hack/logout.hh">ログアウト</a>
</body>
</html>