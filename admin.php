<h3>Список пользователей: </h3>
<?php
$pdo = new PDO("mysql:host=mysql;dbname=test_db", 'root', 'tiger');

//$stmt = $pdo->prepare("SELECT * FROM users where `name` = :user_name");
//$res = $stmt->execute([':user_name' => $_GET['name']]);
//$stmt->debugDumpParams();
//
//var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

require "dbFunctions.php";

deleteById('users', 'id', 18, $pdo);
$users = getAll('users', $pdo);

/**
 * 1. полные данные (json, ajax)
 * 2. удалить
 * 3. добавить нового
 */
foreach ($users as $user) {
    $deleteHTML = '<a href="#" onclick="deleteUser(' . $user['id'] . '); return false;">delete</a>';
    $infoHTML = '<a href="#" onclick="showUserInfo(' . $user['id'] . '); return false;">info</a>';
    echo "<div id='user_{$user['id']}'>";
    echo '#' . $user['id'] . ' ' . $user['name'] . '[ ' . $deleteHTML . ' ] [ ' . $infoHTML . ' ]';
    echo "<div id='user_info_{$user['id']}'></div>";
    echo "</div>";
}
?>

<h3>Добавить пользователя: </h3>
<form action="addUser.php" method="post" id="add_user_form">
    name: <input type="text" name="name"> <br>
    gender: <input type="text" name="gender"> <br>
    birth_date: <input type="text" name="birth_date"> <br>
    points: <input type="text" name="points"> <br>
    height: <input type="text" name="height"> <br>

    <input type="button" value="Добавить" onclick="addUser();">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function deleteUser(id) {
        $.get(
            '/deleteUser.php',
            {
                user_id: id,
                '_ajax': 1
            },
            function(result) {
                if (result.deleted_count > 0) {
                    $('#user_' + id).remove();
                }
            }
        );
    }

    function showUserInfo(id) {
        $.get(
            '/userInfo.php',
            {
                user_id: id,
                '_ajax': 1
            },
            function(result) {
                if (result.error) {
                    alert(result.error);
                } else {
                    var html = 'name: ' +  result.user.name;
                    html += '<br> gender: ' + result.user.gender;
                    html += '<br> birth_date: ' + result.user.birth_date;
                    html += '<br> points: ' + result.user.points;
                    $('#user_info_' + id).html(html);
                }
            }
        );
    }

    function addUser() {
        $.post(
            '/addUser.php',
            $('#add_user_form').serialize(),
            function(result) {
                if (result.user_id) {
                    alert('Добавлен пользователь с id = ' + result.user_id);
                } else if (result.error) {
                    alert(result.error);
                } else {
                    alert('Неизвестная ошибка');
                }
            }
        );
    }
</script>
