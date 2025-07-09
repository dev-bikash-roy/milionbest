<?php
session_start();
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$config = json_decode(file_get_contents(__DIR__.'/../settings.json'), true);
$tools = json_decode(file_get_contents(__DIR__.'/../tools.json'), true);
?>
<?php include __DIR__.'/../includes/header.php'; ?>
<h2>MillionBest Admin</h2>
<table class="table table-bordered">
<thead><tr><th>Tool</th><th>Visible</th></tr></thead>
<tbody>
<?php foreach ($tools as $tool): ?>
<tr><td><?php echo htmlspecialchars($tool['name']); ?></td><td><?php echo $tool['visible'] ? 'Yes' : 'No'; ?></td></tr>
<?php endforeach; ?>
</tbody>
</table>
<a href="settings.php" class="btn btn-secondary">Settings</a>
<?php include __DIR__.'/../includes/footer.php'; ?>
