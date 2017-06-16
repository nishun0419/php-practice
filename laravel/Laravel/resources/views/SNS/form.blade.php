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
				<th>内容</th>
			</tr>
			<tr>
				<td><input type="hidden" name="_token" value="{{ csrf_token() }}"><textarea name="message"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>