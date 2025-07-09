<?php
function csrf_token(): string {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['token'];
}
function render(string $path, array $data = []): void {
    extract($data);
    include $path;
}
function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}
