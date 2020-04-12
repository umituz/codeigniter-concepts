<!DOCTYPE html>
<html>
<head>
	<title>Personel Listesi</title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>Ad Soyad</th>
			<th>Email Adresi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($personel_listesi as $personel): extract($personel); ?>
			<tr>
				<td><?=$isim?></td>
				<td><?=$email?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>