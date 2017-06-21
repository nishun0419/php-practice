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
				<th>タイトル</th>
					<td><input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" value="{{ $data -> id}}">
					<input type="text" name="title" value="{{ $data -> title }}" ></td>
			</tr>
			<tr>
				<th>メッセージ</th>
					<td><textarea name="message">{{ $data -> message }}</textarea></td>
			</tr>
		</table>
		<input type="submit">
	</form>
</body>
</html>