<?php
include __DIR__.'/../../templates/header.php';
require_once 'Tool.php';
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'] ?? '';
    $result = WordCounter::countWords($text);
}
?>
<h1 class="text-2xl font-bold mb-4">Word Counter</h1>
<form method="post" class="mb-4">
    <textarea name="text" class="border p-2 w-full" rows="5" placeholder="Enter text here" required><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea>
    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Count Words</button>
</form>
<?php echo $config['adsense_top'] ?? '<!-- adsense_top -->'; ?>
<?php if ($result !== null): ?>
<div class="bg-green-100 p-2">Word Count: <?php echo $result; ?></div>
<?php endif; ?>
<?php include __DIR__.'/../../templates/footer.php'; ?>
