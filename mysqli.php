<?php
ini_set('display_errors', 'on');
ini_set('error_reporting', E_ALL | E_NOTICE);

$host = 'mysql';

// ДОЛЖНА БЫТЬ ПОДКЛЮЧЕНА mysqli!!!
$mysql = new mysqli($host, 'root', 'tiger', 'test_db', 3306);
// проверим успешность подключения
if (mysqli_connect_errno()) {
    echo 'Connection error: ' . mysqli_connect_error() . ' #' . mysqli_connect_errno();
    die;
} else {
    echo 'Connected successfull<br>';
}

// ** select

// выберем пользователей отсортированных по убыванию id в количестве 5 штук
$ret = $mysql->query("SELECT * FROM users ORDER BY id DESC LIMIT 5");
while ($row = $ret->fetch_assoc()) {
    $data[] = $row;
};
//$data = $ret->fetch_assoc(); // из объекта результата вопроса получаем записи
echo 'affected rows: ' . $mysql->affected_rows . '<br>'; // выводим кол-во затронутых записей
echo 'result: <pre>' . print_r($data, 1) . '</pre>'; // распечатываем рез-т


// ** insert

// вставим нового ползователя с именем Jack
$date = date('Y-m-d', time() - 86400 * 365 * 20);
$ret = $mysql->query("INSERT INTO users (`name`, gender, `birth_date`) VALUES ('Jack', '1', '$date');");
if (!$ret) { // проверим, что запрос успешно выполнился
    echo "query error: " . $mysql->error; // если нет - выведем ошибку и умрем
    die;
}

// выведем айди последней вставленной записи, он будет уникален в рамках текущего соединения с БД, на него можно рассчитывать
echo 'last insert id: ' . $mysql->insert_id . '<br>';
echo 'affected rows: ' . $mysql->affected_rows . '<br>'; // выводим кол-во затронутых записей


// ** update
// обновим емэйл ВСЕМ пользователям с идентификатором больше 5, будьте осторожны с такими командами, как правило
// условие WHERE должно быть строгим например "... WHERE id = " . (int)$id;
$ret = $mysql->query("UPDATE users SET name = 'Semen' WHERE id > 20");

// выведем число обновленных строк, mysql подчитает лишь те строки котоыре реально обновились
// то есть если у кого-то из попавших под условие пользователей уже был емейл "ololo@mail.ru" такая запись обновлена не будет
echo $mysql->affected_rows . ' rows updated';