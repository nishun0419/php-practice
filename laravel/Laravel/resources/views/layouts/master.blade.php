<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アプリ名 - @yield('title')</title>
</head>
<body>
	<h1> @yield('title')</h1>
	@section('sidebar')
		ここがメインのサイドバー
	@show

	<div class="container">
		@yield('content')
	</div>
</body>
</html>