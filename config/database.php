<?php

$dsn = "mysql:host=localhost;dbname=codeninja";
$username = "root";
$password = "";
try {
    $con = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection error :  " . $e->getMessage();
}
