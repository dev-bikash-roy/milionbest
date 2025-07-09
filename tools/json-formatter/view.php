<?php
include __DIR__.'/../../templates/header.php';
require_once 'Tool.php';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = $_POST['json'] ?? '';
    $formatted = JsonFormatter::format($json);
    if ($formatted === false) {
        $result = '<div class="bg-red-200 p-2">Invalid JSON</div>';
    } else {
        $result = '<pre class="bg-gray-100 p-2 mt-3">'.htmlspecialchars($formatted).'</pre>';
    }
}
?>
<h1 class="text-2xl font-bold mb-4">JSON Formatter</h1>
<form method="post" class="mb-4">
    <textarea name="json" class="border p-2 w-full" rows="5" placeholder="Paste JSON here" required><?php echo isset($_POST['json']) ? htmlspecialchars($_POST['json']) : ''; ?></textarea>
    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Format JSON</button>
</form>
<?php echo $config['adsense_top'] ?? '<!-- adsense_top -->'; ?>
<?php echo $result; ?>
<?php include __DIR__.'/../../templates/footer.php'; ?>
