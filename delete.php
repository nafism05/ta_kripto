<?php

$id = $_GET['id'];

include('database.php');
$db = new Database();
$db->connect();
$db->delete('data','id='.$id);  // Table name, WHERE conditions
$res = $db->getResult();  

header('Location: read.php');