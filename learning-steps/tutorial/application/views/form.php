<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>

<form action="<?php echo base_url(); ?>kontrol/kaydet" method="get">
	<table>
		<tr>
			<td>Adsoyad</td>
			<td><input type="text" name="isim"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Cinsiyet</td>
			<td><select name="cinsiyet">
				<option value="Bay">Bay</option>
				<option value="Bayan">Bayan</option>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name=""></td>
		</tr>
	</table>
</form>

</body>
</html>