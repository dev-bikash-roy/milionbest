<?php
session_start();
if (empty($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include __DIR__ . '/../templates/header.php';

$phpVersion = PHP_VERSION;
$phpOk = version_compare($phpVersion, '8.1.0', '>=');
$memoryLimit = ini_get('memory_limit');
$vendorPresent = is_dir(__DIR__ . '/../vendor');
$uploadsWritable = is_writable(__DIR__ . '/../uploads');
$configWritable = is_writable(__DIR__ . '/../config');
$errorLogPath = ini_get('error_log');
$logContent = '';
if ($errorLogPath && is_readable($errorLogPath)) {
    $lines = file($errorLogPath);
    $logContent = implode("", array_slice($lines, -20));
}
?>
<h2 class="text-2xl font-bold mb-4">System Status</h2>
<table class="min-w-full bg-white border mb-4">
  <tbody>
    <tr><td class="p-2 border">PHP Version</td><td class="p-2 border"><?php echo htmlspecialchars($phpVersion); ?> <?php if(!$phpOk) echo '<span class="text-red-600">(Requires >= 8.1)</span>'; ?></td></tr>
    <tr><td class="p-2 border">Memory Limit</td><td class="p-2 border"><?php echo htmlspecialchars($memoryLimit); ?></td></tr>
    <tr><td class="p-2 border">Vendor Folder</td><td class="p-2 border"><?php echo $vendorPresent ? 'Present' : '<span class="text-red-600">Missing</span>'; ?></td></tr>
    <tr><td class="p-2 border">uploads/ Writable</td><td class="p-2 border"><?php echo $uploadsWritable ? 'Yes' : 'No'; ?></td></tr>
    <tr><td class="p-2 border">config/ Writable</td><td class="p-2 border"><?php echo $configWritable ? 'Yes' : 'No'; ?></td></tr>
  </tbody>
</table>
<?php if ($logContent): ?>
<div class="bg-gray-100 p-2 font-mono text-sm overflow-auto mb-4">
<pre><?php echo htmlspecialchars($logContent); ?></pre>
</div>
<?php endif; ?>
<?php include __DIR__ . '/../templates/footer.php'; ?>

