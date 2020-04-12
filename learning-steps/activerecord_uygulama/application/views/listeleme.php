<!DOCTYPE html>
<html>
<head>
	<title>Listeleme</title>
</head>
<body>

<div style="margin-bottom: 20px;" align="center"><a href="<?php echo base_url("personel/insertpage"); ?>">Yeni Kayıt</a></div>
<div align="center" style="margin-bottom: ">
	<form action="<?php echo base_url("personel/siralama"); ?>" method="post">
		<select name="siralama">
			<option value="id">ID</option>
			<option value="title">Title</option>
			<option value="detail">Detail</option>
		</select>
		<input type="submit" value="Sırala">
	</form>
</div>
<table align="center" cellpadding="5" cellspacing="5">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Detail</th>
			<th colspan="2">İşlemler</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $row) : ?>
			<tr>
				<td><?php echo $row->id ?></td>
				<td><?php echo $row->title ?></td>
				<td><?php echo $row->detail ?></td>
				<td><a href="<?php echo base_url("personel/updatepage/{$row->id}") ?>">Düzenle</a></td>
				<td><a href="<?php echo base_url("personel/delete/$row->id"); ?>">Sil</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>