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
	</style>
</head>
<body>
	<h1>Sample</h1>
	<p>{{ $message }}</p>
	@if(count($data) > 0)
	<table>
		<tr><th>ID</th><th>NAME</th><th>MAIL</th><th>AGE</th><th> </th></tr>
		@foreach($data as $val)
		<tr>
			<td><a href="/helo/update?id={{ $val -> id }}">{{ $val -> id }}</a></td>
			<td>{{ $val -> name }}</td>
			<td>{{ $val -> mail }}</td>
			<td>{{ $val -> age }}</td>
			<td><a href="/helo/delete?id={{ $val -> id }}">X</a></td>
		</tr>
		@endforeach
	</table>
	@endif
	<a href="/helo/new">新規作成</a>
</body>
</html>