<?php
/**
 * == РАБОТА С ДАННЫМИ ==
 *
 * 1. Текстовые форматы
 */

// 1.1 XML
//$xmlText = file_get_contents('users.xml');
//$xml = new SimpleXMLElement($xmlText);
//
//foreach ($xml->users->user as $k => $user) {
//    echo 'ID: ' . $user->id->__toString();
//    echo ' name=' . $user->name->__toString();
//    echo ' age=' . $user->age->__toString();
//    echo '<br>';
//
//    echo 'attributes:<br>';
//    foreach ($user->attributes() as $attributeName => $attributeValue) {
//        echo "$attributeName = $attributeValue<br>";
//    }
//
//    echo '<br><hr><br>';
//}
//
//$attrName = 'sub-id';
//echo 'sub-id attr of first user: ' . $xml->users->user[0]->attributes()->$attrName;
//
//// $xml->simple->__toString();
///
///


// 1.2 CSV
//$fp = fopen('users.csv', 'r');
//$data = [];
//while (!feof($fp)) {
//    $str = fgetcsv($fp, 1024 * 1024, ';');
//    if ($str) {
//        $data[] = $str;
//    }
//}
//fclose($fp);
//
//var_dump($data);
//
//$data[] = [
//    'Ma;s"ha',
//    35,
//    'Novosibirsk'
//];
//$fp = fopen('users.csv', 'w');
//foreach ($data as $elem) {
//    fputcsv($fp, $elem, ';');
//}
//fclose($fp);


// 1.3 JSON
$arr = [
    'users' => [
        [
            'name' => 'Dima',
            'age' => 25,
            'city' => 'Saint-Petersberg'
        ],
        [
            'name' => '[{"name":"Di',
            'age' => 22,
            'city' => 'Sa[]int-Pet{e"rsberg'
        ],
        [
            'name' => 'Petja',
            'age' => 11,
            'city' => 'Saint-Petersberg'
        ],
    ],
    'cities' => [
        '1' => 'Spb',
        '2' => 'Moskow',
    ]
];

// [{"name":"Dima","age":25,"city":"Saint-Petersberg"},{"name":"Vasja","age":22,"city":"Saint-Petersberg"},{"name":"Petja","age":11,"city":"Saint-Petersberg"}]
// {"users":[{"name":"Dima","age":25,"city":"Saint-Petersberg"},{"name":"Vasja","age":22,"city":"Saint-Petersberg"},{"name":"Petja","age":11,"city":"Saint-Petersberg"}],"cities":{"1":"Spb","2":"Moskow"}}
header('Content-Type: application/json');
echo json_encode($arr);

//file_put_contents('users.json', $json);
//
//$data = file_get_contents('users.json');
//$users = json_decode($data, true);
//var_dump($users);