<?php
require "dbFunctions.php";

$pdo = new PDO("mysql:host=mysql;dbname=test_db", 'root', 'tiger');
$user = getById('users', 'id', (int) $_GET['user_id'], $pdo);
header('Content-type: application/json');

if ($user) {
    echo json_encode(['user' => $user]);
} else {
    echo json_encode(['error' => 'user not found']);
}
