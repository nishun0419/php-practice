<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>phpテスト</title>
</head>
<body>
	<p>PHPのテストです</p>
	<p>
<?php
print "こんにちは。<br />";
print <<<EOS
お元気ですか?<br />
いいお天気ですね。<br />
ではさようなら。
EOS;
?>
	</p>
</body>
</html>