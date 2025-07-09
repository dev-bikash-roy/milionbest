<?php
session_start();
$config = json_decode(file_get_contents(__DIR__.'/../settings.json'), true);
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
?>
<?php include __DIR__.'/../includes/header.php'; ?>
<h2>Welcome to MillionBest Tools Dashboard</h2>
<?php if ($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
<form method="post" class="mt-3" style="max-width:400px;">
    <div class="mb-3">
        <input type="text" name="user" class="form-control" placeholder="Username" required>
    </div>
    <div class="mb-3">
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php include __DIR__.'/../includes/footer.php'; ?>
