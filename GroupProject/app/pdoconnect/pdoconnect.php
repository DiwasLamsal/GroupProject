<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$schema = 'groupb';
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>
