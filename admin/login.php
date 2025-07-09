<?php
session_start();
$config = json_decode(file_get_contents(__DIR__.'/../config/settings.json'), true);
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['user'] === $config['admin_user'] && $_POST['pass'] === $config['admin_pass']) {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
include __DIR__.'/../templates/header.php';
?>
<h2 class="text-xl font-bold mb-4">Welcome to MillionBest Tools Dashboard</h2>
<?php if ($error): ?><div class="bg-red-200 p-2 mb-2"><?php echo $error; ?></div><?php endif; ?>
<form method="post" class="max-w-sm">
    <input type="text" name="user" class="border p-2 w-full mb-2" placeholder="Username" required>
    <input type="password" name="pass" class="border p-2 w-full mb-2" placeholder="Password" required>
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Login</button>
</form>
<?php include __DIR__.'/../templates/footer.php'; ?>
