<?php
$query = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $_POST['query'] ?? '';
    $ai = new App\RouterAI($settings['router_ai_api_key']);
    $result = $ai->generate("Generate SEO keywords for: " . $query);
}
view(__DIR__ . '/../../templates/header.php', compact('settings'));
?>
<h1 class="text-2xl font-bold mb-4">SEO Keyword Generator</h1>
<form method="post" class="mb-4">
    <input type="text" name="query" class="w-full p-2 border" placeholder="Enter topic" value="<?php echo htmlspecialchars($query); ?>" required>
    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Generate</button>
</form>
<?php if($result): ?>
<div class="bg-white p-4 rounded shadow"><pre class="whitespace-pre-wrap"><?php echo htmlspecialchars($result); ?></pre></div>
<?php endif; ?>
<?php view(__DIR__ . '/../../templates/footer.php'); ?>
