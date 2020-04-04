<?php
/**
 * ======================================
 * ====== Встроенные функции языка ======
 * ======================================
 *
 * == 5. Функции для работы с файлами ==
 *
 * 1. file_get_contents / file_put_contents
 * 2. fopen, fgets, fputs, fclose
 * 3. move_uploaded_file
 *
 */

//$data = file_get_contents('vk_ava.jpg');
//var_dump($data);
//file_put_contents('image.jpg', $data);

//$fp = fopen('file.txt', 'r');
//
//$data = [];
//while ($str = fgets($fp, 1000)) {
//    $data[] = trim($str);
//}
//
//var_dump($data);
//fclose($fp);

//$fp = fopen('file.txt', 'a');
//fputs($fp, '123 123' . PHP_EOL);
//fclose($fp);
?>

<form enctype="multipart/form-data" action="files.php" method="post">
    <input type="file" name="photo">
    <input type="submit">
</form>

<?php

if (!empty($_FILES['photo'])) {
    move_uploaded_file($_FILES['photo']['tmp_name'], '../../images/newImage.jpg');
}

?>