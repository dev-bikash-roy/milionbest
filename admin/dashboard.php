<?php
session_start();
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$config = json_decode(file_get_contents(__DIR__.'/../config/settings.json'), true);
$tools = json_decode(file_get_contents(__DIR__.'/../config/tools.json'), true);
include __DIR__.'/../templates/header.php';
?>
<h2 class="text-2xl font-bold mb-4">MillionBest Admin</h2>
<table class="min-w-full bg-white border">
<thead><tr><th class="p-2 border-b">Tool</th><th class="p-2 border-b">Visible</th></tr></thead>
<tbody>
<?php foreach ($tools as $tool): ?>
<tr class="text-center"><td class="p-2 border-b"><?php echo htmlspecialchars($tool['name']); ?></td><td class="p-2 border-b"><?php echo $tool['visible'] ? 'Yes' : 'No'; ?></td></tr>
<?php endforeach; ?>
</tbody>
</table>
<a href="settings.php" class="inline-block mt-4 px-4 py-2 bg-gray-200 rounded">Settings</a>
<?php include __DIR__.'/../templates/footer.php'; ?>
