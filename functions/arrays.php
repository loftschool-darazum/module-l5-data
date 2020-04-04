<?php
/**
 * ======================================
 * ====== Встроенные функции языка ======
 * ======================================
 *
 * == 4. Функции для работы с массивами ==
 *
 * 1. array_values
 * 2. array_keys
 * 3. array_column, array_combine
 * 4. array_key_exists
 * 5. array_flip
 * 6. array_map
 * 7. array_walk
 * 8. array_merge, сложение массивов
 * 9. array_diff
 * 10 array_diff_assoc
 * 11. sort, ksort, rsort, asort, usort
 */

ini_set('display_errors', 'on');
ini_set('error_reporting', E_ALL | E_NOTICE);

$users = [
    'user_1' => [
        'id' => 1,
        'name' => 'Dima',
        'surname' => 'Razumovskiy',
        'age' => 33,
        'gender' => 1,
    ],
    'user_2' => [
        'id' => 22,
        'name' => 'Dima',
        'surname' => 'Petrov',
        'age' => 42,
        'gender' => 2,
    ],
    'user_3' => [
        'id' => 28,
        'name' => 'Semen',
        'surname' => 'Semenov',
        'age' => 11
    ],
    'user_4' => [
        'id' => 2,
        'name' => 'Sasha',
        'surname' => 'Pavlov',
        'age' => 22
    ],
];

$addAge = 2;

//$usersNew = array_map(function($user) use($addAge) {
//    $result = $user;
//    $result['age'] += $addAge;
//    $result['name_and_surname'] = $user['name'] . ' ' . $user['surname'];
//    return $result;
//}, $users);
//
//var_dump($usersNew);

//$ret = array_walk($users, function (&$user, $key) {
//    $user['key'] = $key;
//});

$addUsers = [
    'user_1' => [
        'id' => 1,
        'name' => 'AAA',
        'surname' => 'BBB',
        'age' => 33,
        'gender' => 1,
    ],
    'user_15' => [
        'id' => 15,
        'name' => 'CCC',
        'surname' => 'DDD',
        'age' => 42,
        'gender' => 2,
    ],
];

$a = [
    'key_2' => 2,
    'key_4' => 8,
    'key_1' => 1,
    'key_3' => 3,
];

$b = [
    'k1' => 1,
    'key_2' => 3
];

$keys = [
    123 => 'Spb',
    1234 => 'Moscow',
    11 => 'Abakan'
];

$nameSortRules = [
    'Dima' => 3,
    'Sasha' => 2,
    'Semen' => 1
];


//uasort($users, function ($user1, $user2) use($nameSortRules) {
//    return $nameSortRules[$user1['name']] - $nameSortRules[$user2['name']];
//});
//
//var_dump($users);

$arr = [1,2,3,4,5,6,7,8,9];
//var_dump(array_chunk($arr, 10));

var_dump(array_slice($arr, 2, 3));