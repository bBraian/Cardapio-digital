<?php
session_start();
$username = 'u528066348_braian';
$password = 'Inter32001';
$hostname = '185.201.10.73';
$dbname = 'u528066348_bcode';

try {
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname.'', $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>