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
	<p>
		<?php
			echo $message;
		?>
	</p>
	<table>
		<tr><th>ID</th><th>NAME</th><th>MAIL</th><th>AGE</th></tr>
		<?php foreach($data as $val){ ?>
		<tr>
			<td><?php echo $val -> id; ?></td>
			<td><?php echo $val -> name; ?></td>
			<td><?php echo $val -> mail; ?></td>
			<td><?php echo $val -> age; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>