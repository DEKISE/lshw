<?php

/**
 * Задание #1
 *
 * Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
 * Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
 */

function task1(array $strings, bool $return = true)
    {
        $result = implode("\n", array_map(function (string $str) {
            return "<p>$str</p>";
            }, $strings));

        if ($return) {
            return $result = array_map('print_r', $strings);
        }
        echo $result;
    }


/** Задание #2
 *
 * Функция должна принимать переменное число аргументов.
 * Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
 * Остальные аргументы это целые и/или вещественные числа.
 *
 * Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
 * Результат: 1 + 2 + 3 + 5.2 = 11.2
 */

function task2()
{
    $operation = func_get_arg('0');
    $result = func_get_arg('1');
    if ($operation === '+')
    {
        for ($i = 2; $i < func_num_args(); $i++)
        {
            $result += func_get_arg($i);
        }
    } elseif ($operation === '-') {
        for ($i = 2; $i < func_num_args(); $i++)
        {
            $result -= func_get_arg($i);
        }
    } elseif ($operation === '*') {
        for ($i = 2; $i < func_num_args(); $i++)
        {
            $result *= func_get_arg($i);
        }
    } elseif ($operation === '/') {
        for ($i = 2; $i < func_num_args(); $i++)
        {
            if (func_get_arg($i) != 0)
            {
                $result /= func_get_arg($i);
            } else {
                $result = "На 0 делить нельзя";
                break;
            }
        }
    }
    echo "<p>$result</p>\n";
}

/* Задание #3 (Использование рекурсии не обязательно)
 *
 * Функция должна принимать два параметра – целые числа.
 * Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
 * В остальных случаях выдавать корректную ошибку.
 */

function task3 ($w, $h)
{
    if (is_int($w) && is_int($h)) {
        echo '<table border="1">';
        for ($i = 1; $i <= $w; $i++) {
            echo "<tr>\n";
            for ($j = 1; $j <= $h; $j++) {
                $result = $i * $j;
                echo '<td align="center">';
                echo $result;
                echo "</td>\n";
            }
            echo "</tr>\n";
        }

        echo "</table>\n";
    } else {
        echo "<p>Используйте целые числа</p>\n";
    }
}

/* Задание #4 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
 *
 * Выведите информацию о текущей дате в формате 31.12.2016 23:59
 * Выведите unixtime время соответствующее 24.02.2016 00:00:00.
 */

function task4()
{
    echo "<p>". date("d.m.Y H:i") ."</p>\n";
    echo "<p>". strtotime('24.02.2016 00:00:00') ."</p>\n";
}

/* Задание #5 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
 *
 * Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
 * Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”.
 */

function task5 ()
{
    $string ='Карл у Клары украл Кораллы';
    echo "<p>" . $string . "</p>\n";
    echo "<p>" . str_replace('К','', $string) . "</p>\n";

    $string ='Две бутылки лимонада';
    echo "<p>" . $string . "</p>\n";
    echo "<p>" . str_replace('Две','Три', $string) . "</p>\n";
}

/* Задание #6 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
 *
 * Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
 * Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
 */

function task6 ($filename)
{
    file_put_contents('test.txt', 'Hello again!');
    $filename .= '.txt';
    if (file_exists($filename))
    {
        echo "<p>" . file_get_contents($filename) . "</p>\n";
    } else
    {
        echo "<p>Файл: " . $filename . " не существует.</p>\n";
    }
}

function task7 ()
{

}

function task8 ()
{

}

function task9 ()
{

}

function task10 ()
{

}
