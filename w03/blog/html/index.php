<?php
ini_set('display_errors', E_ALL);
ini_set('error_reporting', E_ERROR);

use Base\Application;
include '../src/config.php';

include '../vendor/autoload.php';

$app = new Application();
$app->run();
