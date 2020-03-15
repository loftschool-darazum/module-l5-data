<?php
require "dbFunctions.php";

$pdo = new PDO("mysql:host=mysql;dbname=test_db", 'root', 'tiger');
$deletedCount = deleteById('users', 'id', (int) $_GET['user_id'], $pdo);

if (!empty($_GET['_ajax'])) {
    header('Content-type: application/json');
    echo json_encode(['deleted_user_id' => $_GET['user_id'], 'deleted_count' => $deletedCount]);
} else {
    header('Location: /admin.php');
}
