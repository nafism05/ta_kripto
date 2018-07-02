
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include('menu.php'); ?>
	<br>
	<br>
	<br>
	<form action="edit_proses.php" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		Teks : 
		<input type="text" name="teks" size="70" value="<?php echo $_GET['data']; ?>">
		<br>
		<br>
		Key 1 : 
		<input type="number" name="key1">
		<br>
		<br>
		Key 2 : 
		<input type="number" name="key2" >
		<br>
		<br>
		Key 3 : 
		<input type="number" name="key3" >
		<br>
		<br>

		<input type="submit" name="submit" value="Edit">
	</form>
</body>
</html>