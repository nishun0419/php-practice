<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sample</title>
	<style>
		body{ color: gray; }
		h1{font-size: 18pt; font-weight: bold;}
		th{ color: white; background-color: #999; }
		td{ color: black; background-color: #B2D5E5; }
		p{padding : 0; margin: 0; font-family:'Courier New',Courier;}
	</style>
</head>
<body>
	<h1>Sample</h1>
	<form method="post" action="/helo">
		{{ csrf_field() }}
		<input type="text" name="com" autofocus>
		<input type="submit">
	</form>
	@if($message == 0)
		@foreach($data as $val)
			<p>{{ $val }}</p>
		@endforeach
	@elseif($message == 127)
		<strong>正しいコマンドを入力してください</strong>
	@elseif($message == 1)
		<strong>入力されたコマンドは実行できません</strong>
	@else
		{{ $message }}
	@endif
</body>
</html>