<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sample</title>
	<style>
		body{ color: gray; }
		h1{font-size: 18pt; font-weight: bold;}
		th{ color: white; background-color: #999; }
		td{ color: black; background-color: #999; }
	</style>
</head>
<body>
	<h1>Sample</h1>
	<p>{{ $message }}</p>
	<table>
		<tr><th>ID</th><th>NAME</th><th>MAIL</th><th>AGE</th></tr>
		@foreach($data as $val)
		<tr>
			<td>{{ $val -> id }}</td>
			<td>{{ $val -> name }}</td>
			<td>{{ $val -> mail }}</td>
			<td>{{ $val -> age }}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>