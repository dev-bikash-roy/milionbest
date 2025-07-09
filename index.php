<?php
$configPath = __DIR__ . '/config/settings.json';
$config = is_file($configPath) ? json_decode(file_get_contents($configPath), true) : [];
$debug = !empty($config['APP_DEBUG']);

if ($debug) {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
}

$autoloader = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloader)) {
    http_response_code(500);
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">'
        . '<title>Dependency Error</title>'
        . '<script src="https://cdn.tailwindcss.com"></script>'
        . '</head><body class="p-8">'
        . '<h1 class="text-2xl font-bold mb-4">Dependencies Missing</h1>'
        . '<p>Run composer install or upload the vendor folder.</p>'
        . '</body></html>';
    exit;
}

require_once $autoloader;
require_once __DIR__ . '/src/Router.php';
require_once __DIR__ . '/src/functions.php';

$toolsData = json_decode(file_get_contents(__DIR__ . '/config/tools.json'), true) ?: [];
$tools = [];
foreach ($toolsData as $tool) {
    $tools[$tool['slug']] = $tool;
}

$router = new App\Router($tools);
$router->dispatch();
