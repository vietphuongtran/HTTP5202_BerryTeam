<?php
$username = 'root';
$password = 'root';
$dbname = 'phpclass';
//data source name
$dsn = 'mysql:host=localhost;dbname=' . $dbname;

$dbcon = new PDO($dsn, $username, $password);
$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



