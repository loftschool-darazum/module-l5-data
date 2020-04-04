<?php
/**
 * ======================================
 * ====== Встроенные функции языка ======
 * ======================================
 *
 * == 2. Функции для работы со строками ==
 *
 * 1. strlen / mb_strlen
 * 2. strpos
 * 3. str_replace
 * 4. explode / implode
 * 5. strtoupper / strtolower
 * 6. substr / mb_substr
 * 7. md5, crc32, sha1
 */

// **** strlen
//$a = 'sdfsdfdsf';
//
//echo strlen($a);
//echo '<br>';
//echo mb_strlen('Дима', 'windows-1251');

// **** strpos
//$str = 'Mama mila ramu';
//$substr = 'Mama';
//
//if (strpos($str, $substr) === false) {
//    echo "Подстроки $substr нет в строке $str";
//} else {
//    echo "Подстрока $substr есть в строке $str";
//}

// ** str_replace
//$str = 'Mama mila ramu';
//$substr = 'Mama';
//$change = 'Papa';
//
//echo str_replace($substr, $change, $str);


// ** explode
//$strArr = 'Вася, Петя, Коля, Сережа';
//$arr = explode(',', $strArr);
//
//var_dump($arr);
//foreach ($arr as &$name) {
//    $name = trim($name);
//}
//
//var_dump($arr);
//
//echo implode('|', $arr);

// ** strtoupper / strtolower
//$lower = 'asdfasdfasdf';
//
//echo strtoupper($lower);
//echo '<br>';
//echo strtolower(strtoupper($lower));
//echo '<br>';
//echo ucfirst(strtoupper($lower));

// ** substr
//$str = 'Mama mila ramu';
//echo substr($str, 3, -3);


// ** md5, crc32, sha1
//$str1 = 'Ехал грека через реку и увидел в реке рака';
//$str2 = 'Ехал грека через реку и увидел в реке рака ';
//echo md5($str1) . '<br>';
//echo md5($str2) . '<br><br>';
//echo sha1($str1) . '<br>';
//echo sha1($str2) . '<br><br>';
//echo crc32($str1) . '<br>';
//echo crc32($str2) . '<br>';
//
//$arr = [];
//for($i = 0; $i < 1000000; $i++) {
//    $str = "$i - $i - $i";
//    $crc32 = crc32($str);
//    if (!isset($arr[$crc32])) {
//        $arr[$crc32] = 1;
//    } else {
//        echo "collision found for $i";
//    }
//}

//$html = file_get_contents('table.html');
//
//$users = [];
//$parts = explode('<td>', $html);
//$curUser = [];
//
//for($i = 3; $i < sizeof($parts); $i++) {
//    echo $i . ': ' . $parts[$i] . '<br>';
//    $str = trim($parts[$i]);
//    $data = explode('</td>', $str)[0];
//    if ($i % 2 == 1) {
//        $curUser['name'] = $data;
//    } else {
//        $curUser['age'] = $data;
//        $users[] = $curUser;
//        $curUser = [];
//    }
//}

var_dump($users);