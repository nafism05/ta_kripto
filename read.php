<?php include('menu.php'); ?>

<form action="read.php" method="get">
	
	Key 1 : 
	<input type="number" name="key1" value="<?php echo $_GET['key1']; ?>">
	<br>
	<br>
	Key 2 : 
	<input type="number" name="key2" value="<?php echo $_GET['key2']; ?>">
	<br>
	<br>
	Key 3 : 
	<input type="number" name="key3" value="<?php echo $_GET['key3']; ?>">
	<br>
	<br>

	<input type="submit" name="submit" value="Get">
</form>

<?php 

if(isset($_GET['key1']) && isset($_GET['key2']) && isset($_GET['key3'])){
	$key1 = $_GET['key1'];
	$key2 = $_GET['key2'];
	$key3 = $_GET['key3'];


	include('database.php');
	$db = new Database();
	$db->connect();
	$db->select('data'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
	$res = $db->getResult();
	// print_r($res);

	include('caesar.php');
	$caesar = new Caesar();
	?>

	<table border="1">
	  <tr>
	    <th>No</th>
	    <th>Data</th>
	    <th>Action</th>
	  </tr>

	  	<?php
	  	$i=0;
		foreach ($res as $value) {?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $caesar->decrypt($value['data'], array($key1,$key2,$key3)); ?></td> 
				<td><a href="edit.php?id=<?php echo $value['id']; ?>&data=<?php echo $caesar->decrypt($value['data'], array($key1,$key2,$key3)); ?>">edit</a> / <a href="delete.php?id=<?php echo $value['id']; ?>">delete</a></td> 
			</tr>

			<?php	
			$i++;
		 } ?>
	</table>	

<?php
}