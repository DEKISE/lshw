<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use \Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__ . '/../');
$dotenv->load();

$dbType = $_ENV['DB_TYPE'];
$dbHost1 = $_ENV['DB_HOST_1'];
$dbHost2 = $_ENV['DB_HOST_2'];
$dbUser = $_ENV['DB_USER'];
$dbName1 = $_ENV['DB_NAME_1'];
$dbName2 = $_ENV['DB_NAME_2'];
$dbPassword = $_ENV['DB_PASSWORD'];

$capsule = new Capsule;

const CONNECTION_DEFAULT = 'default';
const CONNECTION_SECOND = 'second';

$capsule->addConnection([
    'driver'    => $dbType,
    'host'      => $dbHost1,
    'database'  => $dbName1,
    'username'  => $dbUser,
    'password'  => $dbPassword,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
], CONNECTION_DEFAULT);

$capsule->addConnection([
    'driver'    => $dbType,
    'host'      => $dbHost1,
    'database'  => $dbName2,
    'username'  => $dbUser,
    'password'  => $dbPassword,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
], CONNECTION_SECOND);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$capsule->getConnection(CONNECTION_DEFAULT)->enableQueryLog();
$capsule->getConnection(CONNECTION_SECOND)->enableQueryLog();

function printLog()
{
    echo '<pre>';
    foreach ([CONNECTION_DEFAULT, CONNECTION_SECOND] as $name) {
        $log = Capsule::connection($name)->getQueryLog();
        foreach ($log as $elem) {
            echo $name . ':' . 0.01 * $elem['time'] . ': ' . $elem['query'] . ' bind: ' . json_encode($elem['bindings']) . '<br>';
        }
    }
    echo '</pre>';
}