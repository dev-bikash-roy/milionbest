<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/RouterAI.php';

$settings = json_decode(file_get_contents(__DIR__ . '/../config/settings.json'), true);
$toolsList = json_decode(file_get_contents(__DIR__ . '/../config/tools.json'), true);
$tools = [];
foreach ($toolsList as $tool) {
    $tools[$tool['slug']] = $tool;
}
$categories = json_decode(file_get_contents(__DIR__ . '/../config/categories.json'), true);

$router = new App\Router($tools, $categories);
=======

$router = new App\Router($tools);
$router->dispatch();
