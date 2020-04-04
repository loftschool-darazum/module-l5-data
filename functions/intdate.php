<?php
/**
 * ======================================
 * ====== Встроенные функции языка ======
 * ======================================
 *
 * == 2. Функции для работы с числами и датой ==
 *
 * 1. is_int, is_float, intval, floatval
 * 2. is_numeric
 * 3. time
 * 4. date, date_default_timezone_set
 * 5. strtotime
 */

date_default_timezone_set('Europe/Moscow');

$time = strtotime('23.03.2020 04:08:25');

var_dump($time, time());