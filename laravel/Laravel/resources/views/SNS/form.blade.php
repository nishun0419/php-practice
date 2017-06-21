<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新規投稿</title>
</head>
<body>
	<h1>新規投稿</h1>
	<form method="POST" action="/SNS/form">
		<table border="1">
			<tr>
				<th>タイトル</th><td><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="text" name="title"></td>
			</tr>
			<tr>
				<th>メッセージ</th><td><textarea name="message"></textarea></td>
			</tr>
		</table>
		<input type="submit">
	</form>
</body>
</html>