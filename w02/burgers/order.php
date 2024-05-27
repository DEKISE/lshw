<?php

/**
 * Задача #3.2
 * Скачайте верстку сайта “Бургерная”
 * Внизу вы найдете форму заказа, напишите скрипт, обрабатывающий эту форму. Скрипт должен:
 * Проверить, существует ли уже пользователь с таким email,
 * если нет - создать его, если да - увеличить число заказов по этому email.
 * Двух пользователей с одинаковым email быть не может.
 * Сохранить данные заказа - id пользователя, сделавшего заказ, дату заказа, полный адрес клиента.
 * Скрипт должен вывести пользователю:
 * Спасибо, ваш заказ будет доставлен по адресу: “тут адрес клиента”
 * Номер вашего заказа: #ID
 * Это ваш n-й заказ!
 * Где ID - уникальный идентификатор только что созданного заказа n - общий кол-во заказов,
 * который сделал пользователь с этим email включая текущий
 * Оформление не требуется, достаточно текста на белом фоне, отбитого переходами строк.
 * В задании необходимо использовать базы данных. Дамп БД необходимо приложить к репозиторию.
 */

try {
    $pdo = new PDO("mysql:host=localhost;dbname=burgers",
        'user_burgers', 'burgers');
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$name = $_GET['name'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$street = $_GET['street'];
$home = $_GET['home'];
$part = $_GET['part'];
$appt = $_GET['appt'];
$floor = $_GET['floor'];
$comment = $_GET['comment'];

$ret = $pdo->prepare("SELECT email FROM users WHERE email = :email");
$ret->execute(['email' => $email]);
$user_mail = $ret->fetch();
if ($user_mail)
{
    $user_mail = $user_mail['email'];
}

if ($email != $user_mail)
{
    $orders = 1;
    $ret = $pdo->prepare("INSERT INTO users (name, phone, email, orders)
    VALUES (:name, :phone, :email, :orders)");
    $ret->execute(['name' => $name, 'phone' => $phone, 'email' => $email, 'orders' => $orders]);
} else
{
    $ret = $pdo->prepare("SELECT orders FROM users WHERE email = :email");
    $ret->execute(['email' => $email]);
    $orders = $ret->fetch();
    $orders = $orders['orders'];
    $orders++;
    $ret = $pdo->prepare("UPDATE users SET orders = :orders WHERE email = :email");
    $ret->execute(['orders' => $orders, 'email' => $email]);
}

$ret = $pdo->prepare("SELECT id FROM users WHERE email = :email");
$ret->execute(['email' => $email]);
$user_id = $ret->fetch();
$user_id = $user_id['id'];

$ret = $pdo->prepare("INSERT INTO
    orders (data, user_id, street, home, part, appt, floor, comment)
    VALUES
        (:data, :user_id, :street, :home, :part, :appt, :floor, :comment)");
$ret->execute([
    'data' => date("Y-m-d"),
    'user_id' => $user_id,
    'street' => $street,
    'home' => $home,
    'part' => $part,
    'appt' => $appt,
    'floor' => $floor,
    'comment' => $comment]);

$id_order = $pdo->lastInsertId();


echo "Спасибо, ваш заказ будет доставлен по адресу: 
Улица $street, 
Дом $home, 
Корпус $part, 
Квартира $appt, 
Этаж $floor<br>";

echo "Номер вашего заказа: #".$id_order."<br>";
echo "Это ваш ". $orders."-й заказ!";
