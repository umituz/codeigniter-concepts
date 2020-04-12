<!DOCTYPE html>
<html>
<head>
	<title>Database Results</title>
</head> 
<body>
<?php echo "<pre>"; print_r($rows); echo "</pre>"; ?>
<ul>
	<?php foreach ($rows as $row) { ?>
		<li><?php echo "[{$row->id}] - {$row->title}"; ?></li>
	<?php } ?>
</ul>
</body>
</html>