<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
</head>
<body>
<form action="<?php echo base_url("database/insert") ?>" method="POST">
	<table cellpadding="5" cellspacing="5">
		<tr>
			<td>Title</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td>Detail</td>
			<td><textarea name="detail"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name=""></td>
		</tr>
	</table>
</form>
</body>
</html>