<?php
namespace App;

class Router
{
    private array $tools;

    public function __construct(array $tools)
    {
        $this->tools = $tools;
    }

    public function dispatch(): void
    {
        $slug = $_GET['tool'] ?? '';
        if ($slug && isset($this->tools[$slug]) && $this->tools[$slug]['visible']) {
            include_once __DIR__ . '/../tools/' . $slug . '/view.php';
            return;
        }
        if ($slug) {
            http_response_code(404);
            include __DIR__ . '/../templates/404.php';
            return;
        }
        include __DIR__ . '/../templates/home.php';
    }
}
