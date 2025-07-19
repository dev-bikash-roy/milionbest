<?php
$topic = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic = $_POST['topic'] ?? '';
    $ai = new App\RouterAI($settings['router_ai_api_key']);
    $result = $ai->generate("Assist with writing about: " . $topic);
}
view(__DIR__ . '/../../templates/header.php', compact('settings'));
?>
<h1 class="text-2xl font-bold mb-4">Writing Assistant</h1>
<form method="post" class="mb-4">
    <textarea name="topic" class="w-full p-2 border" rows="4" placeholder="Enter topic" required><?php echo htmlspecialchars($topic); ?></textarea>
    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Generate</button>
</form>
<?php if($result): ?>
<div class="bg-white p-4 rounded shadow"><pre class="whitespace-pre-wrap"><?php echo htmlspecialchars($result); ?></pre></div>
<?php endif; ?>
<?php view(__DIR__ . '/../../templates/footer.php'); ?>
