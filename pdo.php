<?php
try {
    $pdo = new PDO("mysql:host=mysql;dbname=test_db", 'root', 'tiger');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

// ** получение пользователя по id
$id = $_GET['id'] ?? 0;
if ($id) {
    $id = (int) $id;
    $query = "SELECT * FROM users WHERE id = $id";
    $ret = $pdo->query($query);
    // SQL INJECTION // ?id=123 UNION SELECT * FROM users; / ;DELETE * FROM users

    if (!$ret) { // проверяем на успешность
        print_r($pdo->errorInfo()); die;
    }

    $user = $ret->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo 'User #' . $id . ' does not exists';
    } else {
        echo '<pre>' . print_r($user, 1) . '</pre>';
    }
}


// ** получение пользователя по имени
$name = $_GET['name'] ?? '';

if ($name) {
    $ret = $pdo->query("SELECT * FROM users WHERE `name` = '$name'");
    $user = $ret->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>' . print_r($user, 1) . '</pre>';
}

//$insert = "INSERT INTO users (`name`, birth_date, gender, points) VALUES ('Maria', '1999-01-01', 0, 123456)";
//$pdo->query($insert);
//var_dump(['last_id' => $pdo->lastInsertId()]);

$update = "UPDATE users SET `name` = CONCAT(users.name, id) WHERE id IN(21, 22, 23) OR id > 26";
$result = $pdo->query($update);
if (!$result) {
    print_r($pdo->errorInfo());
    die;
}
var_dump(['affected_rows' => $result->rowCount()]);


if (isset($_REQUEST['form_send'])) {
    include "ajax.html";
}

if (!empty($_REQUEST['ajax'])) {
    header('Content-type: application/json');
    echo json_encode($user ? $user[0] : []);
}