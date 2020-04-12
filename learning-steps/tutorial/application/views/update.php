<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
</head>
<body>
<form action="<?php echo base_url("database/update") ?>" method="POST">
	<table cellpadding="5" cellspacing="5">
		<tr>
			<td>ID No</td>
			<td><select name="id">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select></td>
		</tr>
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
			<td><input type="submit" value="Güncelle"></td>
		</tr>
	</table>
</form>
</body>
</html>