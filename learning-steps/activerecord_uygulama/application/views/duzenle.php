<!DOCTYPE html>
<html>
<head>
	<title>Veri Düzenle</title>
</head>
<body>
<form action="<?php echo base_url("personel/update/$row->id"); ?>" method="post">
	<table align="center">
		
		<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="<?php echo $row->title ?>"></td>
		</tr>
		<tr>
			<td>Detail</td>
			<td><textarea name="detail"><?php echo $row->detail ?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit">Düzenle</button></td>
		</tr>
	</table>
</form>
<a href="<?php echo base_url("personel"); ?>"><-Geri Dön</a>
</body>
</html>