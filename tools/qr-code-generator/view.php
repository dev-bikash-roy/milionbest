<?php
include __DIR__.'/../../templates/header.php';
require_once 'Tool.php';
$data = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'] ?? '';
    if ($text) {
        $imageData = base64_encode(QrGenerator::create($text));
        $data = '<img src="data:image/png;base64,' . $imageData . '" alt="QR Code" class="mt-3"/>';
    }
}
?>
<h1 class="text-2xl font-bold mb-4">QR Code Generator</h1>
<form method="post" class="mb-4">
    <input type="text" name="text" class="border p-2 w-full" placeholder="Text or URL" value="<?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?>" required>
    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Generate</button>
</form>
<?php echo $config['adsense_top'] ?? '<!-- adsense_top -->'; ?>
<?php echo $data; ?>
<?php include __DIR__.'/../../templates/footer.php'; ?>
