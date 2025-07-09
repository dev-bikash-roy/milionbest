<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Router.php';

$configTools = json_decode(file_get_contents(__DIR__.'/../config/tools.json'), true);
$tools = [];
foreach ($configTools as $tool) {
    $tools[$tool['slug']] = $tool;
}
$router = new App\Router($tools);
$router->dispatch();
