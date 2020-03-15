<?php
require "dbFunctions.php";

$pdo = new PDO("mysql:host=mysql;dbname=test_db", 'root', 'tiger');
$userId = add('users', $_POST, $pdo);
header('Content-type: application/json');

if ($userId) {
    echo json_encode(['user_id' => $userId]);
} else {
    echo json_encode(['error' => 'cant add user']);
}
