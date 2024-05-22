<?php
/**
 * Выполнить домашнее задание #2
 * Задание выполняется в двух файлах.
 * Файл src/functions.php содержит все функции.
 * Функции именуются task1, task2, task3, с маленькой буквы, слитно.
 * Файл с именем index.php содержит require(‘src/functions.php’); и вызов всех функций.
 * Задание выполняется в двух файлах.
 *
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require('src/functions.php');

task1();
task2(task1());
task3('users.json');

