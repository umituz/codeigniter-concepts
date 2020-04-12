<!DOCTYPE html>
<html>
<head>
	<title>Veri Ekle</title>
</head>
<body>
<form action="<?php echo base_url("personel/insert"); ?>" method="post">
	<table align="center">
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
			<td><button type="submit">Kayıt Ol</button></td>
		</tr>
	</table>
</form>
<a href="<?php echo base_url("personel"); ?>"><-Geri Dön</a>
</body>
</html>