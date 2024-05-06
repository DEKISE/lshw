<?php
/**
 * Задание #4
 *
 * Создайте переменную '$day' и присвойте ей произвольное числовое значение.
 * С помощью конструкции switch выведите фразу “Это рабочий день”, если значение переменной $day попадает в диапазон чисел от 1 до 5 (включительно).
 * Выведите фразу “Это выходной день”, если значение переменной $day равно числам 6 или 7.
 * Выведите фразу “Неизвестный день”, если значение переменной '$day' не попадает в диапазон чисел от 1 до 7 (включительно)
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$day = '';
$day = rand(0, 10);

//var_dump($day);

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Это неизвестный день";
}