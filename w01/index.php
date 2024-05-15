<?php
/**
 * Выполнить домашнее задание #2
 * Задание выполняется в двух файлах. Файл src/functions.php содержит все 10 функций. Функции именуются task1, task2, task3, с маленькой буквы, слитно. Файл с именем index.php содержит require(‘src/functions.php’); и вызов всех функций.
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require('src/functions.php');

task1(['qwe', 'tre', 'wer'], '1');
task2('/', 1,0.1,0);
task3(2,2);
task4();
task5();
task6('test');
task7();
task8();
task9();
task10();
