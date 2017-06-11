<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sample</title>
	<style>
		body{ color: gray; }
		h1{ font-size: 18pt; font-weight: bold; }
		th{ color: white; background-color: #999; }
		td{ color: black; background-color: #eee; padding: 5px 10px; }
	</style>
</head>
<body>
	<h1>Sample</h1>
	<p>
		<?php 
			echo $message; 
		?>
	</p>
	<table>
		<form method="post" action="/helo/new">
			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			<tr><td>NAME</td><td><input type="text" name= "name"></td></tr>
			<tr><td>MAIL</td><td><input type="text" name="mail"></td></tr>
			<tr><td>AGE</td><td><input type="text" name="age"></td></tr>
			<tr><td></td><td><input type="submit"></td></tr>
		</form>
	</table>
</body>
</html>