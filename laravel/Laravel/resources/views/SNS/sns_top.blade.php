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
			<div>{{ $val -> message}}&nbsp;&nbsp;&nbsp;投稿日時：{{ $val -> created_at }}
			@if($val -> created_at != $val -> updated_at)
					&nbsp;&nbsp;&nbsp;更新日時：{{ $val -> updated_at }}
			@endif 
			<a href="/SNS/delete?id={{$val -> id}}">削除</a> <a href="/SNS/edit?id={{$val -> id}}">編集</a></div>
	@endforeach
</body>
</html>