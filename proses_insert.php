<?php

$teks = $_POST['teks'];
$key1 = $_POST['key1'];
$key2 = $_POST['key2'];
$key3 = $_POST['key3'];

include('caesar.php');

$caesar = new Caesar();

echo $caesar->encrypt($teks, array($key1,$key2,$key3));

$data = $caesar->encrypt($teks, array($key1,$key2,$key3));

include('database.php');
$db = new Database();
$db->connect();
$db->insert('data',array('data'=>$data));  // Table name, column names and respective values
$res = $db->getResult();  
header('Location: read.php');