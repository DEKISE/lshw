<?php

/**
 * Задание #3.1
 * Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
 * id - уникальный идентификатор, равен номеру эл-та в массиве
 * name - случайное имя из 5-ти возможных (сами придумайте каких)
 * age - случайное число от 18 до 45
 * Преобразуйте массив в json и сохраните в файл users.json
 * Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
 * Посчитайте количество пользователей с каждым именем в массиве
 * Посчитайте средний возраст пользователей
 */

function task1()
{
    $users = [];

    for ($i = 0; $i < 50; $i++) {
        $name = mt_rand(1, 5);
        $search  = array(1, 2, 3, 4, 5);
        $replace = array('Иван', 'Пётр', 'Фёдор', 'Анна', 'Мария');
        $name = str_replace($search, $replace, $name);
        $user = [
            'id' => $i,
            'name' => $name,
            'age' => mt_rand(18, 45)
        ];
        $users[] = $user;
    }
    return $users;
}

function task2($arr)
{
    file_put_contents('users.json', json_encode($arr));
}

function task3($filename)
{
    if (file_exists($filename)) {
        $users = json_decode(file_get_contents($filename), true);
        $names = array_column($users, 'name');
        $names = array_count_values($names);
        ksort($names);
        echo "<pre>";
        echo "Количество пользователей с каждым именем в массиве:<br>";
        print_r($names);
        $ages = array_column($users, 'age');
        $age = array_sum($ages) / count($ages);
        echo "<br>Cредний возраст пользователей: $age";
    } else {
        echo "<p>Файл: " . $filename . " не существует.</p>\n";
    }
}