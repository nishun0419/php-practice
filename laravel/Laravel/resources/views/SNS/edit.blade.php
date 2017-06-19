<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>編集</title>
</head>
<body>
	<h1>編集</h1>
	<form method="POST" action="/SNS/edit">
		<table border="1">
			<tr>
				<th>内容</th>
			</tr>
			<tr>
				<td><input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $data -> id}}">
				<textarea name="message">{{ 
				$data -> message }}</textarea></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>