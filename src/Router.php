<?php
namespace App;

class Router {
    private array $tools;
    private array $categories;

    public function __construct(array $tools, array $categories = []) {
=======
    public function __construct(array $tools) {
        $this->tools = $tools;
        $this->categories = $categories;
    }

    public function dispatch(): void {
        $slug = $_GET['tool'] ?? '';
        if ($slug && isset($this->tools[$slug]) && $this->tools[$slug]['visible']) {
            view(__DIR__ . '/../tools/' . $slug . '/view.php', [
                'settings' => $GLOBALS['settings'],
                'tools' => $this->tools,
                'categories' => $this->categories,
            ]);
=======
            include __DIR__ . '/../tools/' . $slug . '/view.php';
            return;
        }
        if ($slug) {
            http_response_code(404);
            view(__DIR__ . '/../templates/404.php', [
                'settings' => $GLOBALS['settings'],
                'categories' => $this->categories,
            ]);
            return;
        }
        view(__DIR__ . '/../templates/home.php', [
            'settings' => $GLOBALS['settings'],
            'tools' => $this->tools,
            'categories' => $this->categories,
        ]);
    }
}
