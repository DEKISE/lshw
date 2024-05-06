<?php
/**
 * Задание #5
 *
 * Создайте массив $bmw с ячейками:
 *
 * model
 * speed
 * doors
 * year
 *
 * Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”.
 * Создайте массивы $toyota' и '$opel аналогичные массиву $bmw (заполните данными).
 * Объедините три массива в один многомерный массив.
 * Выведите значения всех трех массивов в виде:
 *
 * CAR name
 * name ­ model ­speed ­ doors ­ year
 *
 * Например:
 *
 * CAR bmw
 * X5 ­120 ­ 5 ­ 2015
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => 2015
];

$opel = [
    'model' => 'Senator',
    'speed' => 130,
    'doors' => 5,
    'year' => 1986
];

$toyota = [
    'model' => 'Camry',
    'speed' => 150,
    'doors' => 5,
    'year' => 2020
];

$cars = ['BMW' => $bmw, 'Opel' => $opel, 'Toyota' => $toyota];

foreach ($cars as $name => $car) {
    echo "Car $name<br>";
    echo "{$car['model']} {$car['speed']} {$car['doors']} {$car['year']}<br><br>";
}
