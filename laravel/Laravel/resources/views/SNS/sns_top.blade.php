<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>top画面</title>
</head>
<body>
	<h1>投稿一覧</h1>
	<a href="/SNS/form">新規投稿</a>
	@foreach($data as $val)
	<div>{{ $val -> message}}&nbsp;&nbsp;&nbsp;{{ $val -> updated_at }}</div>
	@endforeach
</body>
</html>